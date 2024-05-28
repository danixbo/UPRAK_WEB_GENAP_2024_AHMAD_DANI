<?php
session_start();

if (isset($_POST['submit'])) {
    include "../../config/database.php";

    $db = new database();
    
    $db->koneksi();

    $PasswordLama = $_POST['PWL'];
    $PasswordBaru = $_POST['PWB'];
    $PasswordBaruKonf = $_POST['PWBK'];
    
    if (empty($PasswordLama)) {
        $pesan_error = "Password Lama harus di isi";
    } elseif (empty($PasswordBaru)) {
        $pesan_error = "Password Baru harus di isi";
    } elseif (empty($PasswordBaruKonf)) {
        $pesan_error = "Konfirmasi Password Baru harus di isi";
    } elseif ($PasswordBaru != $PasswordBaruKonf) {
        $pesan_error = "Password Baru dan Konfirmasi Password tidak sama";
    } else {
        // Gunakan prepared statement untuk menghindari SQL Injection
        $query = "SELECT * FROM admin WHERE Username = ? AND PasswordLama = ?";
        $stmt = $db->conn->prepare($query);
        $stmt->bind_param("ss", $Username, $PasswordLama);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Periksa apakah query mengembalikan hasil
        if ($result->num_rows > 0) {
            // Lakukan sesuatu jika autentikasi berhasil
            // Misalnya, redirect ke halaman lain atau lakukan proses lainnya
            header("location: login.php");
            exit();
        } else {
            $pesan_error = "Username or Password Lama is incorrect";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../../assets/css/styles.min.css" />
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
                                    <img src="../../assets/images/logos/dark-logo.svg" width="180" alt="">
                                </a>

                                <p class="text-center">Your Social Campaigns</p>
                                <form method="post" action="">
                                    <?php if (isset($pesan_error)) : ?>
                                        <div class="card text-bg-danger mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title fw-semibold mb-4">Kesalahan Berpikir</h5>
                                                <p class="card-text mb-0"><?php echo $pesan_error; ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="mb-3">
                                        <label for="PWL" class="form-label">Password Lama</label>
                                        <input name="PWL" type="text" class="form-control" id="PWL" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="PWB" class="form-label">Password Baru</label>
                                        <input name="PWB" type="password" class="form-control" id="PWB">
                                    </div>
                                    <div class="mb-4">
                                        <label for="PWBK" class="form-label">Konfirmasi Password Baru</label>
                                        <input name="PWBK" type="password" class="form-control" id="PWBK">
                                    </div>
                                    <input name="submit" type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Ubah Password">
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
