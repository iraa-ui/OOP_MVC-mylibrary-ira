<?php 
if (!defined('SECURE_ACCESS')){
  die('Direct access not permitted');
}

if(isset($_SESSION['is_login']) == false ){
    header("location: /login");
}
$title= "membership";
include('views/templates/header.php'); 
?>


<div class="main-content login-panel login-panel-2">
  <h3 class="panel-title">ini halaman membership</h3>



<?php include('views/templates/footer.php'); ?> 
