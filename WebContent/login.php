<?php
  require 'database.php';
  session_start();
  $fname = $_POST["user"];
  $password = $_POST["pass"];
  $token = hash('ripemd128', $password);
  $pdo = Database::connect();
  $sql = "SELECT * FROM users WHERE fname='$fname' and password='$token';";
  echo "Invalid Login";
  header("Location: index.php?invalid=true");
  foreach ($pdo->query($sql) as $row) {
    if ($row["fname"] == "admin") {
      $id = $row["id"];
      $_SESSION["uname"] = "admin";
      $_SESSION["id"] = $id;
      header("Location: adminPage.php?id=".$id);
    } else {
      $id = $row["id"]; 
      $_SESSION["uname"] = $fname;
      $_SESSION["id"] = $id;
      header("Location: home.php?id=".$id);
    } 
  }
  Database::disconnect();
?>
