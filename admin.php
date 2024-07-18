<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <h1>Data Registrasi</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Usia</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Tanggal Kembali</th>
                    <th>Destinasi Perjalanan</th>
                    <th>Paket</th>
                    <th>Syarat & Ketentuan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connection.php';

                $sql = "SELECT * FROM registrations";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["name"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["phone"] . "</td>
                                <td>" . $row["age"] . "</td>
                                <td>" . $row["gender"] . "</td>
                                <td>" . $row["departure_date"] . "</td>
                                <td>" . $row["return_date"] . "</td>
                                <td>" . $row["travel_destinations"] . "</td>
                                <td>" . $row["package"] . "</td>
                                <td>" . ($row["terms_and_conditions"] ? 'Accepted' : 'Not Accepted') . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>Tidak ada data yang ditemukan</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
