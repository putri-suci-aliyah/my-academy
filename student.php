<?php
// Function untuk menampilkan data 
function index()
{
    require_once "database.php"; // Memanggil koneksi database
    $students = $conn->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
    $conn = null; // Menutup kembali koneksi database
    return $students; // Mengembalikan nilai dari hasil query
}

function save($post)
{
    require_once "database.php"; // Memanggil koneksi database

    // Validasi data dari $post
    if (isset($post['student_code'], $post['student_name'])) {
        $code = $post['student_code'];
        $name = $post['student_name'];

        // Kueri untuk menyimpan data
        $sql = "INSERT INTO students (code, name) VALUES ('$code', '$name')";

        // Coba jalankan kueri dan tangkap error
        try {
            $result = $conn->exec($sql);
            if ($result !== false) {
                // Redirect ke halaman data student jika berhasil
                header('Location: /my-academy/index.php?page=student-data');
                exit;
            } else {
                // Jika gagal, tampilkan pesan error
                echo "Gagal menyimpan data.";
            }
        } catch (PDOException $e) {
            // Tampilkan pesan error jika ada masalah pada eksekusi
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Data tidak valid. Pastikan semua input terisi.";
    }
    $conn = null; // Menutup koneksi database
}
function find($id)
{
    require_once "database.php"; // Memanggil koneksi database

    $id = (int)$id;
    $student = $conn->query("SELECT * FROM students WHERE 'id'=$id")->fetch(PDO::FETCH_ASSOC);
    $conn = null; // Menutup kembali koneksi database
    return $student; // Mengembalikan nilai dari hasil query
}


function update($student)
{
    require "database.php";
    $id = $student['student_id'];
    $code = $student['student_code'];
    $name = $student['student_name'];

    // Perbaikan query SQL (hilangkan tanda kutip di sekitar nama kolom)
    $sql = "UPDATE students SET 'code'='" . $code . "', 'name'='" . $name . "' WHERE id=$id";
    echo $sql;
    if ($conn->exec($sql) === false) {
        print_r($conn->errorInfo()[2]);
    } else {
        header('location: /my-academy/index.php?page=student-data');
    }
    $conn = false; // Tutup koneksi
}
