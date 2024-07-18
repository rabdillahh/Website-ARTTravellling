<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = ""; // Ganti dengan password MySQL Anda
    $dbname = "travel"; // Ganti dengan nama database Anda

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Mengambil data dari form
    $name = $_POST['myname1'];
    $email = $_POST['myemail'];
    $phone = $_POST['myphone'];
    $age = $_POST['myage'];
    $gender = $_POST['mygender'];
    $departure_date = $_POST['departuredate'];
    $return_date = $_POST['returndate'];
    $travel_destinations = isset($_POST['td']) ? implode(", ", $_POST['td']) : "";
    $package = $_POST['locations'];
    $terms_and_conditions = isset($_POST['t&c']) ? 1 : 0;

    // Menyiapkan dan mengikat
    $stmt = $conn->prepare("INSERT INTO registrations (name, email, phone, age, gender, departure_date, return_date, travel_destinations, package, terms_and_conditions) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisssssi", $name, $email, $phone, $age, $gender, $departure_date, $return_date, $travel_destinations, $package, $terms_and_conditions);

    // Menjalankan query
    if ($stmt->execute()) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
