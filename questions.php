<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$mission_id = 1; // Assume there's only one mission for simplicity

// Fetching notes saved by the user
$sql_notes = "SELECT note FROM notes WHERE user_id='$user_id' AND mission_id='$mission_id'";
$notes_result = $conn->query($sql_notes);

$notes = [];
while ($note = $notes_result->fetch_assoc()) {
    $notes[] = $note['note'];
}

// Fetching questions
$sql_questions = "SELECT * FROM questions WHERE mission_id='$mission_id'";
$questions_result = $conn->query($sql_questions);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO answers (user_id, question_id, answer) VALUES (?, ?, ?)");
    foreach ($_POST['answers'] as $question_id => $answer) {
        $stmt->bind_param("iis", $user_id, $question_id, $answer);
        $stmt->execute();
    }
    $stmt->close();
    header("Location: results.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mission Questions</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #2c2c2c;
        }
        .container {
            display: flex;
            width: 100vw;
            height: 100vh;
        }
        .questions-container {
            flex: 3;
            overflow-y: auto;
            padding: 0;
            background-color: #3c3c3c;
        }
        .notes-container {
            flex: 1;
            background-color: #3c3c3c;
            color: #fff;
            padding: 20px;
            overflow-y: auto;
            border-left: 2px solid #1a1a1a;
        }
        .question-box {
            background-color: #3c3c3c;
            padding: 15px;
            border-bottom: 1px solid #1a1a1a;
            width: 100%;
        }
        .question-text {
            font-size: 1.1em;
            margin-bottom: 10px;
            color: #fff;
        }
        textarea {
            width: 100%;
            min-height: 80px;
            background-color: #444;
            border: none;
            color: #fff;
            padding: 10px;
            font-size: 1em;
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #1a1a1a;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            margin: 20px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #333;
        }
        #timer {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #1a1a1a;
            color: #fff;
            padding: 10px;
        }
        #mission-header {
            background-color: #1a1a1a;
            color: #fff;
            padding: 10px 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        #notes h2 {
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
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
    <script>
        let timer = 600; // 10 minutes in seconds

        function startTimer() {
            const timerInterval = setInterval(() => {
                timer--;
                document.getElementById('timer').textContent = `Time Remaining: ${Math.floor(timer / 60)}:${(timer % 60).toString().padStart(2, '0')}`;
                if (timer <= 0) {
                    clearInterval(timerInterval);
                    document.forms[0].submit(); // Auto-submit the form when time is up
                }
            }, 1000);
        }

        window.onload = startTimer;
    </script>
</head>
<body>
    <div id="timer">Time Remaining: 10:00</div>
    <div class="container">
        <div class="questions-container">
            <div id="mission-header">Answer All Questions</div>
            <form method="post" action="">
                <?php while ($question = $questions_result->fetch_assoc()): ?>
                    <div class="question-box">
                        <div class="question-text"><?php echo htmlspecialchars($question['question']); ?></div>
                        <textarea name="answers[<?php echo $question['id']; ?>]" required></textarea>
                    </div>
                <?php endwhile; ?>
                <a type="submit" class="button" href="results.php?mission_id=<?php echo $mission_id; ?>" onclick="document.forms[0].submit();">Submit Answers</a>
            </form>
        </div>
        <div class="notes-container">
            <div id="notes">
                <h2>Your Notes</h2>
                <?php foreach ($notes as $note): ?>
                    <p><?php echo htmlspecialchars($note); ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>