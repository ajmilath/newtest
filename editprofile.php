<?php
session_start();
require_once ('db_connect.php');

$id = $_SESSION['user_id'];
$data = pg_query($db, "select * from userdetails where userid = '$id'");
$user_data = pg_fetch_array($data);
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
                    <div class="nav flex-column nav-pills align-items-start me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a href=""><i class="fa-solid fa-user"></i><?php echo $_SESSION['u_name']; ?></a>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa-solid fa-pen-to-square"></i>Edit Profile</button>
                        <button class="nav-link" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled" aria-selected="false"><i class="fa-sharp fa-solid fa-key"></i>Change Password</button>
                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa-solid fa-right-from-bracket"></i>Log out</button>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 top">
                <div class="tab-content" id="v-pills-tabContent">
                    <a href=""><i class="fa-solid fa-pen-to-square"></i>Update status</a>
                    <a href=""><i class="fa-regular fa-images"></i>Add photo</a>
                    <a href=""><i class="fa-regular fa-note-sticky"></i>write note</a>
                </div>

                <div class="mt-5">
                    <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" name="image">
                    <button type="submit" name="fileupload">Upload</button>
                    
                </div>

                <div class="mb-3 d-flex p-2 me-2 mt-2">
                    <input type="text" class="form-control me-2" id="" name="new_name" placeholder="<?php echo $_SESSION['u_name']; ?>">
                    <input type="text" class="form-control ms-2" name="new_surname" placeholder="<?php echo $user_data[2]; ?>">
                </div>

                <div class="mb-3 me-3">
                    <input type="text" class="form-control" name="user_name" placeholder="<?php echo $user_data[3]; ?>">
                </div>

                <div class="mb-3">
                    <label for="">Date of Birth</label>
                    <input required="" name="new_date"  placeholder="<?php echo $user_data[6]; ?>" onfocus="(this.type='date')"/>
                    <!-- <input type="date" placeholder=""><br> -->
                    <!-- <fieldset id="birthdate">
                        <input type="text" name="birthday_day" id="birthday_day" size="2" maxlength="2" value="" />

                        <input type="text" name="birthday_month" id="birthday_month" size="2" maxlength="2" value="" />

                        <input type="text" name="birthday_year" id="birthday_year" size="4" maxlength="4" value="" />
                    </fieldset> -->
                </div>

                <div>
                    <label for="">Gender</label>
                </div>


                <?php 
                        
                         
                           
                        if($user_data[5] == 'male'){

                                 
                        ?>
                        <input   type="radio" name="gender" value="male" checked ="checked" id="flexRadioDefault1"> Male
                        <input  type="radio" name="gender" value="female"  id="flexRadioDefault1"> Female

                        <?php
                        }
                        else{
 

                        ?>
                        <input class="form-check-input" type="radio" name="gender" value="male"  id="flexRadioDefault1"> Male
                        <input class="form-check-input" type="radio" name="gender" checked ="checked" value="female"  id="flexRadioDefault1"> Female

                        <?php 
                        }
                        ?>

               
                <div class="mt-5">
                    <button type="button" class="btn btn-success">Cancel</button>
                    <button type="submit" name="updatebtn" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>


        </div>
    </div>


<?php 
// if(isset($_POST['fileupload'])){
//     // $upd = pg_query($db, "insert into userdetails(emp_image) values 
//     // ('$target_file')");
// }
if(isset($_POST['updatebtn'])){
    
    

    $n_name = $_POST['new_name'];
    $n_surname = $_POST['new_surname'];
    $username = $_POST['user_name'];
    $n_date = $_POST['new_date'];
    $n_gender = $_POST['gender'];
    $upd = pg_query($db, "update userdetails set firstname = '$n_name', surname = '$n_surname',email = '$username', dob = '$n_date', gender = '$n_gender',emp_image = '$target_file' where userid = '$id' ");

}
?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>