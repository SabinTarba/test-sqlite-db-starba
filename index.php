<?php

$db = new PDO('sqlite:db.sqlite');

$statement = $db->query("SELECT * FROM users");

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];


    $sql = "INSERT INTO users (user, password) VALUES (?,?)";
    $db->prepare($sql)->execute([$user, $password]);


    header('Location: index.php');
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testing sqlite database </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label>User</label>
                <input type="text" class="form-control" placeholder="Enter user" name="user">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>

            <button type="submit" class="btn btn-primary mt-2" name="submit">Submit</button>
        </form>
    </div>

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>

                <?php

                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>" . $row['user'] . "</td><td>" . $row['password'] . "</td></tr>";
                }

                ?>


            </tbody>
        </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>