<?php
session_start();
include 'db.php';
include 'callLLM.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$mission_id = 1;

// Check if the user is coming from the questions page
if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'questions.php') !== false) {
    // User is coming from the questions page, generate the story and final summary

    // Retrieve the answerkey_loc based on the mission_id
    $query = "SELECT answerkey_loc 
              FROM missions 
              WHERE mission_id = $mission_id";
    $result = $conn->query($query);

    // Check if the query returned any rows
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $answerkey_loc = $row['answerkey_loc'];
    } else {
        $answerkey_loc = 'Answerkey not found for the given mission type and level.';
    }

    // Retrieve the user's answers for the mission
    $sql = "SELECT * FROM answers WHERE user_id='$user_id'";
    $answers = $conn->query($sql);

    // Read the answerkey file
    $answerkey_read = $answerkey_loc;
    $answerkey = fopen($answerkey_read, "r") or die("Unable to open file!");
    $content = fread($answerkey, filesize($answerkey_read));
    fclose($answerkey);

    $grades = [];
    $answers_array = [];
    while ($answer = $answers->fetch_assoc()) {
        $question_id = $answer['question_id'];
        $user_answer = $answer['answer'];

        // Retrieve the question based on the question_id
        $question_sql = "SELECT question FROM questions WHERE id='$question_id'";
        $question = $conn->query($question_sql)->fetch_assoc()['question'];

        // Grade the user's answer using the callLLM function
        $grade = callLLM("You are grading an answer. You will only accord a pass or fail. You will explain how the students answer demonstrates their understanding of the mission. If the students response demonstrates an unacceptable standard of understanding, you will explain how their mission could fail due to their lack of analysis. The answer to '$question' is in '$answerkey' and the candidate responded with '$user_answer'.");
        $grades[] = $grade;
        $answers_array[] = ['question' => $question, 'answer' => $user_answer, 'grade' => $grade];
    }

    // Generate the story using the callLLM function
    $story_prompt = "You are to write a story for a user. They have put in hard work to read a mission brief, under time pressure, analyze and understand it, then answer hard questions about it. The powers that be before you have already given answers. You must now balance their responses, and judge if the student has passed their test. If you deem the student has passed, write their story as a successful mission, an honourable one, with valiance on display, bravery, but nevertheless the stark realism of our world. Should they fail however, judge them as so. Do not let their ignorance, fooley, or weakness betray you, they are serious students. The words you read, the answers you get, are from real human beings, being trained to lead soldiers. Do those soldiers respect. If their mission is to fail, show them why. In particular, show them why their decisions made it fail. Now, to be provided to you first is the answer key: " . $content . "Next is the student's responses (with answers: )" . json_encode($answers_array) . "Only output your story. Markdown is permitted.";
    $story = callLLM($story_prompt);

    // Generate the final summary using the callLLM function
    $final_summary_prompt = "Based on the story and the following questions, answers, and their grades, write a final summary for this mission: " . json_encode($answers_array) . " Story: " . $story . "Answer_key: " . $content . " Give the student 3 things to improve and 3 things to continue doing. At the very end give the student a letter grade. Consider their answers and story evenly in your grading.";
    $final_summary = callLLM($final_summary_prompt);

    // Save the story and final summary to the mission_results table
    $insertQuery = "INSERT INTO mission_results (user_id, mission_id, story, final_summary) 
                    VALUES ('$user_id', '$mission_id', '" . mysqli_real_escape_string($conn, $story) . "', '" . mysqli_real_escape_string($conn, $final_summary) . "')";
    $conn->query($insertQuery);
} elseif (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'mission_select.php') !== false) {
    // User is coming from the mission_select page, load the story and final summary from the database

    // Retrieve the latest mission_results entry for the user and mission
    $selectQuery = "SELECT story, final_summary FROM mission_results 
                    WHERE user_id = '$user_id' AND mission_id = '$mission_id'
                    ORDER BY id DESC
                    LIMIT 1";
    $result = $conn->query($selectQuery);

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $story = $row['story'];
        $final_summary = $row['final_summary'];
    } else {
        // No results found for the given user and mission
        $story = "No story found.";
        $final_summary = "No final summary found.";
    }
} else {
    // User is not coming from the questions page or mission_select page
    $story = "";
    $final_summary = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #3c3c3c;
        }

        .container {
            display: flex;
            height: 100vh;
            width: 100vw;
        }

        .results-container {
            flex: 1;
            overflow-y: auto;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.7);
            border: 1px solid #4a4a4a;
            background-color: #1e1e1e;
            color: #e0e0e0;
            max-width: 50%;
            font-family: 'Arial', sans-serif;
            line-height: 1.8;
        }

        .notes-container {
            background-color: #3c3c3c;
            color: #000;
        }

        .questions-container {
            background-color: #3c3c3c;
            color: #000;
        }

        h2 {
            color: #ffffff;
            border-bottom: 3px solid #4a4a4a;
            padding-bottom: 10px;
            font-size: 26px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 30px;
        }

        .result-content {
            margin-bottom: 40px;
        }

        .markdown-content {
            font-size: 16px;
            margin-bottom: 15px;
            white-space: pre-wrap; /* Preserve whitespace for markdown */
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #f39c12;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            padding-top: 10px;
            }

            .button:hover {
            background-color: #0056b3;
            }

            .button:active {
            background-color: #004085;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
</head>
<body>
    <div style="overflow: hidden" class="container">
        <div class="results-container notes-container">
            <h2>Story</h2>
            <div class="result-content markdown-content" id="story-content"><?php echo htmlspecialchars($story); ?></div>
        </div>
        <div class="results-container questions-container">
            <h2>Final Summary</h2>
            <div class="result-content markdown-content" id="summary-content"><?php echo htmlspecialchars($final_summary); ?></div>
        </div>
    </div>
    <div id="home-linK">
        <a class="button" href="mission_select.php">Back to Mission Select</a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const storyContent = document.getElementById('story-content');
            const summaryContent = document.getElementById('summary-content');
                
            storyContent.innerHTML = marked.parse(storyContent.textContent);
            summaryContent.innerHTML = marked.parse(summaryContent.textContent);
        });
    </script>
</body>
</body>
</html>