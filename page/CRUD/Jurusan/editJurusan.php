<?php
include '../../../config/database.php';
$db = new database();
$db->koneksi();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $sql = 'SELECT * FROM jurusan WHERE id = ' . $_GET['id'];
    $result = $db->take($sql);
    if (count($result) == 1) {
        $data = $result[0];
    } else {
        echo "Data Tidak Di Temukan";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $sql = 'UPDATE jurusan SET kode_jurusan = ?, deskripsi = ? WHERE id = ?';
    $params = [
        $_POST['kode_jurusan'],
        $_POST['deskripsi'],
        $_POST['id']
    ];
    $db->execute($sql, $params);

    header('Location: viewJurusan.php');
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
                                        <label for="id" class="form-label">ID</label>
                                        <input name="id" type="number" class="form-control" id="id" value="<?php echo $data['id']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
                                        <input name="kode_jurusan" type="number" class="form-control" id="kode_jurusan" aria-describedby="emailHelp" maxlength="11" value="<?php echo $data['kode_jurusan']; ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <input name="deskripsi" type="text" class="form-control" id="deskripsi" value="<?php echo $data['deskripsi']; ?>" maxlength="50">
                                    </div>
                                    <input name="submit" type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Edit Data">
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
