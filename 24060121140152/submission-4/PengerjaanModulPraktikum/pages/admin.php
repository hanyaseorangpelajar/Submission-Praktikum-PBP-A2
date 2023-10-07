<!--
Nama: Adri Audifirst
NIM: 24060121140152
-->
<?php
// File: admin.php
// Deskripsi: halaman ini hanya dapat ditampilkan jika user telah login, jika belum akan di-redirect ke halaman login.php
session_start(); // inisialisasi session
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include('../header.php');
?>
<br>
<div class="card">
    <div class="card-header">Admin Page</div>
    <div class="card-body">
        <p>Welcome ... </p>
        <p>You are logged in as <b><?php echo $_SESSION['username']; ?></b></p>
        <br><br>
        <a class="btn btn-primary" href="logout.php">Logout</a>
    </div>
</div>
<?php include('../footer.php'); ?>