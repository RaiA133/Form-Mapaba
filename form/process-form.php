<?php

$nama = $_POST["nama"];
$prodi = $_POST["prodi"];
$fakultas = $_POST["fakultas"];
$semester = $_POST["semester"];
$hobi = $_POST["hobi"];
$email = $_POST["email"];
$whatsapp = $_POST["no-wa"];
$alamat = $_POST["alamat"];
$domisili = $_POST["domisili"];
$kota = filter_input(INPUT_POST, "kota", FILTER_VALIDATE_INT);
$tgl_lahir = $_POST["tgl-lahir"];
$gender = filter_input(INPUT_POST, "gender", FILTER_VALIDATE_INT);


// var_dump($nama, $prodi, $fakultas, $hobi, $email, $whatsapp, $alamat, $domisili, $kota, $tgl_lahir, $gender);

$host = "localhost";
$dbname = "form_mapaba";
$username = "root";
$password = "";
// $conn = mysqli_connect('localhost', 'root', '', 'form_mapaba');   
    # or
$conn = mysqli_connect(
    hostname : $host, 
    username : $username, 
    password : $password, 
    database : $dbname);

if (mysqli_connect_errno()){
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO data_calon_mapaba_2022 (nama, prodi, fakultas, semester, hobi, email, no_wa, alamat, alamat_domisili, kota, tgl_lahir, gender)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt, "sssssssssisi", 
    $nama, 
    $prodi, 
    $fakultas, 
    $semester, 
    $hobi, 
    $email, 
    $whatsapp,
    $alamat,
    $domisili,
    $kota,
    $tgl_lahir,
    $gender,
);

mysqli_stmt_execute($stmt);

echo "data terkirim.";

// https://www.youtube.com/watch?v=Y9yE98etanU