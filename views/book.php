<?php
$number = 1;
if (!defined('SECURE_ACCESS')) {
    die('Direct access not permitted');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding: 20px;
        }

        /* Hero Section */
        .hero {
            background: #004e92;
            color: #fff;
            padding: 50px 20px;
            text-align: center;
            margin-top: 60px;
            border-bottom: 4px solid #ffc107;
        }

        .hero h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .hero p {
            font-size: 1rem;
        }

        .btn-explore {
            background-color: #ffc107;
            color: #004e92;
            border: none;
            padding: 8px 16px;
            font-weight: 600;
            margin-top: 10px;
        }

        .btn-explore:hover {
            background-color: #c92a2a;
            color: #fff;
            cursor: pointer;
        }

        /* Search Form */
        .form-control {
            padding: 8px 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px 0 0 5px;
            outline: none;
        }

        .form-control:focus {
            border-color: #007bff;
        }

        .btn-outline-success {
            background-color: #ffc107;
            color: #004e92;
            border: none;
            padding: 8px 16px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-outline-success:hover {
            background-color: #0056b3;
        }

        /* Table */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        table thead {
            background-color: #004e92;
            color: #fff;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #e9ecef;
        }

        table th {
            font-weight: bold;
        }

        /* Footer */
        .footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: 0.85rem;
            margin-top: 40px;
        }

        h1 {
            color: #004e92;
            font-size: 2rem;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<div class="hero">
    <h1>Selamat Datang di Halaman Buku</h1>
    <p>Temukan koleksi buku terbaik di sini</p>
</div>

<!-- Search Form -->
<div class="text-center mt-4">
    <form class="d-flex justify-content-center" role="search" method="GET">
        <input 
        class="form-control me-2" 
        type="search" 
        name="query"
        placeholder="Cari Buku" 
        aria-label="Search"
        style="width: 300px;">
        <button class="btn btn-outline-success" type="submit">Cari</button>
    </form>
</div>

<!-- Table -->
<div class="table-responsive">
    <table class="table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $book) : ?>
            <tr>
                <th><?= $number++ ?></th>
                <td><?= $book->getTitle() ?></td>
                <td><?= $book->getAuthor() ?></td>
                <td><?= $book->getYear() ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include('views/templates/footer.php')?>

</body>
</html>
