<!DOCTYPE html>
<head>
    <title>Dundee F.C</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
</style>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Portfolio</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" onclick="document.getElementById('reg').style.display='block'"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#" onclick="document.getElementById('log').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>
    <div id="main">
        <h3>Please Login to Access The Application</h3>
        <?php
        if($_GET["invalid"] == "true"){
            echo "<label>Invalid Login</label>";
        }

        if($_GET["reg"] == "true"){
            echo "<label>Register Complete</label>";
        }
        ?>
    <div id="log" class="modal">
        <form class="modal-content animate" action="login.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('log').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">
                <label>Username</label>
                    <div class="controls">
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                <label>Password</label>
                    <div class="controls">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
        <div id="reg" class="modal1">
            <form class="modal-content animate" action="reg.php" onsubmit="return validateForm()" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('reg').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
                <div class="container">
                    <div class="control-group <?php echo !empty($usernameError)?'error':'';?>">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input name="username" type="text" placeholder="Username" required  maxlength="20" id="username"
                                   value="<?php echo !empty($username)?$username:'';?>">
                            <?php if (!empty($usernameError)): ?>
                                <span class="help-inline"><?php echo $usernameError;?></span>
                            <?php endif;?>
                        </div>
                    </div>

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

                    <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" type="email" placeholder="Email" required  maxlength="35" id="email"
                                   value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($mobError)?'error':'';?>">
                        <label class="control-label">Mobile</label>
                        <div class="controls">
                            <input name="mob" type="number" placeholder="Mobile"  maxlength="11" required id="mob"
                                   value="<?php echo !empty($mob)?$mob:'';?>">
                            <?php if (!empty($mobError)): ?>
                                <span class="help-inline"><?php echo $mobError;?></span>
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

                    <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="password" type="password" placeholder="Password" required maxlength="25" id="pass"
                                   value="<?php echo !empty($password)?$password:'';?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($password2Error)?'error':'';?>">
                        <label class="control-label">Password Confirmation</label>
                        <div class="controls">
                            <input name="password2" type="password" placeholder="Password Confirmation" required maxlength="25" id="pass2"
                                   value="<?php echo !empty($password2)?$password2:'';?>">
                            <?php if (!empty($passwordError2)): ?>
                                <span class="help-inline"><?php echo $passwordError2;?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <button type="submit">Register</button
                </div>
            </form>
        </div>
</div>
<script>
    // Get the modal
    var modal = document.getElementById('log');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function validateForm() {

        var username = document.getElementById('username').value;
        var fname = document.getElementById('fname').value;
        var lname = document.getElementById('lname').value;
        var pass = document.getElementById('pass').value;
        var pass2 = document.getElementById('pass2').value;
        var mob = document.getElementById('mob').value;
        var email = document.getElementById('email').value;
        var age = new Date(document.getElementById('age').value);

        var today = new Date();
        var year = today.getFullYear();


        if (username.toString().length < 2) {

        window.alert("Username less than 3 Characters long");
        return false;
    }
    if (username.toString().length > 15) {

        window.alert("Username More than 15 Characters long ");
        return false;
    }

    if (fname.toString().length < 2) {

        window.alert("First Name less than 3 Characters long");
        return false;
    }
    if (fname.toString().length > 15) {

        window.alert("First Name More than 15 Characters long ");
        return false;
    }
    if (lname.toString().length < 2) {

        window.alert("Last Name Less than 3 characters long");
        return false;
    }
    if (lname.toString().length > 15) {

        window.alert("Last Name More than 15 Characters long ");
        return false;
    }
    if (pass.toString().length < 6) {

        window.alert("Password less than 6 Characters long");
        return false;
    }
    if (pass.toString().length > 25) {

        window.alert("Password more than 25 Characters long");
        return false;
    }
    if (pass !== pass2 ) {

        window.alert("Passwords Do not match");
        return false;
    }
    if (mob.toString().length < 11) {

        window.alert("Mobile Less than 11 Digits Long");
        return false;
    }
    if (mob.toString().length > 11) {

        window.alert("Mobile more than 11 Digits Long");
        return false;
    }
    if (age == null) {

        window.alert("Please Enter a Vaild Age");
        return false;
    }

    if (age.getFullYear() < (year-100) || age.getFullYear() > (year-6)) {

        window.alert("Enter Valid Age");
        return false;
    }
    if (!validateEmail(email)) {

        window.alert("Email not vaild");
        return false;

    }
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
}

</script>
</body>
</html>