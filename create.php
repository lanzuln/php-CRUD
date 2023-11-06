<!-- header area  -->
<?php include "layout/head.php" ?>

<?php

$error = [];
$data = [];
if (isset($_POST["submit"])) {

    $name = ($_POST["name"]);
    $email = ($_POST["email"]);
    $mobile = ($_POST["mobile"]);

    if (empty($name)) {
        $error['name'] = 'Name is required';
    } else {
        $data['name'] = $name;
    }

    if (empty($email)) {
        $error['email'] = 'Email is required';
    } else {
        $data['email'] = $email;
    }

    if (empty($mobile)) {
        $error['mobile'] = 'Mobile is required';
    } else {
        $data['mobile'] = $mobile;
    }

    if (empty($error['name']) && empty($error['email']) && empty($error['mobile']) ) {


        $sql = "INSERT INTO `crud` (name, email, mobile) VALUES ('$data[name]', '$data[email]', '$data[mobile]')";

        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION['message'] = "User info added";
            header("location: index.php");
        } else {
            die(mysqli_error($con));

        }
    }

}
?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">

                            <h2 class="card-title">Create new user</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="index.php" class="btn btn-info text-light text-decoration-none">Back to list</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <div class="form-group">
                            <label>Your name</label>
                            <input type="text" class="form-control" name="name" autocomplete="off" placeholder="">
                            <code style="color:red"> <?php echo $error['name'] ?? "" ?></code>
                        </div>

                        <div class="form-group">
                            <label>Email email</label>
                            <input type="email" class="form-control" name="email" autocomplete="off" placeholder="">
                            <code style="color:red"> <?php echo $error['email'] ?? "" ?></code>
                        </div>

                        <div class="form-group">
                            <label>Your mobile</label>
                            <input type="tel" class="form-control" name="mobile" autocomplete="off" placeholder="">
                            <code style="color:red"> <?php echo $error['mobile'] ?? "" ?></code>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer area -->
<?php include "layout/footer.php" ?>