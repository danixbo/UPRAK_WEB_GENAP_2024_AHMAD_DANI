<?php
include '../../../config/database.php';
$db = new database();
    
$db->koneksi();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_kelas = $_POST['kode_kelas'];
    $tingkat = $_POST['tingkat'];
    $jurusan_id = $_POST['jurusan_id'];

    $sql = "INSERT INTO kelas (kode_kelas, tingkat, jurusan_id) VALUES (?, ?, ?)";
    $params = [$kode_kelas, $tingkat, $jurusan_id];
    $db->execute($sql, $params);

    header('Location: viewKelas.php');
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../../../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../../../assets/css/styles.min.css" />
</head>
<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../../../assets/images/logos/dark-logo.svg" width="180" alt="">
                                </a>

                                <p class="text-center">Your Social Campaigns</p>
                                <form method="post" action="">
                                    <div class="mb-3">
                                        <label for="kode_kelas" class="form-label">Kode Kelas</label>
                                        <input name="kode_kelas" type="text" class="form-control" id="kode_kelas" aria-describedby="emailHelp" maxlength="10">
                                    </div>
                                    <div class="mb-4">
                                        <label for="tingkat" class="form-label">Tingkat</label>
                                        <input name="kode_kelas" type="text" class="form-control" id="kode_kelas" aria-describedby="emailHelp" maxlength="2">
                                    </div>
                                    <div class="mb-4">
                                        <label for="jurusan_id" class="form-label">Jurusan ID</label>
                                        <input name="jurusan_id" type="number" class="form-control" id="jurusan_id" aria-describedby="emailHelp" maxlength="11">
                                        <div id="emailHelp" class="form-text">Mengikuti Jurusan id yang berada di tabel jurusan</div>
                                    </div>
                                    <input name="submit" type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Tambah Data">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
