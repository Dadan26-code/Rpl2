<?php
// Koneksi ke database
$host = "localhost"; // sesuaikan dengan pengaturan server Anda
$user = "root"; // sesuaikan dengan username database Anda
$password = ""; // sesuaikan dengan password database Anda
$database = "sekolah"; // sesuaikan dengan nama database Anda

$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data siswa
$sql = "SELECT username, phone FROM murid";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Siswa</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }

    table,
    th,
    td {
      border: 1px solid #ccc;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <h2>Data Siswa</h2>
  <table>
    <tr>
      <th>Username</th>
      <th>Number Phone</th>
    </tr>

    <?php
        // Cek apakah ada hasil dari query
        if ($result->num_rows > 0) {
            // Output data per baris
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data siswa</td></tr>";
        }
        $conn->close();
        ?>
  </table>
</body>

</html>