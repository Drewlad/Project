<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="chatterlogo.png">
    <title>www.Chatter.com</title>
</head>
<body>
    <h1>Welcome back to the chatter<img src="chatterlogo.png" id="img1" alt="chatter logo"></h1>
     <form action="chattersign In.php" method="post">  
        <div id="div1">
            <label for="Username">Enter Your Username:</label>
            <input type="text" id="Username" name="Username" placeholder="kriller_667" required><br>

            <label for="Password">Enter Your Password:</label>
            <input type="Password" id="Password" name="Password" placeholder="*******" required><br>
            
            <button id="Submit" name="signIn">Sign In</button>
            <p><h5><a href="index.php">I don't have an account?</a></h5></p>
        </div>
    </form> 
    <p><h3 id="h31">Sending messages has no limits!</h3></p>
    <footer>
        <p>ALL YOUR PRIVATE DATA ENTERED IN THIS SITE WILL NOT BE ACCESSED WITHOUT YOUR AUTHORISATION</p>
        <a href="https://twilight-portfolio.netlify.app/">
            <p id="p1">Built by TWILIGHT© 2024 ALL RIGHTS RESERVED</p></a>
    </footer>
    <script src="script.js"></script>
</body>
</html>
<?php
    //connect to database
  $db_server = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "registration_data"; 

  $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    try {
      if ($conn) {
    echo "You're connected to mysql" ."<br>";
  } 
} 
    catch (mysqli_sql_exception) {
    echo "Error occured while connecting!";
}
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
       if (isset($_POST["signIn"])) {
         $username = $_POST["Username"];
         $password = $_POST["Password"];
    $hash=password_hash($password,PASSWORD_DEFAULT);

$username = mysqli_real_escape_string($conn, $username);

$hash = mysqli_real_escape_string($conn, $hash);

$sql = "SELECT * FROM user_infos WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    echo "Your Username is " . $row["username"] . "<br>";
} else {
    echo "Login failed. Invalid username or password.";
}
       }
}

// Always free the result set and close the connection when done
mysqli_free_result($result);


    /*if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["signIn"])) {
        $username = $_POST["Username"];
        $password = $_POST["Password"];
        $hash=password_hash($password,PASSWORD_DEFAULT);

        $sql = "SELECT * FROM user_infos WHERE username = $username
                password = $hash";
        $result = mysqli_query($conn, $sql);
        
           if (mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_assoc($result);
            
            echo "Your Username is" . $row["username"] . "<br>";
            //header("location:home.php");
         }
        }
         else{
            echo "Error";
         }

        }*/
    //close Mysql conn
    mysqli_close($conn);
?>