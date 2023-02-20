<?php
$conn = new mysqli("localhost", "root", "", "new");

if (!$conn){
    //     echo "success";
    // }
    // else{
        die("Error". mysqli_connect_error());
    }
?>