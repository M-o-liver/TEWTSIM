<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
// Retrieve the user ID from the session
$query = "SELECT codename
          FROM users
          WHERE id = $user_id";
$result = $conn->query($query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the row as an associative array
    $user = mysqli_fetch_assoc($result);
    $username = $user['codename'];
} else {
    // If no rows were returned, assign a default value
    $username = "Unknown";
}

// Retrieve mission reports
$query = "SELECT id, mission_id, story, final_summary
          FROM mission_results
          WHERE user_id = $user_id";
$result = $conn->query($query);

$mission_reports = [];
if (mysqli_num_rows($result) > 0) {
    $mission_reports = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Extract mission_ids from mission_reports
$mission_ids = array_column($mission_reports, 'mission_id');

// Retrieve mission names
$mission_ids_string = implode(',', $mission_ids);
$query = "SELECT mission_id, mission_name
          FROM missions
          WHERE mission_id IN ($mission_ids_string)";
$result = $conn->query($query);

$mission_names = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $mission_names[$row['mission_id']] = $row['mission_name'];
    }
}

// Add mission_name to each mission report
foreach ($mission_reports as &$report) {
    $report['mission_name'] = $mission_names[$report['mission_id']] ?? 'Unknown';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tewtsim - Mission Selection</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .content-container {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
        }
        body {
            overflow-y: auto;
        }
        .mission-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            width: 90%;
            max-width: 1400px;
            margin: 2em auto;
        }

        .mission-card {
            background-color: #3c3c3c;
            border-radius: 10px;
            padding: 1.5em;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .mission-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .mission-card h3 {
            color: #f39c12;
            margin-bottom: 0.5em;
        }

        .mission-card p {
            font-size: 0.9em;
            color: #bbb;
        }

        .mission-icon {
            font-size: 3em;
            margin-bottom: 0.5em;
        }

        .difficulty {
            margin-top: 1em;
            font-size: 0.8em;
            color: #888;
        }

        .stars {
            color: #f39c12;
        }

        .level-selector {
            display: flex;
            justify-content: space-around;
            margin-top: 1em;
        }

        .level-btn {
            background-color: #2c2c2c;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .level-btn:hover {
            background-color: #444;
        }

        .level-btn.active {
            background-color: #f39c12;
            color: #2c2c2c;
        }

        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .branding {
            text-align: center;
            margin-bottom: 2em;
        }

        .branding h1 {
            font-size: 3em;
            color: #f39c12;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 0.2em;
        }

        .branding p {
            font-size: 1.2em;
            margin: 0.2em 0;
        }
        
        .mission-reports {
            width: 100%;
            max-width: 75%;
            margin: 2em auto;
        }

        .mission-report-card {
            background-color: #3c3c3c;
            border-radius: 10px;
            padding: 1.5em;
            margin-bottom: 1.5em;
        }

        .mission-report-card h4 {
            color: #f39c12;
            margin-bottom: 0.5em;
        }

        .mission-report-card p {
            font-size: 0.9em;
            color: #bbb;
            margin-bottom: 0.5em;
        }
        
        a {
            color: #000;
        }
    </style>
</head>
<body>
    <div class="content-container">
        <div class="branding">
            <h1>Welcome <?php echo $username ?>,</h1>
            <h1>Mission Selection</h1>
        </div>
        <button class="logout-btn" onclick="location.href='index.php'">Logout</button>
        <div class="mission-grid">
            <div class="mission-card">
                <div class="mission-icon">🏜️</div>
                <h3>Attack in Jalalabad `in testing`</h3>
                <p>Navigate harsh terrain and extreme temperatures in this desert warfare scenario.</p>
                <div class="difficulty">Difficulty: <span class="stars">★★☆☆☆</span></div>
                <div class="level-selector">
                    <button class="level-btn" onclick="selectMission('1', 'desert', 'platoon')">Platoon</button>
                    <button class="level-btn" onclick="selectMission('2', 'desert', 'section')">Section</button>
                </div>
            </div>
            <div class="mission-card">
                <div class="mission-icon">🌲</div>
                <h3>Forest Recon `in development`</h3>
                <p>Conduct a reconnaissance mission in dense forest environments.</p>
                <div class="difficulty">Difficulty: <span class="stars">★★★☆☆</span></div>
                <div class="level-selector">
                    <button class="level-btn" onclick="selectMission('forest', 'platoon')">Platoon</button>
                    <button class="level-btn" onclick="selectMission('forest', 'section')">Section</button>
                </div>
            </div>
            <div class="mission-card">
                <div class="mission-icon">🏙️</div>
                <h3>Urban Assault `in development`</h3>
                <p>Lead an assault team through a complex urban environment.</p>
                <div class="difficulty">Difficulty: <span class="stars">★★★★☆</span></div>
                <div class="level-selector">
                    <button class="level-btn" onclick="selectMission('urban', 'platoon')">Platoon</button>
                    <button class="level-btn" onclick="selectMission('urban', 'section')">Section</button>
                </div>
            </div>
            <div class="mission-card">
                <div class="mission-icon">🏔️</div>
                <h3>Mountain Pass `in development`</h3>
                <p>Secure a strategic mountain pass in challenging alpine conditions.</p>
                <div class="difficulty">Difficulty: <span class="stars">★★★★★</span></div>
                <div class="level-selector">
                    <button class="level-btn" onclick="selectMission('mountain', 'platoon')">Platoon</button>
                    <button class="level-btn" onclick="selectMission('mountain', 'section')">Section</button>
                </div>
            </div>
        </div>
        <div class="branding">
            <h1>Mission Review</h1>
        </div>
        <div class="mission-reports">
            <?php foreach ($mission_reports as $report): ?>
                <div class="mission-report-card">

                    <h4><a href="results.php?mission_id=<?= $report['mission_id'] ?>&user_id=<?= $user_id ?>&id=<?= $report['id'] ?>">Mission Name: <?= $report['mission_name'] ?></a></h4>

                    <p><strong>Story:</strong> <?= substr($report['story'], 0, 250) ?><?= strlen($report['story']) > 250 ? '...' : '' ?></p>
                    <p><strong>Final Summary:</strong> <?= substr($report['final_summary'], 0, 250) ?><?= strlen($report['final_summary']) > 250 ? '...' : '' ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        function selectMission(mission_id, missionType, level) {
            // Here you can add logic to handle the mission selection
            console.log(`Selected ${level} level for ${missionType} mission`);
            // You can redirect to the appropriate mission page or update the UI as needed
            // For example:
            location.href = `mission.php?mission_id=${mission_id}&type=${missionType}&level=${level}`;

        }
    </script>
</body>
</html>