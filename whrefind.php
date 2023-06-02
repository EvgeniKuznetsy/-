<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Афиша</title>
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
    <main>
        <div class="container">
            <div class="text-center"><h1>Адресс: Спутник д.1</h1></div>
            <div class="text-center"><h1>Номер телефона: Спутник д.1</h1></div>
            <div class="text-center"><h1>Почта: OMEGA.RU</h1></div>
            
        </div>
    </main>
</body>
</html>