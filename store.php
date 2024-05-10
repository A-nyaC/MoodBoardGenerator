<?php

include "dbconfig.php";


$con = mysqli_connect($host, $user, $pass, $db);
    if (!$con) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }

$sql = "INSERT INTO $db.Log (photo1, photo2, photo3, photo4, photo5, photo6, photo7, photo8, photo9) VALUES
('" .$_POST['imageSrc'][0] . "', '" .$_POST['imageSrc'][1]. "','". $_POST['imageSrc'][2] ."','" .$_POST['imageSrc'][3] . "','" .$_POST['imageSrc'][4]."','" .$_POST['imageSrc'][5]."','" .$_POST['imageSrc'][6]."','" .$_POST['imageSrc'][7]."','".$_POST['imageSrc'][8]."')";

if($result = mysqli_query($con, $sql)){
    $parent_id = mysqli_insert_id($con);
    //echo $parent_id;
    //echo 'Stored';

    $sql2 = "INSERT INTO $db.Moodboard (LogID) values (". $parent_id. ")";
    if($result = mysqli_query($con, $sql2)){
        echo 'Success';
}
    else{
        echo ':(....';
    }
}
else{
    echo ':(';
}


?>