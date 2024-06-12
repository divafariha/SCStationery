<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.rtl.css" integrity="sha512-Om2bVDiRJwpT9sJcj95YLYdECykFzo5dicv/8fzrFhm/uHQRYkapARZb6Ioer8+4KJGL2T1lKIfWxk+LlhfbqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Welcome</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark " style ="background-color: #243763"> 
        <div class="container">
            <a class="navbar-brand" href="../home/welcome.php"><b>- SC STATIONERY -</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../home/welcome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../employees/index.php">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../users/usernya.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../tb_barang/index_barang.php">Tabel barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../reset/reset-password.php">Reset Password</a>
                    </li>
                </ul>
                <div class="tombol">
                    <a href="../logout.php" class="btn btn-secondary">Sign Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Content -->
    <div class="container">
        <div class="wrapper">
            <div class="page-header my-5">
                <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
            </div>
        </div>
    </div>
    
</body>

</html>