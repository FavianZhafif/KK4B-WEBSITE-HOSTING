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
        background: url(https://www.qs.com/wp-content/uploads/2020/08/utrecht-university-qs-top-universities.jpg) no-repeat fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
}
    </style>
</head>
<body style="margin-top: 50px;">
 <div class="container">
  <h3>Create A New Account</h3>
  <?php echo !empty($statusPsn)?'<p class="'.$jenisStatusPsn.'">'.$statusPsn.'</p>':''; ?>
  <div class="regisForm">
   <form action="akunuser.php" method="post">
    <input type="text" name="nama_awal" placeholder="First Name" required="">
    <input type="text" name="nama_akhir" placeholder="Last Name" required="">
    <input type="email" name="email" placeholder="Email" required="">
    <input type="text" name="telp" placeholder="Phone Number" required="">
    <input type="password" name="password" placeholder="Password" required="">
    <input type="password" name="confirm_password" placeholder="Confirm Password" required="">
    <div class="tbl-kirim">
     <input type="submit" name="daftarSubmit" value="Create Account">
      <p><a href="index.php" >Login</a></p>
     <p class="mt-5 mb-3 text-muted">Favian Zhafif Arkan &copy; 2020</p>
    </div>
   </form>
  </div>
 </div>
</body>
</html>
