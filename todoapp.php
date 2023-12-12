<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "itaskapp";



$connection = mysqli_connect($server, $username, $password, $db);



if (!$connection) {


    die("connection is failed now " . mysqli_connect_error());
}



$sqlDB = "CREATE DATABASE IF NOT EXISTS " . $db;





$resdb = mysqli_query($connection, $sqlDB);



if ($resdb) {
    echo "db is created ";
}



$sqltbl = "CREATE TABLE IF NOT EXISTS INFO (
    ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY , 
    TITLE NVARCHAR(350), 
    DESCRIPTION TEXT(1000), 
    DATE DATE DEFAULT CURRENT_TIMESTAMP()
    )";



$resTBL = mysqli_query($connection, $sqltbl);

if ($resTBL) {
    echo "success TBL ";
}







if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (isset($_POST["title"])) {
        $title = $_POST["title"];
        $desc = $_POST["desc"];



        $sqlinsert = "INSERT INTO `INFO`( `TITLE`, `DESCRIPTION`) VALUES ('$title','$desc')";



        $res = mysqli_query($connection, $sqlinsert);

        if ($res) {
            echo "inserted";
        }
    }
}



?>







<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- css  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


</head>

<body>

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Your Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="todoapp.php" method="post">
                        <div class="mb-3">
                            <label for="edittitle" class="form-label">Title</label>
                            <input type="text" name="titleEdit" class="form-control" id="edittitle">
                        </div>
                        <div class="mb-3">
                            <label for="editdesc" class="form-label">Description</label>
                            <textarea class="form-control" name="descEdit" id="editdesc" rows="3"></textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>







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
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
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

        <form action="todoapp.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-success" type="submit">Insert </button>
                <button class="btn btn-danger" type="submit">Delete All </button>
            </div>
        </form>
    </div>




    <div class="container">

        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">Handle</th>


                </tr>
            </thead>
            <tbody>
                <?php

                $showdata = "select * from info";
                $result = mysqli_query($connection, $showdata);


                $numberofrows = mysqli_num_rows($result);



                echo "Number of records" . $numberofrows;





                if ($numberofrows > 0) {


                    while ($item = mysqli_fetch_assoc($result)) {
                        echo "<tr><td> " . $item["ID"] . "</td>";
                        echo "<td> " . $item["TITLE"] . "</td>";
                        echo "<td> " . $item["DESCRIPTION"] . "</td> ";


                        echo "<td> 
                        <button type='button' class='btn btn-info edit'>Edit</button>
                        <button type='button' class='btn btn-warning'>Delete</button></td> </tr>";
                    }
                }










                ?>
            </tbody>
        </table>




    </div>







    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


    <script>
        let table = new DataTable('#myTable');
    </script>



    <script>
        edits = document.getElementsByClassName("edit");

        Array.from(edits).forEach(element => {


            element.addEventListener("click", (e) => {

                console.log("my edit is working")



                tr = e.target.parentNode.parentNode;

                title = tr.getElementsByTagName("td")[1].innerText;
                desc = tr.getElementsByTagName("td")[2].innerText;
                console.log(title, desc);

                edittitle.value = title;
                editdesc.value = desc;





                $("#editModal").modal("toggle");
            });







        });
    </script>




</body>

</html>