<?php



$name = array(
    "AbdulKabeer", "Kaif", "Muneeba", "Arsalan",
    "Taha", "Arham", "Dayyan Imran", "Christy", "Ayeshy", "AbdulKabeer", "Kaif", "Muneeba", "Arsalan",
    "Taha", "Arham", "Dayyan Imran", "Christy", "Ayeshy", "Yousuf ",
    "AbdulKabeer", "Kaif", "Muneeba", "Arsalan",
    "Taha", "Arham", "Dayyan Imran", "Christy", "Ayeshy", "AbdulKabeer", "Kaif", "Muneeba", "Arsalan",
    "Taha", "Arham", "Dayyan Imran", "Christy", "Ayeshy", "Yousuf ",
    "AbdulKabeer", "Kaif", "Muneeba", "Arsalan",
    "Taha", "Arham", "Dayyan Imran", "Christy", "Ayeshy", "AbdulKabeer", "Kaif", "Muneeba", "Arsalan",
    "Taha", "Arham", "Dayyan Imran", "Christy", "Ayeshy", "Yousuf ",
    "AbdulKabeer", "Kaif", "Muneeba", "Arsalan",
    "Taha", "Arham", "Dayyan Imran", "Christy", "Ayeshy", "AbdulKabeer", "Kaif", "Muneeba", "Arsalan",
    "Taha", "Arham", "Dayyan Imran", "Christy", "Ayeshy", "Yousuf ",
    "AbdulKabeer", "Kaif", "Muneeba", "Arsalan",
    "Taha", "Arham", "Dayyan Imran", "Christy", "Ayeshy", "AbdulKabeer", "Kaif", "Muneeba", "Arsalan",
    "Taha", "Arham", "Dayyan Imran", "Christy", "Ayeshy", "Yousuf ",
    "AbdulKabeer", "Kaif", "Muneeba", "Arsalan",
    "Taha", "Arham", "Dayyan Imran", "Christy", "Ayeshy", "AbdulKabeer", "Kaif", "Muneeba", "Arsalan",
    "Taha", "Arham", "Dayyan Imran", "Christy", "Ayeshy", "Yousuf "

);




// echo"Students Name ".$name[8];








// for ($i = 0; $i <= count($name) - 5; $i++) {


//     echo "<h1>" . $i . "Student Name" . $name[$i] . "</h1>";
// }









?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <table border="1">


        <thead>
            <tr>
                <th>Student Roll No</th>
                <th>Student Names</th>
            </tr>
        </thead>
        <tbody>

            <?php



            for ($i = 0; $i <= count($name) - 5; $i++) {


                echo "<tr>
                        <td>" . $i . "</td>" .
                    "<td>" . $name[$i] . "</td></tr>";
            }







            ?>





        </tbody>
    </table>

</body>

</html>