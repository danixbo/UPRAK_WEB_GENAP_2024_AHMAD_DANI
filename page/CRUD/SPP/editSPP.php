<?php
include '../../../config/database.php';
$db = new database();
$db->koneksi();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $sql = 'SELECT * FROM spp WHERE id = ' . $_GET['id'];
    $result = $db->take($sql);
    if (count($result) == 1) {
        $data = $result[0];
    } else {
        echo "Data Tidak Di";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $sql = 'UPDATE spp SET tahun = ?, nominal = ? WHERE id = ?';
    $params = [
        $_POST['tahun'],
        $_POST['nominal'],
        $_POST['id']
    ];
    $db->execute($sql, $params);

    header('Location: viewSPP.php');
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
                                        <label for="tahun" class="form-label">ID</label>
                                        <input name="id" type="number" class="form-control" id="id" value="<?php echo $data['id']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tahun" class="form-label">Tahun</label>
                                        <input name="tahun" type="year" class="form-control" id="tahun" aria-describedby="emailHelp" maxlength="4" value="<?php echo $data['tahun']; ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="nominal" class="form-label">Nominal</label>
                                        <input name="nominal" type="number" class="form-control" id="nominal" value="<?php echo $data['nominal']; ?>">
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
