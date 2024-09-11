<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.lite.com</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h1>Welcome to lite</h1>
    <form action="index1.php" method="post">
        <div id="div1">

            <label for="Username">Enter a Username:</label>
            <input type="text" id="Username" name="Username" placeholder="kriller_667" required><br>

            <label for="Password">Enter a Password:</label>
            <input type="Password" id="Password" name="Password" placeholder="XXXXXXXX" required><br>
            <button id="Submit" name="SignUn">Sign In</button>
        </div>
    </form>
</body>
</html>

<?php
  //connect to database
  $db_server = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "gossip"; 

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
            $username = $_POST["Username"];
            $email = $_POST["email"];
            $password = $_POST["Password"];
            $hash=password_hash($password,PASSWORD_DEFAULT);

            $sql ="INSERT INTO user_infos (username,email,Password)
                   VALUES('$username','$email','$hash')";
                             echo $username;
      
            try {
                    if (mysqli_query($conn, $sql)) {
                    echo "Data has been inserted successfully into the database table!"; 
                     header("location:home1.php");
                     exit();
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