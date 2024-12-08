<?php 
if (!defined('SECURE_ACCESS')){
  die('Direct access not permitted');
}

if(isset($_SESSION['is_login']) == false ){
  header("location: /login");
}

$title= "visitor";
include('views/templates/header.php'); 
?>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<div class="main-content login-panel login-panel-2">
  <h3 class="panel-title">ini halaman visitor</h3>


<?php include('templates/footer.php'); ?> 
