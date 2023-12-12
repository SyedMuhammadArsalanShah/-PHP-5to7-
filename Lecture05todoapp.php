<?php



$server = "localhost";
$username = "root";
$password = "";
$database = "todoapp";

$conn = mysqli_connect($server, $username, $password, $database);


if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}


$sqldb = "CREATE DATABASE IF NOT EXISTS " . $database;

$res = mysqli_query($conn, $sqldb);


if ($res) {
    echo "success db ";
}







$sqltbl = "CREATE TABLE IF NOT EXISTS INFO (
ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY , 
TITLE NVARCHAR(350), 
DESCRIPTION TEXT(1000), 
DATE DATE DEFAULT CURRENT_TIMESTAMP()
)";



$resTBL = mysqli_query($conn, $sqltbl);

if ($resTBL) {
    echo "success TBL ";
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["userTITLE"];
    $desc = $_POST["userDESC"];





    $sqlinsert = "INSERT INTO `info`( `TITLE`, `DESCRIPTION`) VALUES ('$title','$desc')";


    $resINS = mysqli_query($conn, $sqlinsert);

    if ($resINS) {
        echo "success INS";
    }
}











?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>





    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>



                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>












    <div class="container">


        <form action="Lecture05todoapp.php" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="userTITLE" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">DESCRIPTION</label>
                <textarea class="form-control" name="userDESC" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>