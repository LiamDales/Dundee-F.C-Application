<?php
  require 'database.php';
  session_start();
  $username = $_POST["username"];
  $password_hash = $_POST["password"];
  $token = hash('ripemd128', $password_hash);
  $pdo = Database::connect();
  $sql = "SELECT * FROM Users WHERE username='$username' and password_hash='$token';";
  echo "Invalid Login";
  header("Location: index.php?invalid=true");
  foreach ($pdo->query($sql) as $row) {
    if ($row["username"] == "admin") {
      $user_id = $row["user_id"];
      $_SESSION["username"] = "admin";
      $_SESSION["user_id"] = $user_id;
      header("Location: adminPage.php?id=".$user_id);
    } else {
      $user_id = $row["user_id"];
      $_SESSION["username"] = $username;
      $_SESSION["user_id"] = $user_id;
      header("Location: playerselect.php?id=".$user_id);
    } 
  }
  Database::disconnect();
?>
