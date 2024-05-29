
<?php
session_start();

if (isset($_POST['username'])) {
    include "../../config/database.php";

    $db = new database();
    
    $db->koneksi();

    $username = $_POST['username'];
    $password = $_POST['password'];
    print_r($_POST);
    if (empty($username) || empty($password)) {
        $pesan_error = "Username atau password harus diisi.";
    } else {
        $query = "SELECT * FROM admin WHERE username=?";
        $stmt = $db->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $pesan_error = "Username tidak terdaftar.";
        } else {
            $user = $result->fetch_assoc();
            if ($password === $user['password']) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location: ../../index.php");
                exit();
            } else {
                $pesan_error = "Password tidak sesuai";
            }
            
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
                                        <label for="username" class="form-label">Username</label>
                                        <input name="username" type="text" class="form-control" id="username" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input name="password" type="password" class="form-control" id="password">
                                    </div>
                                    <input name="submit" type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Sign In">
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