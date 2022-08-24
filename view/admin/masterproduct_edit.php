<?php
require '../../database/database.php';

$id = $_GET['id'];
$querybuku = "SELECT * FROM data_mobil WHERE id = $id";
$resultbuku = mysqli_query($connect, $querybuku);
$rowbuku = mysqli_fetch_assoc($resultbuku);
$num_rowbuku = mysqli_num_rows($resultbuku);

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

        $buku = $rowbuku['picture'];

    if($file == null){
        $query = "UPDATE data_mobil SET 
        author = '$author', 
        title = '$title', 
        category = '$category',
        price = '$price',
        picture = '$buku'
        WHERE id = $id
    ";
    }
    else{
        $query = "UPDATE data_mobil SET 
        author = '$author', 
        title = '$title', 
        category = '$category',
        price = '$price',
        picture = '$newfilename'
        WHERE id = $id

    ";

    unlink('../../assets/'.$buku);
    }

    $edit = mysqli_query($connect, $query);

    if ($edit) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!'); 
                document.location.href = 'masterproduct.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!'); 
                document.location.href = 'masterproduct.php?$rowbuku[id]';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin || Master Product || Edit </title>
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
                                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                            </ol>
                    </nav>
                </div>
            </div>
            <div class="row">

                <?php include "./partial/menu.php"; ?>

                <div class="col-md-9 bg-white">
                    <h3 class="mt-3">Edit Product</h3>
                    <p>Edit Informasi Pada Buku Yang Dijual</p>
                    <hr>
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return cekform()">
                        <div class="mb-3">
                            <label for="type" class="form-label">Title Book :</label>
                            <input type="text" name="inputTitle" class="form-control" id="inputAuthor" aria-describedby="titleHelp" value="<?php echo $rowbuku['type']?>" requied>
                            <div id="typeHelp" class="form-text">Civic, Rush, Inova, Pajero, Fortuner</div>
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Author :</label>
                            <input type="text" name="inputAuthor" class="form-control" id="inputAuthor" aria-describedby="authorHelp" value="<?php echo $rowbuku['brand']?>" requied>
                            <div id="brandHelp" class="form-text">Honda, Toyota, Mitsubishi, Suzuki</div>
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Category :</label>
                            <input type="text" name="inputCategory" class="form-control" id="inputCategory" value="<?php echo $rowbuku['color']?>" requied>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price :</label>
                            <input type="text" name="inputPrice" class="form-control" id="inputPrice" value="<?php echo $rowbuku['price']?>" requied>
                        </div>
                        <div class="form-group">
                            <label for="picture" class="mb-3">Input Picture of Your Book :</label>
                            <br>
                            <input type="file" name="inputPicture" accept="image/*" class="form-control-file" id="inputPicture">
                            <?php 
                                if (strlen($rowbuku['picture']) > 0) {
                                ?>
                                <img style="width:100px;heigh:100px" src="../../assets/<?php echo $rowbuku['picture']?>">
                                <?php
                                }
                            ?>
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