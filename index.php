<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Login Logic
    if (isset($_POST['login'])) {
        $codename = $_POST['codename'];
        $codeword = $_POST['codeword'];  // color selected

        $sql = "SELECT * FROM users WHERE codename='$codename' AND codeword='$codeword'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['user_id'] = $result->fetch_assoc()['id'];
            header("Location: mission_select.php");
        } else {
            echo "Invalid codename or color.";
        }
    }
    // Sign-up Logic
    elseif (isset($_POST['signup'])) {
        $codename = $_POST['codename'];
        $codeword = $_POST['codeword'];  // color selected
        $infcheck = $_POST['infcheck'];

        // Check if codename already exists
        $sql = "SELECT * FROM users WHERE codename='$codename'";
        $result = $conn->query($sql);




        if ($result->num_rows > 0) {
            echo "Codename already taken. Please choose another.";
        } else
        if ($infcheck != '00180') {
            echo "Just who are you, exactly?";
        } else {
            // Insert the new user with color as their codeword
            $sql = "INSERT INTO users (codename, codeword) VALUES ('$codename', '$codeword')";
            if ($conn->query($sql) === TRUE) {
                echo "Sign-up successful. You can now log in.";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tewtsim - Login or Sign-up</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Custom local styles for this page */
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #2c2c2c;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .container {
            background-color: #3c3c3c;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 300px;
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

        .form-box {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-box h2 {
            margin-bottom: 1em;
            color: #f39c12;
        }

        input[type="text"], select {
            background: none;
            border: none;
            border-bottom: 2px solid #666;
            color: #fff;
            padding: 10px 0;
            width: 100%;
            margin: 1em 0;
            font-size: 1em;
            text-align: center;
            outline: none;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position-x: 100%;
            background-position-y: 50%;
        }

        input[type="submit"] {
            background-color: #f39c12;
            border: none;
            color: #fff;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 5px;
            margin-top: 1em;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #e67e22;
        }

        .toggle-form {
            margin-top: 1em;
            text-align: center;
        }

        .toggle-form a {
            color: #f39c12;
            text-decoration: none;
        }

        .toggle-form a:hover {
            text-decoration: underline;
        }

        #signup-form {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Branding for Tewtsim -->
        <div class="branding">
            <h1>Tewtsim</h1>
            <p>Login or Sign-up</p>
            <p><></p>
            <p>A military simulator game</p>
        </div>

        <!-- Login Form -->
        <div id="login-form" class="form-box">
            <h2>Login</h2>
            <form method="post" action="">
                <input type="text" name="codename" placeholder="Codename" required>
                <select name="codeword" id="colorSelectLogin" required>
                    <option value="" disabled selected>Choose your color</option>
                    <option value="red" style="color:red;">Red</option>
                    <option value="orange" style="color:orange;">Orange</option>
                    <option value="yellow" style="color:yellow;">Yellow</option>
                    <option value="green" style="color:green;">Green</option>
                    <option value="blue" style="color:blue;">Blue</option>
                    <option value="indigo" style="color:indigo;">Indigo</option>
                    <option value="violet" style="color:violet;">Violet</option>
                </select>
                <input type="submit" name="login" value="Login">
            </form>
            <div class="toggle-form">
                <a href="#" id="show-signup">Don't have an account? Sign up</a>
            </div>
        </div>

        <!-- Sign-up Form -->
        <div id="signup-form" class="form-box">
            <h2>Sign-up</h2>
            <form method="post" action="">
                <input type="text" name="codename" placeholder="Codename" required>
                <input type="text" name="infcheck" placeholder="The Infantry MOSID Is:" required>
                <select name="codeword" id="colorSelectSignup" required>
                    <option value="" disabled selected>Choose your color</option>
                    <option value="red" style="color:red;">Red</option>
                    <option value="orange" style="color:orange;">Orange</option>
                    <option value="yellow" style="color:yellow;">Yellow</option>
                    <option value="green" style="color:green;">Green</option>
                    <option value="blue" style="color:blue;">Blue</option>
                    <option value="indigo" style="color:indigo;">Indigo</option>
                    <option value="violet" style="color:violet;">Violet</option>
                </select>
                <input type="submit" name="signup" value="Sign-up">
            </form>
            <div class="toggle-form">
                <a href="#" id="show-login">Already have an account? Log in</a>
            </div>
        </div>
    </div>

    <script>
        function applySelectColor(selectElement) {
            selectElement.style.color = selectElement.options[selectElement.selectedIndex].style.color;
        }

        const loginSelect = document.getElementById('colorSelectLogin');
        const signupSelect = document.getElementById('colorSelectSignup');
        const loginForm = document.getElementById('login-form');
        const signupForm = document.getElementById('signup-form');
        const showSignup = document.getElementById('show-signup');
        const showLogin = document.getElementById('show-login');

        // Apply color when user selects an option
        loginSelect.addEventListener('change', function() {
            applySelectColor(loginSelect);
        });

        signupSelect.addEventListener('change', function() {
            applySelectColor(signupSelect);
        });

        // Toggle between login and signup forms
        showSignup.addEventListener('click', function(e) {
            e.preventDefault();
            loginForm.style.display = 'none';
            signupForm.style.display = 'block';
        });

        showLogin.addEventListener('click', function(e) {
            e.preventDefault();
            signupForm.style.display = 'none';
            loginForm.style.display = 'block';
        });
    </script>
</body>
</html>