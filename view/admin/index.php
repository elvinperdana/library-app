<?php
require '../../database/database.php';
$querybuku = "SELECT * FROM data_mobil";
$resultbuku = mysqli_query($connect, $querybuku);
$num_rowbuku = mysqli_num_rows($resultbuku);
//active menu
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
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
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                    </nav>
                </div>
            </div>
            <div class="row">

                <?php include "./partial/menu.php"; ?>

                <div class="col-md-9 bg-white">
                    <h3 class="mt-3">Data Mobil</h3>
                    <p>Daftar Mobil Yang Ada Ditoko Ini</p>
                    <hr>
                    <div class="table-responsive p-3">
                        <table id="table_product" class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Book Title</th>
                                    <th scope="col">Penulis</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                while ($rowbuku = mysqli_fetch_assoc($resultbuku)) { ?>
                                    <tr>

                                        <th scope="row"><?php echo $no ?></th>
                                        <td><img style="width:100px;heigh:100px" src="../../assets/<?php echo $rowbuku['picture']?>"></td>
                                        <td><?php echo $rowbuku['title'] ?></td>
                                        <td><?php echo $rowbuku['author'] ?></td>
                                        <td><?php echo $rowbuku['category'] ?></td>
                                        <td>Rp. <?php echo strrev(implode('.',str_split(strrev(strval($rowbuku['price'] )),3)))?></td>
                                    </tr>
                                <?php $no++;
                                } ?>

                            </tbody>
                        </table>
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <?php include "./partial/footer.php"; ?>  

</html>