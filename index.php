<?php
session_start();
define('SECURE_ACCESS', true);


$uri = $_SERVER['REQUEST_URI'];
$query_string = $_SERVER ["QUERY_STRING"] ?? null;


if ($uri == '/') {
    return require 'controllers/HomeController.php';
}

if ($uri == '/book') {
    return require 'controllers/BookController.php';
}
if ($uri == '/book?' . $query_string) {
    return require 'controllers/AuthController.php';
}
if($uri == "/register" || $uri == "/login"){
    return require 'controllers/AuthController.php';
}
if($uri == "/visitor"){
    return require 'controllers/VisitorController.php';
}
if($uri == "/membership"){
    return require 'controllers/MembershipController.php';
}
if($uri == "/peminjaman"){
    return require 'controllers/PeminjamanController.php';
}
if($uri == "/pengembalian"){
    return require 'controllers/PengembalianController.php';
}



return require 'views/notFoundPage.php';