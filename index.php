<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Mahasiswa</title>
</head>

<body>
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'beranda'; ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My Web</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Beranda -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page === 'beranda' ? 'active' : ''; ?>" aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <!-- Mahasiswa -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo $page === 'student-data' || $page === 'student-input' ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mahasiswa
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item <?php echo $page === 'student-data' ? 'active' : ''; ?>" href="index.php?page=student-data">Data Mahasiswa</a></li>
                            <li><a class="dropdown-item <?php echo $page === 'student-input' ? 'active' : ''; ?>" href="index.php?page=student-input">Input Data Mahasiswa</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php if (isset($_GET['page'])) : ?>
            <?php
            if ($_GET['page'] == 'student-data') {
                include "pages/student-data.php";
            } elseif ($_GET['page'] == 'student-input') {
                include "pages/student-input.php";
            } elseif ($_GET['page'] == 'student-update') {
                include "pages/student-update.php";
            }
            ?>
        <?php else : ?>
            <div class="">
                <div class="container ">
                    <h1 class="display-4">Haii Friendss</h1>
                    <p class="lead">Selamat Datang di Aplikasi Web</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>