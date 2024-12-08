<?php 
if (!defined('SECURE_ACCESS')) {
  die('Direct access not permitted');
}
$title= "HOME";
include('views/templates/header.php'); 
?>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
  body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa; /* Abu muda lembut */
    margin: 0;
    padding-top: 70px;
    color: #212529; /* Hitam abu */
  }

  /* Navbar */
  .navbar {
    background-color: #343a40; /* Abu gelap */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  .navbar-brand {
    color: #f8f9fa !important;
    font-weight: 700;
    font-size: 1.5rem;
    text-transform: uppercase;
  }
  .navbar-nav .nav-link {
    color: #ced4da !important; /* Abu muda */
    font-weight: 500;
    margin-right: 15px;
  }
  .navbar-nav .nav-link:hover {
    color: #f8f9fa !important; /* Putih saat hover */
  }

  /* Hero Section */
  .hero {
    background: linear-gradient(135deg, #6c757d, #495057); /* Gradasi abu tema Mario */
    color: #f8f9fa; /* Putih lembut */
    padding: 60px 20px;
    text-align: center;
    border-bottom: 4px solid #e63946; /* Merah Mario */
  }
  .hero h1 {
    font-size: 2.5rem;
    margin-bottom: 15px;
  }
  .hero p {
    font-size: 1.2rem;
    color: #dee2e6; /* Abu terang */
  }
  .btn-explore {
    background-color: #e63946; /* Merah Mario */
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-weight: 600;
    border-radius: 30px;
    transition: all 0.3s ease;
    text-transform: uppercase;
  }
  .btn-explore:hover {
    background-color: #c92a2a; /* Merah gelap */
    transform: scale(1.05);
  }

  /* Content Section */
  .content-section {
    padding: 50px 20px;
    text-align: center;
    background-color: #ffffff; /* Putih bersih */
  }
  .content-title {
    font-size: 2rem;
    font-weight: bold;
    color: #495057;
    margin-bottom: 30px;
  }
  .card {
    border: 1px solid #e9ecef;
    border-radius: 10px;
    background-color: #fff;
    padding: 20px;
    margin: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s;
  }
  .card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
  }
  .card img {
    width: 100%;
    height: auto;
    border-radius: 8px;
  }
  .card-title {
    font-weight: bold;
    color: #e63946; /* Merah aksen */
    font-size: 1.2rem;
    margin-top: 10px;
  }
  .card-text {
    font-size: 0.95rem;
    color: #6c757d; /* Abu teks */
  }
  .btn-primary {
    background-color: #495057;
    color: #f8f9fa;
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    transition: all 0.3s ease;
    font-weight: 600;
  }
  .btn-primary:hover {
    background-color: #343a40;
  }

  /* Footer */
  .footer {
    background-color: #212529; /* Hitam abu */
    color: #f8f9fa; /* Putih lembut */
   
    text-align: center;
    font-size: 0.85rem;
  }
</style>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Mario's Corner</a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
    </ul>
  </div>
</nav>

<!-- Hero Section -->
<div class="hero">
  <h1>Selamat Datang di Mario's Corner</h1>
  <p>Jelajahi dunia buku favorit Anda bersama kami</p>
  <a href="#" class="btn btn-explore">Jelajahi Sekarang</a>
</div>

<!-- Content Section -->
<div class="content-section">
  <h2 class="content-title">Buku Pilihan</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <img src="views/img/book.jpg" alt="Book 1">
        <h5 class="card-title">Judul Buku 1</h5>
        <p class="card-text">Deskripsi singkat buku yang menarik untuk dibaca.</p>
        <a href="#" class="btn btn-primary">Baca Sekarang</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="views/img/encyclopedia.webp" alt="Book 2">
        <h5 class="card-title">Judul Buku 2</h5>
        <p class="card-text">Deskripsi singkat buku yang menarik untuk dibaca.</p>
        <a href="#" class="btn btn-primary">Baca Sekarang</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="views/img/OIP.jpg" alt="Book 3">
        <h5 class="card-title">Judul Buku 3</h5>
        <p class="card-text">Deskripsi singkat buku yang menarik untuk dibaca.</p>
        <a href="#" class="btn btn-primary">Baca Sekarang</a>
      </div>
    </div>
  </div>
</div>



<?php include('views/templates/footer.php'); ?>
