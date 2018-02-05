<?php
require 'database.php';

if (! empty ( $_POST )) {
    // keep track validation errors
    $fnameError = null;
    $lnameError = null;
    $passwordError = null;
    $mobilenumError = null;
    $emailError = null;

    // keep track post values
    $fname = $_POST ['fname'];
    $lname = $_POST ['lname'];
    $password = $_POST ['password'];
    $mobilenum = $_POST ['mobilenum'];
    $email = $_POST ['email'];

    // validate input
    $valid = true;
    if (empty ($fname)) {
        $fnameError = 'Please enter First Name';
        $valid = false;
    }
    if (empty ($password)) {
        $passwordError = 'Please enter Password';
        $valid = false;
    }

    if (empty ($lname)) {
        $lnameError = 'Please enter Last Name';
        $valid = false;
    }

    if (empty ($mobilenum)) {
        $mobilenumError = 'Please enter Mobile Number';
        $valid = false;
    }

    if (empty ($email)) {
        $emailError = 'Please enter Email';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $token = hash('ripemd128', $password);
        $id = mysql_query("SELECT * FROM users ORDER BY id DESC LIMIT 1");
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (password,fname,lname,mobilenum,email) values(?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array(
            $token,
            $fname,
            $lname,
            $mobilenum,
            $email
        ));
        echo "Register Complete";
        header("Location: index.php?reg=true");
        Database::disconnect();
    }
}
?>

