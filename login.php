<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .login-wrapper {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center login-wrapper">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Admin Login</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $username = $_POST['user_email'];
                            $password = $_POST['user_pass'];

                            if ($username == 'admin' && $password == 'admin123') {
                                header('Location: admin.php');
                                exit;
                            } else {
                                echo '<div class="alert alert-danger">Username atau password salah.</div>';
                            }
                        }
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="user_email">Username</label>
                                <input type="text" class="form-control" id="user_email" name="user_email" required>
                            </div>
                            <div class="form-group">
                                <label for="user_pass">Password:</label>
                                <input type="password" class="form-control" id="user_pass" name="user_pass" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
