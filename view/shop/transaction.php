<?php
require '../../database/database.php';

$id = $_GET['id'];
$querybuku = "SELECT * FROM data_mobil WHERE id = $id";
$resultbuku = mysqli_query($connect, $querybuku);
$rowbuku = mysqli_fetch_assoc($resultbuku);
$num_rowbuku = mysqli_num_rows($resultbuku);

if (isset($_POST["submit"])) {
    $buyer = $_POST["inputName"];
    $file_buyer = $_POST['inputPicture'];
    $author_buyer = $_POST['inputAuthor'];
    $title_buyer = $_POST['inputTitle'];
    $category_buyer = $_POST['inputCategory'];
    $price_buyer = $_POST['inputPrice'];
    $time = $_POST["waktu"];
    
    $query = "INSERT INTO data_transaksi VALUES (null, '$file_buyer', '$title_buyer', '$author_buyer', '$category_buyer', '$price_buyer', '$buyer', ' $time')";

    mysqli_query($connect, $query);

    if (mysqli_affected_rows($connect) > 0) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!'); 
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!'); 
                document.location.href = 'transaction.php';
            </script>";
    }
}

?>


<html>
    <head>
        <title></title>
        <?php include "./partial/meta.php"; ?>

        <!-- Base Css -->
    </head>

    <body>
        <div>
        <?php include "./partial/menu.php"; ?>
        </div>
        <?php include "./partial/header.php"; ?>
        <div class="container" style="width: 1000px !important; margin-bottom:40px">
            <div class="bg-form-css">
                <div class="mt-5 text-center bg-title-transaction">
                    <h2> Mau Beli BOSS </h2>
                    <p> Isi Data Dulu ya BOSS </p>
                </div>
                    <form class ="container" action="" method="post" enctype="multipart/form-data" onsubmit="return cekform()">
                        <div class="row" style="padding:0 20px;">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                        <label for="type" class="form-label">Type :</label>
                                        <input type="text" name="inputType" class="form-control" id="inputType" value="<?php echo $rowmobil['type']?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="brand" class="form-label">Brand :</label>
                                        <input type="text" name="inputBrand" class="form-control" id="inputBrand" value="<?php echo $rowmobil['brand']?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="color" class="form-label">Color :</label>
                                        <input type="text" name="inputColor" class="form-control" id="inputColor" value="<?php echo $rowmobil['color']?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price :</label>
                                        <input type="text" name="inputPrice" class="form-control" id="inputPrice" value="<?php echo $rowmobil['price']?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="picture" class="mb-3">Input Picture of Your Car :</label>
                                        <br>
                                        <input type="hidden" name="inputPicture" accept="image/*" class="form-control-file" id="inputPicture" value="<?php echo $rowmobil['picture']?>">
                                        <?php 
                                            if (strlen($rowmobil['picture']) > 0) {
                                            ?>
                                            <img style="width:200px;3eigh:100px" src="../../assets/<?php echo $rowmobil['picture']?>">
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Nama Anda :</label>
                                        <input type="text" name="inputName" class="form-control" id="inputName" required>
                                    </div>
                                    <br>
                                    <br>
                                    <input type="hidden" name="waktu" value="<?php echo date('Y-m-d H:i:s') ?>">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div> 
                        </div>
                    </form>
                </div>    
                                   
            </div>
        </div>
        
        <?php include "./partial/footer.php"; ?>

    </body>
                    


</html>