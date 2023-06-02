<?php
require_once('db.php');
$name=$_POST['name'];
$date=$_POST['date'];
$age=$_POST['age'];
$price=$_POST['price'];
$id=$_POST['id'];
if (isset($_POST['submit'])){
    if (empty($name)||empty($date)||empty($age)||empty($price)||empty($id)) {
        echo '<script language="javascript">';
    echo 'alert("Заполните все поля")';
    echo '</script>';
    }else {
        $fiel_name=$_FILES['file']['name'];
        $fiel_tmp=$_FILES['file']['tmp_name'];
        $fiel_path='image/'.$fiel_name;
        if (move_uploaded_file($fiel_tmp,$fiel_path)) {
           $sql="UPDATE `postanovka` SET `name`='$name',`date`='$date',`age`='$age',`price`='$price',`image`='$fiel_path' WHERE id='$id'";
        if ($conn->query($sql)===TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Постановка отредактирована")';
        echo '</script>';
        }else {
        echo '<script language="javascript">';
        echo 'alert("Постановка не отредактирована")';
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
    <title>Редактирование жанра</title>
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
            <?php 
            require_once('db.php');
            $id=$_POST['id'];
            $sql="SELECT * FROM `postanovka` WHERE id='$id'";
            $result=$conn->query($sql);
            $row=mysqli_fetch_assoc($result)
?>
    <p><h2>Название</h2></p>
    <input type="text" name='name' class='input' value="<?php echo $row['name']?>">
    <p><h2>Фото</h2></p>
    <input type="file" name='file' class='input' value="<?php echo $row['image']?>">
    <p><h2>Дата</h2></p>
    <input type="date" name='date' class='input'value="<?php echo $row['date']?>">
    <p><h2>Возрастной ценз</h2></p>
    <input type="number" name='age' class='input'value="<?php echo $row['age']?>">
    <p><h2>Цена</h2></p>
    <input type="number" name='price' class='input'value="<?php echo $row['price']?>">
    <input type="hidden" value='<?php echo $row['id']?>' name="id">
    <p></p>
    <input type="submit" value='Редактировать постановку' name='submit' class='center'>
    </form><p></p>
    <h2><a href="admin.php">Назад</a></h2>
        </div>
    </main>
    
</body>
</html>