<?php
require_once('db_connect.php');
$msg ='';
// $employee = pg_query($db, "select * from emp_prof where emp_name = john");

if(isset($_POST['upload'])){


$name= $_POST['name'];
$target_dir = "images/";
// $imgname = $_FILES['image']['name'];
// echo $imgname;
$target_file = $target_dir.rand().basename($_FILES['image']['name']);
echo $target_file;
echo $_FILES['image']['tmp_name'];
move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
$userdata = pg_query($db, "insert into emp_prof (emp_name , emp_img) values('$name' , '$target_file')");

if($userdata){
    $msg = 'data inserted';
}
else{
    $msg = 'error';
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    .photo{
        height: 200px;
        width: 250px;
        margin-left: 100px;
        margin-top: 100px;
    }
</style>
</head>
<body>
<?php
        // while ($empdata = pg_fetch_array($employee)) {
            ?>


<div class="photo">
<img src="<?php echo $empdata[1]; ?>" alt="">
</div>
<button>
    
</button>
<?php
        
        ?>

    <form class="form-comtrol" action="" method="post" enctype="multipart/form-data">
        <label for="">Name</label>
        <input type="text" name="name">
         <br><br>
         <label for="">upload image</label>

        <input class="form-control mt-5" type="file" name="image">
        <button class="btn btn-primary" type="submit" name="upload">upload</button>
    </form>
    <p><?php  echo $msg; ?></p>
<?php

?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    
</body>
</html>