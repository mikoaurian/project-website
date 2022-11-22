<?php
session_start();

include("koneksi.php");

if (isset($_POST['submit']))
    {
        $username = $_POST['username']; // ada post ambil dr form  
        $password = $_POST['password'];
        
        $sqlCommand = "SELECT * FROM user_login"; // check account yg udh ada d database  
        $query = mysqli_query($con, $sqlCommand);
        
        while ($row = mysqli_fetch_array($query))
        {
            $admin = $row['username']; // ambil dr field tabel database  
            $adminpass = $row['password'];
            
            
            if (($username != $admin) || ($password != $adminpass)) //jika username tdk sma dg database  atau password yg di ketik tdk sma dg database akan tmpl error.  
                  
                { 
                    $error_msg = '=>Your login information is incorrect';
                    
                }
                
            else // brti sma baru buat session    
                {
                    $_SESSION['admin'] = $username;
                    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
                    exit();
                }
                
        }//while 
    }//if

?>    


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Halaman Administrator</title>
  <meta name="description" content="deskripsi website">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/app.min.css" type="text/css">
</head>

<body>
  <div class="container ng-scope">  
  <div class="center-block w-xl w-auto-xs m-b-lg">
    <div class="text-2x m-v-lg text-primary ng-binding"><i class="fas fa-th-large"></i> Administrator</div>
    <div class="m-b text-sm ng-binding">
      Masukkan username dan password yang sudah dibuat
    </div>
    <form action="login_form.php" method="post">
      <div class="form-group m-b-xs">
        <input type="text" placeholder="Username" name="username" class="form-control" >
      </div>
      <div class="form-group m-b-xs">
        <input type="password" placeholder="Password" name="password" class="form-control">
      </div>      
      
      <button type="submit" name="submit" class="btn btn-info p-h-md m-v-lg">Masuk</button>
    </form>
  </div>
</div>


<div class="app-footer ng-scope">
  <div class="p bg-white text-xs ng-scope">
    <div class="pull-right hidden-xs hidden-sm text-muted">
      <strong class="ng-binding">WebHozz Training</strong> - Dibangun oleh tim IT © Copyright 2018
    </div>
    <ul class="list-inline no-margin text-center-xs">   
      <li>Sign in
        <a href="../index.php" target="_blank">Halaman depan</a>
      </li>
    </ul>
</div>


</body>

</html>

