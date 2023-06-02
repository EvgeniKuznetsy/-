<?php
 $server='localhost';
 $name='root';
 $password='';
 $db='rdzbxyv-m4';
 $conn=mysqli_connect($server,$name,$password,$db);
 if (!$conn) {
    echo 'error'.mysqli_connect_error();
 }