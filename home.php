<?php
   session_start();
   include("chatterhomepage.html");
?>

<?php
 
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         if (isset($_POST["logout"])) {
         session_destroy();
         }
     }
   
   //include("chatterhomepage.html");

    //  $password = "DrewPHP";
    //  $hash = password_hash($password,PASSWORD_DEFAULT);
    //  echo $hash;


?>