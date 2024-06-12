<?php
// Include config file
require_once "../config/config.php";

// Define variables and initialize with empty values
$nama_barang = $stok_barang = $deskripsi_barang = $harga_barang = "";
$nama_barang_err = $stok_barang_err = $deskripsi_barang_err =  $harga_barang_err ="";

// Processing form data when form is submitted
if (isset($_POST["id_barang"]) && !empty($_POST["id_barang"])) {
    // Get hidden input value
    $id_barang = $_POST["id_barang"];

    $input_nama_barang = trim($_POST["nama_barang"]);
    if (empty($input_nama_barang)) {
        $nama_barang_err = "Please enter a nama barang";
    } else {
        $nama_barang = $input_nama_barang;
    }

    $input_stok_barang = trim($_POST["stok_barang"]);
    if (empty($input_stok_barang)) {
        $stok_barang_err = "Please enter a stok barang";
    } else {
        $stok_barang = $input_stok_barang;
    }

    $input_deskripsi_barang = trim($_POST["deskripsi_barang"]);
    if (empty($input_deskripsi_barang)) {
        $deskripsi_barang_err = "Please enter an deskripsi barang.";
    } else {
        $deskripsi_barang = $input_deskripsi_barang;
    }

    $input_harga_barang = trim($_POST["harga_barang"]);
    if (empty($input_harga_barang)) {
        $harga_barang_err = "Please enter the harga barang ";
    } else {
        $harga_barang = $input_harga_barang;
    }



    // Check input errors before inserting in database
    if (empty($nama_barang_err) && empty($stok_barang_err) && empty($deskripsi_barang_err) && empty($harga_barang_err)) {
        // Prepare an update statement
        $sql = "UPDATE tb_barang SET nama_barang=?, stok_barang=?, deskripsi_barang=?, harga_barang=? WHERE id_barang=?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_nama_barang, $param_stok_barang, $param_deskripsi_barang, $param_harga_barang, $param_id_barang);

            // Set parameters
            $param_nama_barang = $nama_barang;
            $param_stok_barang = $stok_barang;
            $param_deskripsi_barang = $deskripsi_barang;
            $param_harga_barang = $harga_barang;
            $param_id_barang = $id_barang;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
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
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id_barang"]) && !empty(trim($_GET["id_barang"]))) {
        // Get URL parameter
        $id_barang =  trim($_GET["id_barang"]);

        // Prepare a select statement
        $sql = "SELECT * FROM tb_barang WHERE id_barang = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id_barang);

            // Set parameters
            $param_id_barang = $id_barang;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $nama_barang = $row["nama_barang"];
                    $stok_barang = $row["stok_barang"];
                    $deskripsi_barang = $row["deskripsi_barang"];
                    $harga_barang = $row["harga_barang"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: ../error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Update Record</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nama_barang_err)) ? 'has-error' : ''; ?>">
                            <label for="nama_barang" class="form-label">Nama barang</label>
                            <input type="text" name="nama_barang" class="form-control" name="nama_barang" value="<?php echo $nama_barang; ?>">
                            <span class="help-block"><?php echo $nama_barang_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($stok_barang_err)) ? 'has-error' : ''; ?>">
                            <label for="stok_barang" class="form-label">Stok</label>
                            <input type="text" name="stok_barang" class="form-control" name="stok_barang" value="<?php echo $stok_barang; ?>">
                            <span class="help-block"><?php echo $stok_barang_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($deskripsi_barang_err)) ? 'has-error' : ''; ?>">
                            <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                            <textarea name="deskripsi_barang" class="form-control" name="deskripsi_barang"><?php echo $deskripsi_barang; ?></textarea>
                            <span class="help-block"><?php echo $deskripsi_barang_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($harga_barang_err)) ? 'has-error' : ''; ?>">
                            <label for="harga_barang" class="form-label">Harga Barang</label>
                            <input type="text" name="harga_barang" class="form-control" name="harga_barang" value="<?php echo $harga_barang; ?>">
                            <span class="help-block"><?php echo $harga_barang_err; ?></span>
                        </div>
                        <div class="form-group mt-3">
                            <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" />
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="../tb_barang/index_barang.php" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>