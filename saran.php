<?php
// Konfigurasi database
$host = 'localhost'; // atau alamat server database Anda
$username = 'root'; // ganti dengan username database Anda
$port='3306';
$password = ''; // ganti dengan password database Anda
$database = 'kotak_saran'; // nama database yang telah dibuat

// Koneksi ke database
$conn = new mysqli($host, $username,$port, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['name'];
$email = $_POST['email'];
$saran = $_POST['suggestion'];

// Siapkan dan bind
$stmt = $conn->prepare("INSERT INTO 'saran' ('nama', 'email', 'saran') VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nama, $email, $saran);

// Eksekusi dan cek
if ($stmt->execute()) {
    echo "Saran berhasil dikirim!";
} else {
    echo "Error: " . $stmt->error;
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>