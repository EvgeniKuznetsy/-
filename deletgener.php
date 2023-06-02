<?php
require_once('db.php');
$id=$_POST['id'];


if (isset($_POST['delet'])) {
        $sql="DELETE FROM `gener` WHERE id='$id'";
        if ($conn->query($sql)) {
            return header('location:admin.php');
        }else {
            echo 'Не удалось';
        }
    }
