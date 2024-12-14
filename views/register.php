<?php
if (!defined('SECURE_ACCESS')) {
    die('Direct access not permitted');
}

$title = "REGISTER | MARIO'S CORNER";
include('templates/header.php');

// Memastikan form di-submit menggunakan POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dan sanitasi input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validasi data input
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username and Password are required.";
    } else {
        // Hash password untuk keamanan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Tentukan role_id (misalnya 1 untuk user biasa)
        $role_id = 1; // Ganti sesuai dengan kebutuhan

        // Koneksi ke database
        $conn = new mysqli('localhost', 'root', '', 'mylibrary'); // Gunakan kredensial yang benar

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query untuk memasukkan data ke tabel users
        $sql = "INSERT INTO users (username, password, role_id) VALUES ('$username', '$hashed_password', '$role_id')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "Registration successful!";
            header('Location: /login'); // Redirect setelah registrasi berhasil
            exit();
        } else {
            $_SESSION['error'] = "Error: " . $conn->error;
        }

        $conn->close();
    }
}

?>

<div class="main-content login-panel">
    <div class="login-body">
        <div class="top d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="assets/images/logo-black.png" alt="Logo">
            </div>
            <a href="index.html"><i class="fa-duotone fa-house-chimney"></i></a>
        </div>
        <div class="bottom">
            <h3 class="panel-title">Registration</h3>
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger text-center">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php elseif (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success text-center">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
            <?php endif ?>
            <form method="POST" action="">
                <div class="input-group mb-25">
                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Username"
                        name="username"
                        value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : "" ?>">
                </div>
                <div class="input-group mb-20">
                    <span class="input-group-text"><i class="fa-regular fa-lock"></i></span>
                    <input type="password" 
                        class="form-control rounded-end" 
                        placeholder="Password"
                        name="password">
                    <a role="button" class="password-show"><i class="fa-duotone fa-eye"></i></a>
                </div>
                <button class="btn btn-primary w-100 login-btn">Sign up</button>
                <div class="mt-3 text-light"> Have you an account? <a href="/login">Click Here</a>
                </div>
            </form>
        </div>
        <?php include('templates/footer.php'); ?>
    </div>
</div>
