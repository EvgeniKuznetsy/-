<?php
require_once('db.php');
$name=$_POST['name'];
$date=$_POST['date'];
$age=$_POST['age'];
$price=$_POST['price'];
$id_gener=$_POST['id_gener'];
if (isset($_POST['create'])) {
    if (empty($name)||empty($date)||empty($age)||empty($price)||empty($id_gener)) {
        echo '<script language="javascript">';
    echo 'alert("Заполните все поля")';
    echo '</script>';
       
    }else {
        $fiel_name=$_FILES['file']['name'];
        $fiel_tmp=$_FILES['file']['tmp_name'];
        $fiel_path='image/'.$fiel_name;
        if (move_uploaded_file($fiel_tmp,$fiel_path)) {
           $sql="INSERT INTO `postanovka`(`id`, `name`, `date`, `age`, `price`, `image`, `id_gener`) VALUES (NULL,'$name','$date','$age','$price','$fiel_path','$id_gener')";
        if ($conn->query($sql)===TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Постановка добавлена")';
        echo '</script>';
        }
    }
}}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Добавление жанра</title>
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
        <form  method="post" class='create' enctype="multipart/form-data">
    <p><h2>Название</h2></p>
    <input type="text" name='name' class='input'>
    <p><h2>Фото</h2></p>
    <input type="file" name='file' class='input'>
    <p><h2>Дата</h2></p>
    <input type="date" name='date' class='input'>
    <p><h2>Возрастной ценз</h2></p>
    <input type="number" name='age' class='input'>
    <p><h2>Цена</h2></p>
    <input type="number" name='price' class='input'>
   <p></p>
   <select name="id_gener">
    <p>Выберите жанр</p>
    <?php
    require_once('db.php');
    $sql="SELECT * FROM `gener`";

    $result=$conn->query($sql);
    if ($result->num_rows>0) {
        while ($row=mysqli_fetch_assoc($result)) {
            echo '<option value='.$row["id"].'>'.$row["name"].'</option>';
        }
    }else {
        echo 'Добавте жанр';
        echo '<a href="creategener.php">Создать жанр</a>';
    }
    
    ?>
   </select>
    <p></p>
    <input type="submit" value='Добавить постановку' name='create' class='center'>
    </form><p></p>
    <h2><a href="admin.php">Назад</a></h2>
        </div>
    </main>
    
</body>
</html>