<?php
require_once('db.php');
$name=$_POST['name'];
$surname=$_POST['surname'];
$patronymic=$_POST['patronymic'];
$login=$_POST['login'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_repeat=$_POST['password_repeat'];


if (isset($_POST['reg'])) {
    if (empty($name)||empty($surname)||empty($patronymic)||empty($email)||empty($password)||empty($password_repeat)||empty($login)) {
        echo '<script language="javascript">';
    echo 'alert("Заполните все поля")';
    echo '</script>';
       
    }else {
        if (strlen($password)<5||$password!=$password_repeat) {
            echo '<script language="javascript">';
            echo 'alert("Пороль должен содержать не менее 6 символов,а также совпадать с полем проверки")';
            echo '</script>';
           
        }else {
            $sql="SELECT * FROM `users` WHERE login='$login'";
            $result=$conn->query($sql);
            if ($result->num_rows>0) {
                echo '<script language="javascript">';
            echo 'alert("Логин уже занят")';
            echo '</script>';
               
            }else {
                $sql="INSERT INTO `users`(`id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `role`) VALUES
                (NULL,'$name','$surname','$patronymic','$login','$email','$password','user')";
                if ($conn->query($sql)===TRUE) {

                    return header('location:index.php');
                }
            }
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
    <p>Имя</p>
    <input type="text" name='name' class='input'>
    <p>Фамилия</p>
    <input type="text" name='surname' class='input'>
    <p>Отчество</p>
    <input type="text" name='patronymic' class='input'>
    <p>Логин</p>
    <input type="text" name='login' class='input'>
    <p>Почта</p>
    <input type="text" name='email' class='input'>
    <p>Пороль</p>
    <input type="password" name='password' class='input'>
    <p>Повторите пороль</p>
    <input type="password" name='password_repeat' class='input'>
    <p></p>
   <span class='checkbox'><input type="checkbox">Согласие с правилами регистрации</span>
   <p></p>
    
    <input type="submit" value='Зарегестрироваться' name='reg' class='center'>
    </form>
</body>
</html>