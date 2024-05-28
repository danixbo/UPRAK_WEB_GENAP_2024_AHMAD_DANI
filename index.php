<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: page/auth/login.php");
    exit();
}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
    <?php 
    include 'layout/header.php';
    ?>
</body>