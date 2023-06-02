<?php
require_once('db.php');
$name=$_POST['name'];
$surname=$_POST['surname'];
$patronymic=$_POST['patronymic'];
$login=$_POST['login'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_repeat=$_POST['password_repeat'];


if (isset($_POST['auth'])) {
    if (empty($password)||empty($login)) {
        echo '<script language="javascript">';
    echo 'alert("Заполните все поля")';
    echo '</script>';
       
    }else {
            $sql="SELECT * FROM `users` WHERE login='$login' AND password='$password'";
            $result=$conn->query($sql);
            if ($result->num_rows>0) {
                $row=mysqli_fetch_assoc($result);
            if ($row['role']=='admin') {
                session_start();
                $_SESSION['login']=$row['login'];
                $_SESSION['admin']=$row['role'];
                return header('location:admin.php');
            }
            if ($row['role']=='user') {
                session_start();
                $_SESSION['login']=$login;
                return header('location:index.php');
            }
               
            }else {
                echo '<script language="javascript">';
            echo 'alert("Неверный пороль или логин")';
            echo '</script>';
                
            }
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Регистрация</title>
</head>
<body>
<header>
        <div class="nav">
        <a href="" ><img src="image/logo.svg" alt="" class='logo'></a>
      
       <div class="nav-link">
       <a href="index.php">О нас</a>
        <a href="afisha.php">Афиша</a>

        <a href="whrefind.php">Где нас найти</a>

        <a href="auth.php">Авторизация</a>

        <a href="reg.php">Регистрация</a>
        <?php
         session_start();
       
         if (!isset($_SESSION['login'])) {
         }else {
            if (!isset($_SESSION['admin'])) {
            }else {
              
               echo '<a href="admin.php">Админ-панель</a>';
              
            }
            echo '<form method="post">
            <input type="submit" name="out" value="Выход" class="out">
           </form>';
           
           if (isset($_POST['out'])) {
            session_destroy();
            return header('location:index.php');
            exit();
            echo 'ok';
         }
         }
         
        
        
         
         ?>
        
       </div>
      
        </div>
           
   
    </header>
    <form  method="post" class='reg'>
    <p>Логин</p>
    <input type="text" name='login' class='input'>
    <p>Пороль</p>
    <input type="password" name='password' class='input'>
   <p></p>
    
    <input type="submit" value='Авторизация' name='auth' class='center'>
    </form>
</body>
</html>