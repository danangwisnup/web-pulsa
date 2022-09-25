<?php
//memulai session
session_start();

if (isset($_SESSION['email'])) {
    header('location: ./');
}

$title = "Register";

//mengincludekan koneksi database
require('includes/config.php');
include('includes/header.php');
?>

<?php if (isset($_POST['register'])) {
    $valid = true; //flag validasi

    //mengambil data dari form
    $nama = test_input($_POST['nama']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $password2 = test_input($_POST['password2']);

    //validasi-validasi
    if (!$nama || !$email || !$password || !$password2) {
        $alert_register_error = "<strong>Error!</strong> Input form is required";
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $alert_register_error = "<strong>Error!</strong> Invalid email format";
        $valid = false;
    } else if ($password != $password2) {
        $alert_register_error = "<strong>Error!</strong> Password not match";
        $valid = false;
    }

    //cek email sudah terdaftar atau belum
    $query_cek = "SELECT * FROM user WHERE email = '" . $email . "'";
    $result_cek = $mysqli->query($query_cek);
    if ($result_cek->num_rows > 0) {
        $alert_register_error = "<strong>Error!</strong> Email already registered";
        $valid = false;
    }

    //password hashing
    $password = password_hash($password, PASSWORD_DEFAULT);

    //cek validasi
    if ($valid) {
        //asign a query
        $query = " INSERT INTO user (nama, email, password, level, balance, status) VALUES ('" . $nama . "', '" . $email . "', '" . $password . "', 'member', 0, 'aktif') ";
        //excute the query
        $result = $mysqli->query($query);
        if (!$result) {
            die("Could not query the database: <br />" . $mysqli->error);
        } else {
            $alert_register_success = '<strong>Success!</strong> Register success, please <a href="login">login</a>';
            header('refresh: 3; url=login');
        }
        //close mysqli connection
        $mysqli->close();
    }
} ?>

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <br><br>
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1">
            <div class="row w-100 mx-auto">
                <div class="col-lg-4 mx-auto">
                    <?php
                    if (isset($alert_register_error)) {
                        echo '<div class="alert alert-warning alert-message">' . $alert_register_error . '</div>';
                    }
                    ?>
                    <?php
                    if (isset($alert_register_success)) {
                        echo '<div class="alert alert-success alert-message">' . $alert_register_success . '</div>';
                    }
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="auto-form-wrapper">
                                <h3 class="card-title">
                                    <center>Register</center>
                                </h3>
                                <form action="" method="post" class="forms-sample">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php if (isset($nama)) echo $nama; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php if (isset($email)) echo $email; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password Verify</label>
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Password Verify" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary submit-btn btn-block" name="register">Register</button>
                                    </div>
                                    <div class="text-block text-center my-3">
                                        <span class="text-small font-weight-semibold">Have a account ?</span>
                                        <a href="login" class="text-black text-small">Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php include('includes/footer.php'); ?>