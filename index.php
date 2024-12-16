<?php 

$hostname = 'localhost';
$username = 'root';
$password = '';
$db_name = 'db_database';

$conn = mysqli_connect($hostname, $username, $password, $db_name);

$nameError = "";
$passwordError = "";

if(isset($_POST['submit'])) {
     $username = $_POST['username'];
     $password = $_POST['password'];

     if(empty($username)) {
          $nameError = "Please enter a username";
     } else {
          $username = trim($username);
          $username = htmlspecialchars($username);
     }
     if(empty($password)) {
          $passwordError = "Please enter a password";
     } else {
          if(strlen($password <= 8)) {
               $passwordError = '';

          } elseif(!preg_match("#[0-9]+#", $password)) {
               $passwordError = 'At list one characters';

          } elseif(!preg_match("#[a-z]+#", $password)) {
               $passwordError = 'At list one small characters';

          } elseif(!preg_match("#[A-Z]+#", $password)) {
               $passwordError = 'At list one upper case characters';
          }
     }


     $sql = "INSERT INTO user_info(username, password) VALUES ('$username', '$password')";
     $result = mysqli_query($conn, $sql);

     if($result == true ) {
          echo '';
     } else {
          echo 'data already not exists';
     }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Form Validation in PHP</title>

     <!-- css link start here -->
      <link rel="stylesheet" href="/Form_Validation_in_PHP/style.css">
</head>
<body>
     <div class="container">
          <div class="form_container">
               <h1>Form Validation in PHP</h1>

               <form action="" method="POST">
                    <p>
                         <label for="name">Username</label>
                         <input type="text" name="username" placeholder="Enter Your Username">
                         <span style="color:red;"><?php echo $nameError ?></span>
                    </p>

                    <p>
                         <label for="password">Password</label>
                         <input type="password" name="password" placeholder="Enter Your Password">
                         <span style="color:red;"><?php echo $passwordError ?></span>
                    </p>
                    <button name="submit" name="submit">Login</button>
               </form>
          </div>
     </div>
</body>
</html>