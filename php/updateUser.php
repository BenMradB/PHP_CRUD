<?php
    require './connection.php';

    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $userName = $_POST['userName']; 
        $email = $_POST['email']; 
        $password = $_POST['password']; 
        
        $query = "UPDATE users SET userName = '$userName', email = '$email', password = '$password' WHERE id = $id";
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
            <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $query = "SELECT * FROM users WHERE id = $id";
                    $res = mysqli_query($con, $query);

                    if (!$res) {

                    } else {
                        $row = mysqli_fetch_assoc($res);
                        print <<< "form"
                            <form method="POST">
                                <div class="form-floating mb-3">
                                    <input type="text" name="userName" value="$row[userName]" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">User Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email"  value="$row[email]" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" value="$row[password]" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                
                                <button type="submit" name="submit" class="form-control btn btn-primary">Update</button>
            
                            </form>
                        form;   
                    }
                }
            ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    </body>
</html>

