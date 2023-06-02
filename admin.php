<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>О нас</title>
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
            <h1>
            <a href="creategener.php">Создать жанр</a>
            <p></p>
            <a href="create.php">Создать постановку</a>
            </h1>
            <p></p>
            <?php
            require_once('db.php');
            $sqlgener="SELECT * FROM `gener`";
            $resultgener=$conn->query($sqlgener);
            while ($rowgener=mysqli_fetch_assoc($resultgener)) {
                $id=$rowgener['id'];
                echo '<p><h1>Название жанра:  '.$rowgener['name'].'<form action="deletgener.php" method="post">
                <input type="hidden" value='.$rowgener["id"].' name="id">
                <input type="submit" value="Удалить" name="delet">
            </form></h1></p>';
            $sql="SELECT * FROM `postanovka` WHERE id_gener='$id'";
            $result=$conn->query($sql);
            while ($row=mysqli_fetch_assoc($result)) {
                echo'<p></p>';
                echo 'Название постановки:  '.$row['name'].'<form action="delet.php" method="post">
                <input type="hidden" value='.$row["id"].' name="id">
                <input type="submit" value="Удалить" name="delet">
            </form>'.'<p></p>'.'<form action="edit.php" method="post">
            <input type="hidden" value='.$row["id"].' name="id">
            <input type="submit" value="Редактирование" name="edit">
        </form>';
          echo'<p></p>';
            }
            }
            ?>
            
        </div>
    </main>
</body>
</html>