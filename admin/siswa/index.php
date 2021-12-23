<?php
require_once('../check-login.php');
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
            <h1>Student Page</h1>
        </header>

        <section class="mb-4 d-flex flex-column align-items-center justify-content-center">
            <article class="col-md-4 text-center">
                <a href="./tambah-siswa.php" class="btn btn-primary flex">
                    <i class="fas fa-user-plus btn-icon"></i>
                    <p class="m-0 mt-3">Add Student</p>
                </a>
                <a href="./list-siswa.php" class="btn btn-primary flex">
                    <i class="fas fa-clipboard-list btn-icon"></i>
                    <p class="m-0 mt-3">Students List</p>
                </a>
            </article>
            <a class="btn btn-primary" href="../index.php">Back</a>
        </section>

        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'gagal' && isset($_GET['msg'])) {
                echo "<p class=\"text-danger text-center\">$_GET[msg]</p>";
            } else if ($_GET['status'] == 'berhasil') {
                echo "<p class=\"text-success text-center\">Succesfully added student</p>";
            }
        }
        ?>
    </div>

</body>

</html>