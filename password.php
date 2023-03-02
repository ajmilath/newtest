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

        .box {
            height: 350px;
            width: 500px;
        }
    </style>
</head>

<body>
    <!-- <nav class="navbar bg-light">
        <div class="container" style="background-color:#0066cc;">
            <a class="navbar-brand" href="#">
                <img src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
            </a>
            <form action="">
                <label for="">Username</label>
                <input type="text">
                <label for="">Password</label>
                <input type="text">
            </form>
        </div>
    </nav> -->

    <nav class="navbar bg-light">
        <div class="container-fluid" style="background-color:#0066cc; height:70px;">
            <a class="navbar-brand" href="#">
                <img src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">

            </a>
            <form action="">
                <label for="">Username</label>
                <input type="text" name="username" style="padding:5px; border-radius:5px; border:0;">
                <label for="">Password</label>
                <input type="text" name="password" style="padding:5px; border-radius:5px; border:0;">
                <button type="submit" class="btn btn-primary">Login</button>

            </form>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12  offset-3 mt-5 box position-relative">
                <h2> Find your account</h2>

                <div class="mt-5">
                    <h6>Please enter your email address or mobile number to search your account</h6>
                    <form action="" method="post">
                    <input type="text" name="username" placeholder="Mobile number or Email" class="form-control mt-5">
                </div>


                    
                        <div class="position-absolute bottom-0 ">

                            <button type="button" class="btn btn-dark me-2 mt-5 ms-5">Clear</button>
                            <button type="submit" name="searchbtn" class="btn btn-primary mt-5 ">Search</button>
                        </div>

                    </form>


                
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['searchbtn'])){
        require_once ('db_connect.php');
        $s_username = $_POST['username'];
        $log = pg_query($db, "select * from userdetails where email = '$s_username'");
        if(pg_num_rows($log)>0){
            echo "<h5>"."Account exist"."</h5>";
        }
        else{
            echo "not exist";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>