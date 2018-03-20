<?php
require 'database.php';
session_start();

if (! empty ( $_POST )) {
    // keep track validation errors
    $fnameError = null;
    $lnameError = null;
    $ageError = null;
    $docnameError = null;
    $doccontactError = null;
    $medinfoError = null;

    // keep track post values
    $fname = $_POST ['fname'];
    $lname = $_POST ['lname'];
    $dob = $_POST ['age'];
    $docName = $_POST ['docname'];
    $docNumber = $_POST ['doccontact'];
    $medicalRecord = $_POST ['medinfo'];
    $user_id = $_SESSION["user_id"];

    // validate input
    $valid = true;
    if (empty ($fname)) {
        $fnameError = 'Please enter First Name';
        $valid = false;
    }

    if (empty ($lname)) {
        $lnameError = 'Please enter Last Name';
        $valid = false;
    }

    if (empty ($dob)) {
        $ageError = 'Please enter Age';
        $valid = false;
    }

    if (empty ($docName)) {
        $docnameError = 'Please enter Doctor Name';
        $valid = false;
    }

    if (empty ($docNumber)) {
        $doccontactError = '';
        $valid = false;
    }

    if (empty ($medicalRecord)) {
        $medinfoError = '';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $id = mysql_query("SELECT * FROM Players ORDER BY player_id DESC LIMIT 1");
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Players (fname,lname,dob,docName,docNumber,medicalRecord,user_id) values(?, ?, ?, ?, ?, ?, ?)";
        try {
            $q = $pdo->prepare($sql);
            echo "Problem-1";
            $q->execute(array(
                $fname,
                $lname,
                $dob,
                $docName,
                $docNumber,
                $medicalRecord,
                $user_id
            ));
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            echo $sql;
        }
        echo "Register Complete";
        header("Location: playerselect.php?reg=true");
        Database::disconnect();
    }
}
?>

