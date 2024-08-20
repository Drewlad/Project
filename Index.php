<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="Chatter logo.png">
    <title>www.Chatter.com</title>
</head>
<body>
    <h1>Welcome to the chatter<img src="chatterlogo.png" id="img1" alt="chatter logo"></h1>
    <form action="index.php" method="post">
        <div id="div1">
            <label for="name">Enter your name:</label>
            <input type="text" id="name" name="name" placeholder="John" required><br>

            <label for="Username">Enter a Username:</label>
            <input type="text" id="Username" name="Username" placeholder="kriller_667" required><br>

            <label for="email">Enter an Email:</label>
            <input type="email" id="email" name="email" placeholder="Example@gmail.com" required><br>

            <label for="Password">Enter a Password:</label>
            <input type="Password" id="Password" name="Password" placeholder="*******" required><br>
            <button id="Submit" name="SignUp">Sign Up</button>
            <p><h5><a href="chattersign In.php">Already have an account?</a></h5></p>
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
//inserting data in database table when singup
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["SignUp"])) {
           $name = $_POST["name"];
            $username = $_POST["Username"];
            $email = $_POST["email"];
            $password = $_POST["Password"];
            $hash=password_hash($password,PASSWORD_DEFAULT);

            $sql ="INSERT INTO user_infos (name,username,Email,Password)
                   VALUES('$name','$username','$email','$hash')";

                header("locatin:home.php");             
          
      
            try {
                    if (mysqli_query($conn, $sql)) {
                    echo "Data has been inserted successfully into the database table!"; 
                     
            }
         }
            catch (mysqli_sql_exception) {
                echo "coud not insert data in database table!" . $sql . "<br>" . mysqli_error($conn);
            }


}
    }
// Close MySQL connection
mysqli_close($conn);


?>

