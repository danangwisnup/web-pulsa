<?php
//memulai session
session_start();

if (isset($_SESSION['email'])) {
    header('location: ./');
}

$title = "Login";

//mengincludekan koneksi database
require_once('includes/config.php');
include('includes/header.php');
?>

<?php if (isset($_POST['login'])) {
    $valid = true; //flag validasi

    //cek validasi email
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);

    if (!$email || !$password) {
        $alert_login = "<strong>Error!</strong> Form input is required";
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $alert_login = "<strong>Error!</strong> Invalid email format";
        $valid = false;
    }

    //cek validasi
    if ($valid) {
        //asign a query
        $query = " SELECT * FROM user WHERE email = '" . $email . "' ";
        //excute the query
        $result = $mysqli->query($query);
        if (!$result) {
            die("Could not query the database: <br />" . $mysqli->error);
        } else {
            if ($result->num_rows > 0) {
                $row = $result->fetch_object();
                if (password_verify($password, $row->password)) {
                    $_SESSION['email'] = $row->email;
                    header('Location: ./');
                } else {
                    $alert_login = "<strong>Error!</strong> Login failed";
                }
            } else {
                $alert_login = "<strong>Error!</strong> Login failed";
            }
        }
        //close mysqli connection
        $mysqli->close();
    }
} ?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <br><br><br><br>
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1">
            <div class="row w-100 mx-auto">
                <div class="col-lg-4 mx-auto">
                    <?php
                    if (isset($alert_login)) {
                        echo '<div class="alert alert-warning alert-message">' . $alert_login . '</div>';
                    }
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="auto-form-wrapper">
                                <h3 class="card-title">
                                    <center>Log In</center>
                                </h3>
                                <form action="" method="post" class="forms-sample">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php if (isset($email)) echo $email; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary submit-btn btn-block" name="login">Login</button>
                                    </div>
                                    <div class="form-group d-flex justify-content-between">
                                        <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" checked>
                                                Keep me signed in
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-block text-center my-3">
                                        <span class="text-small font-weight-semibold">Not a member ?</span>
                                        <a href="register" class="text-black text-small">Create new account</a>
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