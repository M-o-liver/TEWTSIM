<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$mission_id = 1; // Assume there's only one mission for simplicity
$mission_id = $_GET['mission_id'];
$missionType = $_GET['type'];
$level = $_GET['level'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $note = $_POST['note'];
    $stmt = $conn->prepare("INSERT INTO notes (user_id, mission_id, note) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $mission_id, $note);
    $stmt->execute();
    $stmt->close();
    header("Location: questions.php");
}

// Construct the SQL query to retrieve situation, mission, details, and map columns
// from the missions table where the type and level match the provided values
$query = "SELECT situation, mission, details, map 
          FROM missions 
          WHERE type = '$missionType' AND level = '$level'";

// Execute the query and store the result
$result = $conn->query($query);

// Check if the query returned any rows
if (mysqli_num_rows($result) > 0) {
    // Fetch the first row as an associative array
    $row = mysqli_fetch_assoc($result);
    
    // Assign the values from the row to the respective variables
    $situation = $row['situation'];
    $mission = $row['mission'];
    $details = $row['details'];
    $map = $row['map'];
} else {
    // If no rows were returned, assign default messages to the variables
    $situation = 'Scenario not found for the given mission type and level.';
    $mission = 'Scenario not found for the given mission type and level.';
    $details = 'Scenario not found for the given mission type and level.';
    $map = 'Scenario not found for the given mission type and level.';
}


// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mission Brief</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .mission-container {
            display: flex;
            height: 100vh;
            width: 100vw;
            justify-content: center;
        }
        .mission-brief {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
            background-color: #3c3c3c;
            max-height: 100vh;
            width: 50%;
            max-width: none;
        }
        .notes-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #3c3c3c;
            padding: 10px;
            max-height: 100vh;
            width: 50%;
            max-width: none;
        }
        .tab-container {
            display: flex;
            margin-bottom: 5px;
        }
        .tab {
            padding: 8px 16px;
            background-color: #1a1a1a;
            color: #fff;
            cursor: pointer;
            margin-right: 3px;
        }
        .tab.active {
            background-color: #444;
        }
        .tab-content {
            display: none;
            flex-grow: 1;
            overflow-y: auto;
        }
        .tab-content.active {
            display: block;
        }
        #timer {
            position: fixed;
            top: 5px;
            right: 5px;
            background-color: #1a1a1a;
            padding: 5px;
            border-radius: 3px;
            z-index: 1000;
        }
        #pdf-viewer {
            width: 100%;
            height: calc(100vh - 60px);
            border: none;
        }
        textarea {
            width: calc(100% - 10px);
            height: calc(100vh - 120px);
            margin-bottom: 5px;
        }
        #map {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            height: auto;
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

        section {
            margin-bottom: 40px;
        }

        p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .squad-report {
            background-color: #2a2a2a;
            border-left: 6px solid #ffd700;
            padding: 15px;
            margin: 20px 0;
            font-style: italic;
            font-weight: 600;
            color: #ffffff;
        }

        .requirement {
            background-color: #333333;
            padding: 15px;
            border: 2px solid #ffd700;
            font-weight: 600;
            color: #ffffff;
        }

        .detail-list {
            list-style-type: none;
            padding-left: 0;
        }

        .detail-list li {
            padding: 8px 0;
            border-bottom: 1px solid #3a3a3a;
            font-size: 16px;
            color: #e0e0e0;
        }

        .detail-list li:last-child {
            border-bottom: none;
        }

        .map-container {
            text-align: center;
        }

        #map {
            max-width: 100%;
            height: auto;
            border: 2px solid #4a4a4a;
        }

        figcaption {
            font-style: italic;
            color: #bdbdbd;
            margin-top: 10px;
            font-size: 14px;
        }

        strong {
            font-weight: 700;
            color: #ffffff;
        }
    </style>
    <script>
        let timer = 600; // 10 minutes in seconds

        function startTimer() {
            const timerInterval = setInterval(() => {
                timer--;
                document.getElementById('timer').textContent = `Time remaining: ${Math.floor(timer / 60)}:${timer % 60}`;
                if (timer <= 0) {
                    clearInterval(timerInterval);
                    document.forms[0].submit(); // Auto-submit the form when time is up
                }
            }, 1000);
        }

        function switchTab(event) {
            const clickedTab = event.target;
            const targetId = clickedTab.getAttribute('data-target');
            
            // Remove 'active' class from all tabs and tab contents
            document.querySelectorAll('.tab, .tab-content').forEach(el => el.classList.remove('active'));
            
            // Add 'active' class to clicked tab and corresponding content
            clickedTab.classList.add('active');
            document.getElementById(targetId).classList.add('active');
        }

        document.addEventListener('DOMContentLoaded', function() {
            startTimer();

            // Add click event listeners to all tab elements
            document.querySelectorAll('.tab').forEach(tab => {
                tab.addEventListener('click', switchTab);
            });
        });

    </script>
</head>
<body>
    <div id="timer">Time remaining: 10:00</div>
    <div class="mission-container">
        <div class="mission-brief">
        <section id="scenario">
            <?php echo $situation; ?>
        </section>
        <section id="scenario">
            <?php echo $mission; ?>
        </section>

        <section id="details">
            <?php echo $details; ?>
        </section>

        <section id="map-section">
            <h2>Map</h2>
            <figure class="map-container">
                <img id="map" src="<?php echo $map; ?>" alt="Satellite image of the urban area in Jalalabad, showing dense arrangement of buildings, a mosque, and a river.">
                <figcaption>Satellite imagery of Jalalabad AOR</figcaption>
            </figure>
</section>
    </div>
        <div class="notes-container">
            <div class="tab-container">
                <div class="tab active" data-target="notes-tab">Notes</div>
                <div class="tab" data-target="pdf-tab">PDF</div>
            </div>
            <div id="notes-tab" class="tab-content active">
                <form method="post" action="">
                    <textarea name="note" required></textarea><br>
                    <input type="submit" value="Submit Note">
                </form>
            </div>
            <div id="pdf-tab" class="tab-content">
                <embed id="pdf-viewer" src="guides/estimate.pdf" type="application/pdf">
            </div>
        </div>
    </div>
</body>
</html>