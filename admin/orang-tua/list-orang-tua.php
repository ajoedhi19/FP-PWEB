<?php
require_once('../check-login.php');
require_once("../../config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goes To School</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body class="bg-light-purple text-dark d-flex flex-column">

    <div class="container-fluid content flex-grow-1 d-flex flex-column justify-content-center">
        <header class="text-center mt-4">
            <h1>Parent Management</h1>
        </header>

        <section class="mb-4 d-flex flex-column align-items-center justify-content-center">
            <article class="col-md-4 text-left">
                <div class="input-group">
                    <div class="form-outline">
                        <input type="search" id="search" placeholder="Search by Name" class="form-control" />
                    </div>
                    <button onclick="search(event);" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <table class="table table-striped table-hover mt-2">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">No</th>
                            <th scope="col">Parent Of</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM parents";

                        if (isset($_GET['search'])) {
                            $search = $_GET['search'];
                            $sql .= " WHERE name LIKE '%$search%'";
                        }

                        $query = mysqli_query($conn, $sql);

                        while ($ortu = mysqli_fetch_array($query)) {
                            echo "<tr>";

                            echo "<td>" . $ortu['id'] . "</td>";
                            echo "<td>" . $ortu['parent_of'] . "</td>";
                            echo "<td>" . $ortu['name'] . "</td>";
                            echo "<td>" . $ortu['gender'] . "</td>";
                            echo "<td>" . $ortu['date_of_birth'] . "</td>";
                            echo "<td>" . $ortu['address'] . "</td>";
                            echo "<td>" . $ortu['phone_number'] . "</td>";

                            echo "<td>";
                            echo "<a class=\"btn btn-sm btn-warning\" href='edit-orang-tua.php?id=" . $ortu['id'] . "'><i class=\"fas fa-pencil-alt\"></i></a> ";
                            echo "</td>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </article>
            <a class="btn btn-primary" href="./index.php">Back</a>
        </section>

        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'gagal' && isset($_GET['msg'])) {
                echo "<p class=\"text-danger text-center\">$_GET[msg]</p>";
            } else if ($_GET['status'] == 'berhasil') {
                if (isset($_GET['msg'])) {
                    echo "<p class=\"text-success text-center\">$_GET[msg]</p>";
                } else {
                    echo "<p class=\"text-success text-center\">Succesfully changed parent</p>";
                }
            }
        }
        ?>
    </div>

</body>

<script>
    function search(e) {
        e.preventDefault();
        const search = document.getElementById('search').value;
        window.location.href = "list-orang-tua.php?search=" + search;
    }
</script>

</html>