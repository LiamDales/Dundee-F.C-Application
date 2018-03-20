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
    $username = $_POST ['username'];
    $fname = $_POST ['fname'];
    $lname = $_POST ['lname'];
    $password = $_POST ['password'];
    $phone_no = $_POST ['mob'];
    $email = $_POST ['email'];
    $dob = $_POST ['age'];

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

    if (empty ($phone_no)) {
        $phone_noError = 'Please enter Mobile Number';
        $valid = false;
    }

    if (empty ($email)) {
        $emailError = 'Please enter Email';
        $valid = false;
    }

    if (empty ($dob)) {
        $dobError = 'Please enter date of birth';
        $valid = false;
    }

    if (empty ($username)) {
        $usernameError = 'Please enter Username';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $password_hash = hash('ripemd128', $password);
        $id = mysql_query("SELECT * FROM Users ORDER BY id DESC LIMIT 1");
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Users (username, email,password_hash,fname,lname,dob,phone_no) values(?, ?, ?, ?, ?, ?, ?)";
        try {
            $q = $pdo->prepare($sql);
            echo "Problem-1";
            $q->execute(array(
                $username,
                $email,
                $password_hash,
                $fname,
                $lname,
                $dob,
                $phone_no
            ));
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            echo $sql;
        }
        echo "Register Complete";
        header("Location: index.php?reg=true");
        Database::disconnect();
    }
}
?>

