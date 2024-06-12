<?php
// Include config file
require_once "../config/config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_username = trim($_POST["username"]);
    if (empty($input_username)) {
        $username_err = "Please enter a username.";
    } elseif (!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $username_err = "Please enter a valid name.";
    } else {
        $username = $input_username;
    }

    // Validate address
    $input_password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
    if (empty($input_password)) {
        $password_err = "Please enter an password.";
    } else {
        $password = $input_password;
    }


    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = $password;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: usernya.php");
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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.rtl.css" integrity="sha512-Om2bVDiRJwpT9sJcj95YLYdECykFzo5dicv/8fzrFhm/uHQRYkapARZb6Ioer8+4KJGL2T1lKIfWxk+LlhfbqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Create Record</title>

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
                        <a class="nav-link " href="../tb_barang/index_barang.php">Tabel barang</a>
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
                <div class="col-6">
                    <div class="page-header my-5">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label for="username">Username</label>
                            <input type="text" name="username" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Username">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label for="password">Password</label>
                            <input type="password" name="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Password">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="usernya.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>