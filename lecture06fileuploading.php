<?php

$server = "localhost";

$username = "root";
$pass = "";
$db = "info";


$con = mysqli_connect($server, $username, $pass, $db);

if (!$con) {


    die("connection db is failed" . mysqli_connect_error());
}

$sqldb = "Create database If not exists " . $db;
$res = mysqli_query($con, $sqldb);




$table = "create table if not exists info (

    Id int auto_increment  primary key   not  null ,

    name  varchar (255),
    path  Text(1000)

)";


$result = mysqli_query($con, $table);


if ($result) {
    echo "tb success";
}


if (isset($_FILES["filenames"])) {


    // echo "<pre>";
    // print_r($_FILES);

    // echo "</pre>";



    $name = $_FILES["filenames"]["name"];
    $path = $_FILES["filenames"]["full_path"];
    $type = $_FILES["filenames"]["type"];
    $tmp_name = $_FILES["filenames"]["tmp_name"];
    $size = $_FILES["filenames"]["size"];



    $upload = move_uploaded_file($tmp_name, "uploadfiles/" . $name);


    if ($upload) {

        $sql = " insert into info (name , path)values('$name', '$path')";



        $resins = mysqli_query($con, $sql);


        if ($resins) {
            echo "inserted";
        }
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <form action="lecture06fileuploading.php" method="post" enctype="multipart/form-data">

        <label for="fi">Select Your File Here</label>
        <input type="file" name="filenames" id="fi">

        <input type="submit" value="submit">


    </form>
</body>

</html>