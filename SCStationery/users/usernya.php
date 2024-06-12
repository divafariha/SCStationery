<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.rtl.css" integrity="sha512-Om2bVDiRJwpT9sJcj95YLYdECykFzo5dicv/8fzrFhm/uHQRYkapARZb6Ioer8+4KJGL2T1lKIfWxk+LlhfbqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Dashboard</title>

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
                        <a class="nav-link" href="../employees/index.php">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../users/usernya.php">Users</a>
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

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-header clearfix my-5">
                        <h2 class="pull-left">User Employees Details</h2>
                        <a href="createdusers.php" class="btn btn-success pull-right">Add New Users Employee</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../config/config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM users";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Username</th>";
                            echo "<th>Password</th>";
                            echo "<th>Created Users</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['password'] . "</td>";
                                echo "<td>" . $row['created_at'] . "</td>";
                                echo "<td>";
                                echo "<a href='readusers.php?id=" . $row['id'] . "' title='View Record' data-toggle='tooltip'><span class='material-icons'>visibility</span></a>";
                                echo "<a href='updateusers.php?id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><span class='material-icons'>create</span></a>";
                                echo "<a href='deleteusers.php?id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><span class='material-icons'>delete</span></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>