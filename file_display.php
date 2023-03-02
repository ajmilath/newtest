<?php
require_once('db_connect.php');
$employee = pg_query($db, "select * from emp_prof");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">

        <tr>
            <th>Name</th>
            <th>Profile</th>
        </tr>
        <?php
        while ($empdata = pg_fetch_array($employee)) {


        ?>
            <tr>
                <td><?php echo $empdata[0]; ?></td>
                <td><img src="<?php echo $empdata[1]; ?>" height="250" width="350" alt=""></td>
            </tr>

        <?php
        }
        ?>
    </table>
</body>

</html>