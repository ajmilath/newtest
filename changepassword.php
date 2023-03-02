<?php
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="path/to/fontawesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        a {
            padding: 10px;
            text-decoration: none;
        }
        .side i {
            padding: 10px;
            font-size: 25px;
        }

        .top i {
            font-size: 25px;
        }
        button{
         padding: 10px;
        }
        
    </style>
</head>

<body>
    <nav class="navbar bg-light">
        <div class="container-fluid" style="background-color:#0066cc; height:70px;">
            <div class="input-group mb-3">
                <input type="text" class=" w-25" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>




            </div>

        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">

                <div class="d-flex align-items-start side">
                    <div class="nav flex-column nav-pills align-items-start me-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa-solid fa-user"></i><?php echo $_SESSION['u_name']; ?></button>
                        <form action="" method="post">
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"  type="submit" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa-solid fa-pen-to-square"></i>Edit Profile</button>
                        <button class="nav-link" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled" aria-selected="false"><i class="fa-sharp fa-solid fa-key"></i>Change Password</button>
                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa-solid fa-right-from-bracket"></i>Log out</button>
                    </div>

                </div>






            </div>


            <div class="col-lg-5">
                <div class="tab-content top" id="v-pills-tabContent">
                    <a href=""><i class="fa-solid fa-pen-to-square"></i>Update status</a>
                    <a href=""><i class="fa-regular fa-images"></i>Add photo</a>
                    <a href=""><i class="fa-regular fa-note-sticky"></i>write note</a>
                    </form>
                    </div>
                    <div>
                    <form action="" method="post">
                        <div class="mt-5">
                            <div class="mb-3">
                                <input type="text" name="oldpassword" class="form-control" placeholder="Enter old password">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="newpassword" class="form-control" placeholder="Enter new pawwsord">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="confirmpassword" class="form-control" placeholder="Confirm new password">
                            </div>

                        </div>
                        <button type="submit" name="cancel" class="btn btn-success">Cancel</button>
                        <button type="submit" name="change" class="btn btn-success">Change</button>

                    </form>
                    </div>
                
            </div>


        </div>
    </div>

    <?php
    if(isset($_POST['change'])){
        $password = $_POST['oldpassword'];
        $npassword = $_POST['newpassword'];
        $cpassword = $_POST['confirmpassword'];
        require_once ('db_connect.php');
        $user_id = $_SESSION['user_id'];
        $pass_qry = pg_query($db, "select * from userdetails where userid = '$user_id' ");
        $user_data = pg_fetch_assoc($pass_qry);
        $oldpassword = $user_data['password'];
        if($password!=$oldpassword){

            echo "entered password is incorrect";
        }
            else if($npassword!=$cpassword){
                    echo "Entered password missmatched";
                }
                else{

                
                    $result = pg_query($db, "update userdetails set password = '$cpassword' where userid = '$user_id'");
                    echo "<h6>". "Password changed successfully"."<h6>";
    
                }

            }
           
        
        
    
    ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>