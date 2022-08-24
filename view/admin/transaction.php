<?php
require '../../database/database.php';
$querytransaksi = "SELECT * FROM data_transaksi";
$resulttransaksi = mysqli_query($connect, $querytransaksi);
$num_rowtransaksi = mysqli_num_rows($resulttransaksi);
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
                            <li class="breadcrumb-item"><a href="./datamobil.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaction</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">

                <?php include "./partial/menu.php"; ?>

                <div class="col-md-9 bg-white">
                    <h3 class="mt-3">Transaction History</h3>
                    <p>Daftar Orang-Orang Kaya yang Membeli Mobil</p>
                    <hr>
                    <div class="table-responsive p-3">
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Buyer</th>
                                    <th scope="col">Transaction Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                while ($rowtransaksi = mysqli_fetch_assoc($resulttransaksi)) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $no ?></th>
                                        <td><img style="width:100px;heigh:100px" src="../../assets/<?php echo $rowtransaksi['picture']?>"></td>
                                        <td><?php echo $rowtransaksi['author'] ?></td>
                                        <td><?php echo $rowtransaksi['title'] ?></td>
                                        <td><?php echo $rowtransaksi['category'] ?></td>
                                        <td><?php echo strrev(implode('.',str_split(strrev(strval($rowmobil['price'] )),3)))?></td>
                                        <td><?php echo $rowtransaksi['buyer'] ?></td>
                                        <td><?php echo $rowtransaksi['datetime'] ?></td>
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