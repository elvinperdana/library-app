<?php
require '../../database/database.php';

if (isset($_POST["submit"])) {
    $title = $_POST["inputTitle"];
    $author = $_POST["inputAuthor"];
    $category = $_POST["inputCategory"];
    $price = $_POST["inputPrice"];
    $file = $_FILES['inputPicture']['name'];
        $x = explode('.', $file);
        $ekstensi = strtolower(end($x));
        $ukuran    = $_FILES['inputPicture']['size'];
        $file_tmp = $_FILES['inputPicture']['tmp_name'];
        $newfilename = round(microtime(true)) . '.' . end($x);
        move_uploaded_file($file_tmp, '../../assets/'.$newfilename);

    $query = "INSERT INTO data_mobil VALUES (null, '$newfilename', '$title', '$author', '$category', '$price')";

    mysqli_query($connect, $query);

    if (mysqli_affected_rows($connect) > 0) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!'); 
                document.location.href = 'masterproduct.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!'); 
                document.location.href = 'masterproduct_add.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin || Master Product || Add </title>
        <?php include "./partial/meta.php"; ?>
        <!-- Base Css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <?php include "./partial/header.php"; ?>
        <div class="container">
            <div class="row bg-lainnya">
                <div class="align-middle mt-2">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./datamobil.php">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="./masterproduct.php">Master Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                            </ol>
                    </nav>
                </div>
            </div>
            <div class="row">

                <?php include "./partial/menu.php"; ?>

                <div class="col-md-9 bg-white">
                    <h3 class="mt-3">Add Product</h3>
                    <p>Tambahkan Mobil Yang Ingin Dijual</p>
                    <hr>
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return cekform()">
                        <div class="mb-3">
                            <label for="type" class="form-label">Type :</label>
                            <input type="text" name="inputAuthor" class="form-control" id="inputAuthor" aria-describedby="typeHelp" required>
                            <div id="typeHelp" class="form-text">Civic, Rush, Inova, Pajero, Fortuner</div>
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand :</label>
                            <input type="text" name="inputTitle" class="form-control" id="inputTitle" aria-describedby="brandHelp" required>
                            <div id="brandHelp" class="form-text">Honda, Toyota, Mitsubishi, Suzuki</div>
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Color :</label>
                            <input type="text" name="inputCategory" class="form-control" id="inputCategory" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price :</label>
                            <input type="number" name="inputPrice" class="form-control" id="inputPrice" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="picture" class="mb-3">Input Picture of Your Car :</label>
                            <br>
                            <input type="file" name="inputPicture" accept="image/*" class="form-control-file" id="inputPicture" required>
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <?php include "./partial/footer.php"; ?>  

</html>