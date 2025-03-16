<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require_once("query/student.php"); //import file query student
    $student = find($_GET['id']); //panggil function untuk menampilkan data berdasarkan ID
    ?>
    <div class="container mt-3">

        <h3>Ubah Data Mahasiswa</h3>
        <form action="" method="POST">
            <input class="form-control" type="hidden" name="student_id" value="<?= $student['id'] ?>" />
            <div class="mb-3">
                <label for="code">NRP</label>
                <input class="form-control" type="text" name="student_code" value="<?= $student['nrp'] ?>" />
            </div>
            <div class="mb-3">
                <label for="name">Nama</label>
                <input class="form-control" type="text" name="student_name" value="<?= $student['name'] ?>">
            </div>
            <input type="submit" value="Simpan" class="btn btn-primary">
        </form>

        <?php
        //cek jika user telah mengisi data
        if (isset($_POST['student_code']) && isset($_POST['student_name'])) {

            update($_POST); //memanggil function untuk menyimpan data
        }
        ?>
    </div>
</body>

</html>