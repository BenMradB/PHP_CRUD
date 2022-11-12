<?php
    require './connection.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM users WHERE id = $id";
        $res = mysqli_query($con, $query);

        if (!$res) {
            print <<< "error"
                <div class="container mt-2">
                    <div class="alert alert-danger" role="alert">
                        Something went very wrong !!!
                    </div>
                </div>
            error;
        } else {
            header('Location: ./displayUsers.php');
        }
    }
?>