<?php
    require './connection.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD APP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>

        <div class="container mt-5">

            <a href="./createUser.php">
            <button type="button" class="btn btn-primary">Add User</button>
            </a>

            <table class="table mt-2">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Function</th>
                    </tr>
                </thead>
                <tbody>  
                    <?php
                        $query = "SELECT * FROM users";
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
                            while ($row = mysqli_fetch_assoc($res)) {
                                print <<< "row"
                                    <tr>
                                        <th scope="row">$row[id]</th>
                                        <td>$row[userName]</td>
                                        <td>$row[email]</td>
                                        <td>
                                            <a href="./updateUser.php?id=$row[id]">
                                                <button type="button" class="btn btn-success">Update</button>
                                            </a>
                                            <a href="./deleteUser.php?id=$row[id]">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                row;
                            }
                        }
                    ?>


                </tbody>
            </table>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    </body>
</html>

