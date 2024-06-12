<?php
// Include config file
require_once "../config/config.php";

// Define variables and initialize with empty values
$id_barang = $nama_barang = $stok_barang = $deskripsi_barang = $harga_barang = "";
$id_barang_err = $nama_barang_err = $stok_barang_err = $deskripsi_barang_err = $harga_barang_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input_id_barang = trim($_POST["id_barang"]);
    if (empty($input_id_barang)) {
        $id_barang_err = "Please enter a id barang.";
    } else {
        $id_barang = $input_id_barang;
    }

    $input_nama_barang = trim($_POST["nama_barang"]);
    if (empty($input_nama_barang)) {
        $nama_barang_err = "Please enter an nama_barang.";
    } else {
        $nama_barang = $input_nama_barang;
    }

    $input_stok_barang = trim($_POST["stok_barang"]);
    if (empty($input_stok_barang)) {
        $stok_barang_err = "Please enter an stok_barang.";
    } else {
        $stok_barang = $input_stok_barang;
    }

    $input_deskripsi_barang = trim($_POST["deskripsi_barang"]);
    if (empty($input_deskripsi_barang)) {
        $deskripsi_barang_err = "Please enter the deskripsi_barang";
    } else {
        $deskripsi_barang = $input_deskripsi_barang;
    }

    $input_harga_barang = trim($_POST["harga_barang"]);
    if (empty($input_harga_barang)) {
        $harga_barang_err = "Please enter an harga_barang.";
    } else {
        $harga_barang = $input_harga_barang;
    }

    // Check input errors before inserting in database
    if (empty($id_barang_err) && empty($nama_barang_err) && empty($stok_barang_err )&& empty($deskripsi_barang_err)&& empty($harga_barang_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO tb_barang (id_barang, nama_barang, stok_barang, deskripsi_barang, harga_barang) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_id_barang, $param_nama_barang, $param_stok_barang, $param_deskripsi_barang, $param_harga_barang);

            // Set parameters
            $param_id_barang = $id_barang;
            $param_nama_barang = $nama_barang;
            $param_stok_barang = $stok_barang;
            $param_deskripsi_barang = $deskripsi_barang;
            $param_harga_barang = $harga_barang;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: index_barang.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
            
        }
        // Close statement
        mysqli_stmt_close($stmt);
        
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Record</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.rtl.css" integrity="sha512-Om2bVDiRJwpT9sJcj95YLYdECykFzo5dicv/8fzrFhm/uHQRYkapARZb6Ioer8+4KJGL2T1lKIfWxk+LlhfbqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Detail Barang</title>
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
                        <a class="nav-link" aria-current="page" href="../home/welcome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../employees/index.php">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../users/usernya.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../tb_barang/index_barang.php">Tabel barang</a>
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

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-6 my-5">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($id_barang_err)) ? 'has-error' : ''; ?>">
                            <label for="id_barang" class="form-label">ID Barang</label>
                            <input type="text" name="id_barang" id="id_barang" class="form-control" value="<?php echo $id_barang; ?>" placeholder="ID Barang">
                            <span class="help-block"><?php echo $id_barang_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($nama_barang_err)) ? 'has-error' : ''; ?>">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?php echo $nama_barang; ?>" placeholder="Nama Barang">
                            <span class="help-block"><?php echo $nama_barang_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($stok_barang_err)) ? 'has-error' : ''; ?>">
                            <label for="stok_barang" class="form-label">Stok Barang</label>
                            <input type="text" name="stok_barang" id="stok_barang" class="form-control" value="<?php echo $stok_barang; ?>" placeholder="Stok Barang">
                            <span class="help-block"><?php echo $stok_barang_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($deskripsi_barang_err)) ? 'has-error' : ''; ?>">
                            <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                            <textarea name="deskripsi_barang" id="deskripsi_barang" class="form-control" placeholder="deskripsi_barang"><?php echo $deskripsi_barang; ?></textarea>
                            <span class="help-block"><?php echo $deskripsi_barang_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($harga_barang_err)) ? 'has-error' : ''; ?>">
                            <label for="harga_barang" class="form-label">Harga Barang</label>
                            <input type="text" name="harga_barang" id="harga_barang" class="form-control" value="<?php echo $harga_barang; ?>" placeholder="Harga Barang">
                            <span class="help-block"><?php echo $harga_barang_err; ?></span>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="../tb_barang/index_barang.php" class="btn btn-secondary ml-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
</body>

</html>