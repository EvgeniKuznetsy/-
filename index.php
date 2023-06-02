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
            <script>
function redirectToPage(url) {
  window.location.href = url;
}
</script>
        <div class="container">
            <div class="text-center"><h1>Последние постановки</h1></div>
        <?php
            require_once('db.php');
            $sqlgener="SELECT * FROM `gener`";
            $resultgener=$conn->query($sqlgener);
            while ($rowgener=mysqli_fetch_assoc($resultgener)) {
                $id=$rowgener['id'];
                // echo '<p><h1>Название жанра:  '.$rowgener['name'].'</h1></p>';
            $sql="SELECT * FROM `postanovka` WHERE id_gener='$id'";
            $result=$conn->query($sql);
            while ($row=mysqli_fetch_assoc($result)) {
        
                echo'<p></p>';
                
                echo '<div class="block"  onclick="redirectToPage(\'page.php?id=' . $row['id'] . '\')"><p class="text">'.$row['name'].'</p>';
             
                echo '<img src='.$row['image'].' alt="фото" class="img">';
                 echo'</div>';
                 
            }
            }
            ?>
       <form action="" method="post">
        <input type="hidden" value='' name="id">
       </form>
            
            
        </div>
    </main>
    
</body>
</html>