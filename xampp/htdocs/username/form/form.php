<?php
ob_start();
$servername = "localhost";
$database = "sekolah";
$username = "root";
$password = "";

// Koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memeriksa jenis operasi yang dipilih
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    switch ($action) {
        case 'insert':
            // Query untuk insert data
            $query_sql = "INSERT INTO murid (username, phone, password) VALUES ('$username', '$phone', '$password')";
            if (mysqli_query($conn, $query_sql)) {
                header("Location: index.html");
                exit();
            } else {
                echo "Insert gagal: " . mysqli_error($conn);
            }
            break;

        case 'update':
            // Query untuk update data
            $query_sql = "UPDATE murid SET phone='$phone', password='$password' WHERE username='$username'";
            if (mysqli_query($conn, $query_sql)) {
                header("Location: index.html");
                exit();
            } else {
                echo "Update gagal: " . mysqli_error($conn);
            }
            break;

        case 'delete':
            // Query untuk delete data
            $query_sql = "DELETE FROM murid WHERE username='$username'";
            if (mysqli_query($conn, $query_sql)) {
                header("Location: index.html");
                exit();
            } else {
                echo "Delete gagal: " . mysqli_error($conn);
            }
            break;

        default:
            echo "Operasi tidak valid";
            break;
    }
}

ob_end_flush();
?>