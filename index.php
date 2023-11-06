<?php
// header
include "layout/head.php";

if (isset($_POST["submit"])) {
    $name = ($_POST["name"]);
    $email = ($_POST["email"]);
    $mobile = ($_POST["mobile"]);
    $password = ($_POST["password"]);

    // $sql = "insert into `crud` (name, email,mobile, password ) values($name, $email,$mobile, $password)";
    $sql = "INSERT INTO `crud` (name, email, mobile, password) VALUES ('$name', '$email', '$mobile', '$password')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Data inserted successfully";
    } else {
        die(mysqli_error($con));

    }

}
?>

<div class="container my-5">
    <div class="row"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">

                            <h2 class="card-title">All user list</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="create.php" class="btn btn-primary text-light text-decoration-none">Add user</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong>
                            <?php echo $_SESSION['message'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                    }
                    if (isset($_SESSION['delete'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Success!</strong>
                            <?php echo $_SESSION['delete'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                    }

                    unset($_SESSION['message']);
                    unset($_SESSION['delete']);
                    ?>
                    <table class="table table-bordered table-striped" id="userTable">
                        <thead>
                            <tr>
                                <th scope="col">Sl no</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $select = 'SELECT * FROM crud';
                            $result = mysqli_query($con, $select);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <th>
                                            <?php echo $i++ ?>
                                        </th>
                                        <th>
                                            <?php echo $row['name'] ?>
                                        </th>
                                        <th>
                                            <?php echo $row['email'] ?>
                                        </th>
                                        <th>
                                            <?php echo $row['mobile'] ?>
                                        </th>
                                        <th>
                                            <button class="btn btn-warning"><a href="edit.php?id=<?php echo base64_encode($row['id']) ?>"
                                                    class="text-dark text-decoration-none">Edit</a></button>
                                            <button onclick="return confirm('Do you want to delete');"
                                                class="btn btn-danger text-light"><a
                                                    href="delete.php?id=<?php echo base64_encode($row['id']) ?>"
                                                    class="text-light text-decoration-none">Delete</a></button>
                                        </th>
                                    </tr>

                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer area -->
<?php include "layout/footer.php" ?>