<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 0);

$conn = pg_connect("host=localhost dbname=limstore_db user=postgres password=55667788");
if (!$conn) {
    die("<h2 style='color:red;text-align:center;'>❌ Gagal konek ke PostgreSQL</h2>");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LimStore - Data Pelanggan</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
    h1 { text-align: center; color: #2563eb; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    th { background: #2563eb; color: white; }
    tr:nth-child(even) { background: #eaf0ff; }
  </style>
</head>
<body>
  <h1>Daftar Pelanggan</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No. Telepon</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = pg_query($conn, "SELECT * FROM pelanggan ORDER BY id");
      if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($row['id']) . "</td>";
          echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
          echo "<td>" . htmlspecialchars($row['email']) . "</td>";
          echo "<td>" . htmlspecialchars($row['no_telp']) . "</td>";
          echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5' style='text-align:center;'>Tidak ada data pelanggan.</td></tr>";
      }
      pg_close($conn);
      ?>
    </tbody>
  </table>
</body>
</html>
