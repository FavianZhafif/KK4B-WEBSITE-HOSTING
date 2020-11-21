<?php
session_start();
$sesiData = !empty($_SESSION['sesiData'])?$_SESSION['sesiData']:'';
if(!empty($sesiData['status']['msg'])){
    $statusPsn = $sesiData['status']['msg'];
    $jenisStatusPsn = $sesiData['status']['type'];
    unset($_SESSION['sesiData']['status']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD KK4-B WEBSITE</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <style>
        body {
        background: url(https://www.facamp.com.br/wp-content/uploads/2016/04/holandaitalia.jpg) no-repeat fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
}
    </style>
</head>
<body style="margin-top: 150px;">
 <div class="container">
    <?php
   if(!empty($sesiData['userLoggedIn']) && !empty($sesiData['userID'])){
    include 'user.php';
    $user = new User();
    $kondisi['where'] = array(
     'id' => $sesiData['userID'],
    );
    $kondisi['return_type'] = 'single';
    $userData = $user->getRows($kondisi);
    ?>
  <div class="new">
    <a href="index1.php?logoutSubmit=1" class="btn btn-lg btn-success btn-block">-------------------------------  Klik Disini untuk Melanjutkan ------------------------------</a>
    </div>
        <?php }else{ ?>
  <h3>Login to your account</h3>
        <?php echo !empty($statusPsn)?'<p class="'.$jenisStatusPsn.'">'.$statusPsn.'</p>':''; ?>
    
  <div class="regisForm">
   <form action="akunuser.php" method="post">
    <input type="email" name="email" placeholder="Email" required="">
    <input type="password" name="password" placeholder="Password" required="">
    <div class="tbl-kirim">
     <input type="submit" name="loginSubmit" value="Login">
     <p><a href="daftar.php" >Create Account</a></p>
      <p class="mt-5 mb-3 text-muted">Favian Zhafif Arkan &copy; 2020</p>
    </div>
   </form>
  </div>
 </div>
 <?php } ?>
</body>
</html>