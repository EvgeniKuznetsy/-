<?php
require_once('db.php');
$name=$_POST['name'];
if (isset($_POST['create'])) {
    if (empty($name)) {
        echo '<script language="javascript">';
    echo 'alert("Заполните все поля")';
    echo '</script>';
       
    }else {
         $sql="INSERT INTO `gener`(`id`, `name`) VALUES (NULL,'$name')";
        if ($conn->query($sql)===TRUE) {
            echo '<script language="javascript">';
    echo 'alert("Жанр добавлен")';
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
    <title>Редактирование постановки</title>
</head>
<body>
<header>
        <div class="nav">
        <a href="index.php" ><img src="image/logo.svg" alt="" class='logo'></a>
      
       <div class="nav-link">
       <a href="index.php">О нас</a>
        <a href="afisha.php">Афиша</a>

        <a href="whrefind.php">Где нас найти</a>

        <a href="auth.php">Авторизация</a>

        <a href="reg.php">Регистрация</a>
        <?php
         session_start();
       
        
            if (!isset($_SESSION['admin'])) {
                session_destroy();
                return header('location:index.php');
            exit();
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
         }
         
         
        
        
         
         ?>
        
       </div>
      
        </div>
           
   
    </header>
    <main>
        <div class="container">
        <form  method="post" class='create'>
    <p><h2>Название</h2></p>
    <input type="text" name='name' class='input'>
   <p></p>
    
    <input type="submit" value='Добавить жанр' name='create' class='center'>
    </form><p></p>
    <h2><a href="admin.php">Назад</a></h2>
        </div>
    </main>
    
</body>
</html>