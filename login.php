<?php
require_once('db_connect.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        #btn_login {
            padding: 8px 60px;
            background-color: #00b33c;
        }

        body {
            background-color: #eaeffa;
        }
    </style>
</head>

<body>

    <nav class="navbar bg-light">
        <div class="container-fluid" style="background-color:#0066cc; height:70px;">
            <a class="navbar-brand" href="#">
                <img src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">

            </a>
            <form action="" method="post">
                <label for="">Username</label>
                <input type="text" name="username" style="padding:5px; border-radius:5px; border:0;">
                <label for="">Password</label>
                <input type="text" name="password" style="padding:5px; border-radius:5px; border:0;">
                <button type="submit" name="login" class="btn btn-primary">Login</button>

            </form>
        </div>
    </nav>
    <?php
    if (isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = pg_query($db, "select * from userdetails where email = '$username' and password = '$password' ");
        if (pg_num_rows($data) > 0) {
            $user_data = pg_fetch_assoc($data);
            session_start();
            $_SESSION['u_name'] = $user_data['firstname'];
            $_SESSION['user_id'] = $user_data['userid'];
            header('location:profile.php');
        }
       
    }

    ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6"></div>


            <div class="col-lg-6 pe-5">
                <h2>Create a new account</h2>
                <form method="post">
                    <div class="mb-3 d-flex p-2 me-2">
                        <input type="text" name="firstname" class="form-control me-2" id="exampleInputEmail1" placeholder="FirstName">
                        <input type="text" name="surname" class="form-control ms-2" placeholder="Surname">
                    </div>
                    <div class="mb-3 me-3">

                        <!-- Email or phone -->
                        <input type="text" class="form-control" name="email" placeholder="Mobile Number or Email address">
                    </div>
                    <div class="mb-3 me-3">
                        <input type="text" class="form-control" name="newpassword" id="exampleInputPassword1" placeholder="New password">
                    </div>
                    <div class="mb-3 form-check">
                        <label class="form-check-label" for="exampleCheck1">Date of birth</label>

                        <input type="date" name="dob">
                        
                    </div>

                    <div>
                        <label for="">Gender :</label>

                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="other" id="inlineRadio2" value="other">
                        <label class="form-check-label" for="inlineRadio2">other</label>
                    </div>

                    <div>
                        <button type="submit" name="signup" class="btn btn-primary mt-4" id="btn_login">Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['signup'])) {

        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['newpassword'];
        $date = $_POST['dob'];
        $gender = $_POST['gender'];
        $result = pg_query($db, "insert into userdetails (firstname,surname,email,password,gender,dob) 
            values('$firstname','$surname','$email','$password','$gender','$date')");
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>