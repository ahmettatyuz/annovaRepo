<?php if (!defined("security")) {
    die("Erişim Engellendi");
} ?>
<nav class="navbar navbar-expand-md navbar-dark bg-success">
    <div class="container-fluid">
        <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-list"></i></button>
        <form class="" action="logout.php">
            <div class="dropdown me-5">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                    <?php echo $_SESSION["username"] ?>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a id="sellerNav" class="dropdown-item d-block-inline" href="seller.php">Bayi Profili</a>
                    </li>
                    <li>
                        <button class="dropdown-item d-block-inline text-danger" type="submit">Çıkış Yap</button>
                    </li>
                </ul>
            </div>

        </form>
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a id="salesNav" class="nav-link" href="sellerSales.php">Satışlar</a>
                </li>
                <li class="nav-item">
                    <a id="salesNav" class="nav-link" href="sellerOpportunities.php">Fırsatlar</a>
                </li>
                <li class="nav-item">
                    <a id="salesNav" class="nav-link" href="sellerContact.php">İletişim</a>
                </li>
                <li class="nav-item">
                    <a id="salesNav" class="nav-link" href="sellerProduct.php">Ürün Bilgileri(boş)</a>
                </li>
            </ul>
            <form class="d-flex ms-auto me-3 float-end" action="logout.php">
                <div class="dropdown me-5">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION["username"] ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a id="sellerNav" class="dropdown-item d-block-inline" href="seller.php">Bayi Profili</a>
                        </li>
                        <li>
                            <button class="dropdown-item d-block-inline text-danger" type="submit">Çıkış Yap</button>
                        </li>
                    </ul>
                </div>

            </form>
        </div> -->


    </div>
</nav>

<!-- offcanvas -->
<div style="width:250px" class="offcanvas offcanvas-start bg-success bg-gradient text-light" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <!-- <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Annova Bilgisayar</h5> -->
        <div class="align-middle">
            <img src="view/seller/img/Annova_Logo.png" alt="">
        </div>

        <button type="button" class="btn btn-success" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="offcanvas-body text-dark">
        <p>
            <a href="sellerHome.php" class="btn text-light">
                <i class="fa-solid fa-house"></i><span> Anasayfa</span>
            </a>
        </p>
        <p>
            <a href="sellerSales.php" class="btn text-light">
                <i class="fa-solid fa-cart-plus"></i><span> Satışlar</span></a>
        </p>
        <p>
            <a href="sellerOpportunities.php" class="btn text-light">
                <i class="fa-solid fa-star"></i><span> Fırsatlar</span></a>
        </p>
        <p>
            <a href="sellerContact.php" class="btn text-light">
                <i class="fa-solid fa-address-book"></i><span> İletişim</span></a>
        </p>
        <p>
            <a href="sellerProduct.php" class="btn text-light">
                <i class="fa-solid fa-circle-info"></i><span> Ürün Bilgileri</span> </a>
        </p>
        <p>
            <a href="#" class="btn text-light">
                <i class="fa-solid fa-coins"></i><span> Finansal İşlemler(Boş)</span> </a>
        </p>


    </div>
</div>


<?php
if ((isset($_GET) and isset($_GET["alert"]))) {
    $alert = createAlert($_GET["alert"]);
}
?>


<?php if ($alert != "") : ?>
    <div id="alert" style="display:none;position: absolute; z-index:5; right:20px; top:65px" class="alert alert-warning d-block-inline" role="alert"><?php echo $alert ?></div>
<?php endif; ?>
<script>
    $("#alert").slideDown();
</script>