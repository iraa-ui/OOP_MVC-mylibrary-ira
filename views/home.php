<?php 
if (!defined('SECURE_ACCESS')) {
  die('Direct access not permitted');
}
$title = "HOME";
include('views/templates/header.php'); 
?>

<style>
  body {
    font-family: 'Poppins', Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding-top: 60px;
    color: #333;
  }

  .navbar {
    background-color: #343a40;
    padding: 12px 30px;
    position: fixed;
    top: 0;
    width: 100%;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 1000;
  }

  .navbar span {
    font-size: 1.5rem;
    font-weight: bold;
  }

  .navbar a {
    color: white;
    text-decoration: none;
    margin: 0 15px;
    font-weight: 600;
    display: flex;
    align-items: center;
    transition: color 0.3s;
  }

  .navbar a i {
    margin-right: 8px;
    font-size: 1.2rem;
  }

  .navbar a:hover {
    color: #f8f9fa;
  }

  /* Hamburger Menu */
  .hamburger-menu {
    display: flex;
    flex-direction: column;
    cursor: pointer;
    gap: 5px;
  }

  .hamburger-menu div {
    background-color: white;
    height: 4px;
    width: 25px;
    border-radius: 4px;
  }

  /* Menu Toggle untuk Mobile */
  .menu-items {
    display: none;
    flex-direction: column;
    position: absolute;
    top: 60px;
    right: 0;
    background-color: #343a40;
    width: 200px;
    text-align: center;
  }

  .menu-items a {
    padding: 15px;
    color: white;
    text-decoration: none;
    font-weight: 600;
  }

  .menu-items a:hover {
    background-color: #495057;
  }

  .menu-active {
    display: flex;
  }

  .hero {
    background: linear-gradient(135deg, #495057, #343a40);
    color: white;
    text-align: center;
    padding: 100px 20px;
  }

  .hero h1 {
    font-size: 3rem;
    margin-bottom: 20px;
  }

  .hero p {
    font-size: 1.2rem;
    font-weight: 400;
  }

  .information {
    background-color: #fff3cd;
    color: #856404;
    padding: 15px;
    margin: 20px 0;
    border-radius: 5px;
    font-size: 1rem;
    text-align: center;
  }

  .information ul {
    list-style-type: none;
    padding: 0;
  }

  .information li {
    margin: 10px 0;
  }

  .information a {
    text-decoration: underline;
  }

  .content-section {
    padding: 40px 20px;
    text-align: center;
    background-color: #ffffff;
    margin-top: 60px;
  }

  .content-section h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    font-weight: bold;
  }

  .card {
    display: inline-block;
    border: 1px solid #ddd;
    border-radius: 8px;
    margin: 15px;
    padding: 15px;
    width: 280px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #fff;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
  }

  .card img {
    width: 100%;
    height: auto;
    border-radius: 5px;
  }

  .footer {
    background-color: #343a40;
    color: white;
    text-align: center;
    padding: 15px;
    font-size: 0.9rem;
    position: fixed;
    width: 100%;
    bottom: 0;
  }
</style>

<div class="navbar">
  <span>Mario's Corner</span>
  <div class="hamburger-menu" onclick="toggleMenu()">
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>

<!-- Menu Dropdown untuk Mobile -->
<div class="menu-items">
  <a href="/login"><i class="fas fa-sign-in-alt"></i> Login</a>
  <a href="/register"><i class="fas fa-user-plus"></i> Register</a>
  <a href="/peminjaman"><i class="fas fa-book"></i> Peminjaman</a>
  <a href="/pengembalian"><i class="fas fa-undo"></i> Pengembalian</a>
</div>

<div class="hero">
  <h1>Selamat Datang</h1>
  <p>Jelajahi dunia buku favorit Anda bersama kami</p>
</div>

<!-- Keterangan Denda dan Wajib Register -->
<div class="information">
  <p><strong>Informasi Penting:</strong></p>
  <ul>
    <li>Denda keterlambatan pengembalian buku: Rp 5.000 per hari (maksimal keterlambatan 3 hari)</li>
    <li>Anda wajib <a href="/register" style="color: #007bff;">mendaftar</a> terlebih dahulu sebelum melakukan peminjaman.</li>
  </ul>
</div>

<div class="content-section">
  <h2>Buku Pilihan</h2>
 
  <div class="card">
    <img src="views/img/encyclopedia.webp" alt="Buku 2">
    <h3>Super mario bros encyclopedia</h3>
    <p>Ensiklopedia ini memberikan informasi yang lengkap dan mendalam tentang berbagai topik, sangat berguna untuk penelitian dan pengetahuan umum.</p>
    <a href="/peminjaman" class="btn btn-primary">Pinjam</a>
  </div>
  <div class="card">
    <img src="views/img/book1.webp" alt="Buku 3">
    <h3>Super mario bros encyclopedia</h3>
    <p>Buku ini merupakan kumpulan cerita pendek yang menggugah pemikiran. Setiap cerita membawa perspektif unik tentang kehidupan dan hubungan antar manusia.</p>
    <a href="/peminjaman" class="btn btn-primary">Pinjam</a>
  </div>
  <div class="card">
    <img src="views/img/book2.jpg" alt="Buku 4">
    <h3>Super mario bross wii</h3>
    <p>Penulis terkenal ini menyajikan karya yang penuh dengan filosofi dan pandangan hidup yang mendalam, cocok untuk mereka yang mencari wawasan baru.</p>
    <a href="/peminjaman" class="btn btn-primary">Pinjam</a>
  </div>
  <div class="card">
    <img src="views/img/book3.webp" alt="Buku 5">
    <h3>Mario bross</h3>
    <p>Novel ini mengisahkan perjuangan seorang tokoh dalam menghadapi tantangan hidup yang penuh dengan ketegangan dan drama.</p>
    <a href="/peminjaman" class="btn btn-primary">Pinjam</a>
  </div>
  <div class="card">
    <img src="views/img/book4.jpg" alt="Buku 6">
    <h3>Mario's big adventure</h3>
    <p>Buku ini mengajak pembaca untuk lebih memahami dunia melalui sudut pandang yang berbeda, penuh dengan fakta menarik dan analisis yang tajam.</p>
    <a href="/peminjaman" class="btn btn-primary">Pinjam</a>
  </div>
</div>

<div class="footer">&copy; 2024 Mario's Corner</div>

<script>
  function toggleMenu() {
    const menu = document.querySelector('.menu-items');
    menu.classList.toggle('menu-active');
  }
</script>
