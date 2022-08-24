<html>
    <head>
        <title> </title>
        <?php include "./partial/meta.php"; ?>
        <style><?php include "./../style.css"; ?></style>
        <!-- Base Css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <?php include "./partial/header.php"; ?>

            <div class="container">
                <div class="row bg-lainnya">
                    <div class="align-middle mt-2">
                        <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Beranda</li>
                                </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">

                    <?php include "./partial/menu.php"; ?>

                    <div class="col-md-9 bg-white">
                        <div class="text-center">
                            <h1>SELAMAT DATANG</h1>
                            <p class="text-danger">MEMBACA ADALAH JENDELA DUNIA</p>
                            <img src="../../assets/library.jpg">
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!-- Base Script  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</html>