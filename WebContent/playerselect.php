<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .modal1 {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 90%; /* Could be more or less, depending on screen size */
    }

    .close1 {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close1:hover,
    .close1:focus {
        color: red;
        cursor: pointer;
    }

    /* Full-width input fields */
    input[type=text], input[type=password], input[type=email], input[type=number], input[type=tel],input[type=date] {
        width: 80%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 80%;
    }

    button:hover {
        opacity: 0.8;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 75%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {-webkit-transform: scale(0)}
        to {-webkit-transform: scale(1)}
    }

    @keyframes animatezoom {
        from {transform: scale(0)}
        to {transform: scale(1)}
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
    }

    #main {
        transition: margin-left .5s;
        padding: 16px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 32px;}
    }

    .videoWrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .grid-container {
        display: grid;
        grid-column-gap: 50px;
        grid-template-columns: auto auto auto;
        padding: 10px;
    }
    .grid-item {
        padding: 20px;
        font-size: 30px;
        text-align: center;
    }
    .col-centered{
        float: none;
        margin: 0 auto;
    }
    textarea {
        width: 80%;
        height: 30%;
        resize: none;
    }
</style>
<nav class="navbar navbar-expand-sm bg-light">

    <p>
        <a href="logout.php" align="right" class="btn btn-danger">Logout</a>
    </p>

</nav>
<?php
session_start();

require 'dbconnect.php';

$stmt = $conn -> prepare("SELECT player_id, fname FROM Players WHERE user_id = ".$_SESSION["user_id"]."");
$stmt->execute();

$stmt->bind_result($player_id,$fname);

$stmt->store_result();
$row_count = $stmt->num_rows;
if($row_count == 0){ echo '<tr><td>No Players currently created</td></tr>';}
else{

    echo '<div class="row">';
    while($stmt->fetch()) {

        echo '<div class="col-sm-4" align="center">
                 <div class="card"  style="width: 18rem;">
                 <img class="card-img-top" src="sample/preset.png" alt="Card image cap" height="286" width="120">
                 <div class="card-body">';
        echo '      <h5 class="card-title">'.$fname.'</h5>';
        echo '      <a href="home.php" class="btn btn-primary">Select</a>';
        echo '      </div> ';
        echo '      </div> ';
        echo '      </div> ';

    }
}
$stmt->free_result();
$stmt->close();

?>

<div class="col-sm-4" align="center">
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="sample/preset.png" alt="Card image cap" height="286" width="120">
    <div class="card-body">
        <h5 class="card-title">Create New</h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary" onclick="document.getElementById('reg').style.display='block'">Register New Player</a>
    </div>
</div>
</div>
</div>


<div id="main">
    <div id="reg" class="modal1">
        <form class="modal-content animate" action="regplayer.php" onsubmit="return validateForm()" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('reg').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">

                <div class="control-group <?php echo !empty($fnameError)?'error':'';?>">
                    <label class="control-label">First Name</label>
                    <div class="controls">
                        <input name="fname" type="text" placeholder="First Name" required maxlength="20" id="fname"
                               value="<?php echo !empty($fname)?$fname:'';?>">
                        <?php if (!empty($fnameError)): ?>
                            <span class="help-inline"><?php echo $fnameError;?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($lnameError)?'error':'';?>">
                    <label class="control-label">Last Name</label>
                    <div class="controls">
                        <input name="lname" type="text" placeholder="Last Name" required maxlength="20" id="lname"
                               value="<?php echo !empty($lname)?$lname:'';?>">
                        <?php if (!empty($lnameError)): ?>
                            <span class="help-inline"><?php echo $lnameError;?></span>
                        <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($ageError)?'error':'';?>">
                    <label class="control-label">Age</label>
                    <div class="controls">
                        <input name="age" type="date" placeholder="Age"  maxlength="15" required id="age"
                               value="<?php echo !empty($age)?$age:'';?>">
                        <?php if (!empty($ageError)): ?>
                            <span class="help-inline"><?php echo $ageError;?></span>
                        <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($docnameError)?'error':'';?>">
                    <label class="control-label">Doctors Name</label>
                    <div class="controls">
                        <input name="docname" type="text" placeholder="Doctors Name" maxlength="20" id="docname"
                               value="<?php echo !empty($docname)?$docname:'';?>">
                        <?php if (!empty($docnameError)): ?>
                            <span class="help-inline"><?php echo $docnameError;?></span>
                        <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($doccontactError)?'error':'';?>">
                    <label class="control-label">Doctors Phone Number</label>
                    <div class="controls">
                        <input name="doccontact" type="text" placeholder="Doctors Mobile Number" maxlength="20" id="doccontact"
                               value="<?php echo !empty($doccontact)?$doccontact:'';?>">
                        <?php if (!empty($doccontactError)): ?>
                            <span class="help-inline"><?php echo $doccontactError;?></span>
                        <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($medinfoError)?'error':'';?>">
                    <label class="control-label">Medical Information</label>
                    <div class="controls">
                        <textarea name="medinfo" type="text" placeholder="Please Enter Medical Information" maxlength="200" id="medinfo"
                                  value=""></textarea>
                    </div>
                </div>


                <button type="submit">Register</button
            </div>
        </form>
    </div>
</div>


</body>

</html>
