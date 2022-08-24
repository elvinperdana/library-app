<?php
require '../../database/database.php';
$querybuku = "SELECT * FROM data_mobil";
$resultbuku = mysqli_query($connect, $querybuku);
$num_rowbuku = mysqli_num_rows($resultbuku);
//active menu
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
        
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php $no = 1;
                    while ($rowbuku = mysqli_fetch_assoc($resultbuku)) { ?>
                    <div class="col mb-5">
                        <div class="card h-100 ">
                            <div class="embed-responsive embed-responsive-16by9">    
                                <!-- Product image-->
                                <img src="../../assets/<?php echo $rowbuku['picture']?>" style="width: 100%;height: 10vw;object-fit: cover;">
                            </div>  
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $rowbuku['title'] ?></h5>
                                    <!-- Product price-->
                                    Rp. <?php echo strrev(implode('.',str_split(strrev(strval($rowbuku['price'] )),3)))?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="transaction.php?id=<?php echo $rowbuku['id']?>">Add to Cart</a></div>
                            </div>
                        </div>
                    </div>
                    <?php $no++;
                    } ?>
                </div>
            </div>
        </section>
        
        <?php include "./partial/footer.php"; ?>

    </body>
                    


</html>