<?php
/*
    admin navbar ve sidebar kısımlarının gorunumu

*/
$adminAuthority=$_SESSION["adminAuthority"];

if (!defined("securityAdmin")) {
    die("Erişim Engellendi");
} ?>

<!-- navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-danger sticky-top">
    <div class="container-fluid">
        <button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-list"></i></button>
        <!-- <a class="navbar-brand" href="adminHome.php"><i class="fa-solid fa-list"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <!-- <div class="collapse navbar-collapse" id="navbarNavDropdown"> -->
        <!-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="adminSellers.php">Bayiler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminLicence.php">Lisans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminUsers.php">Kullanıcılar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminAnalysis.php">Analiz(boş)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminLog.php">Log Tablosu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminOpportunities.php">Fırsatlar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Finansal İşlemler(boş)</a>
                </li>
            </ul> -->
        <form class="d-flex ms-auto me-3 float-end" action="adminLogout.php">
            <div class="dropdown me-5">
                <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user"></i>
                    <?php echo $_SESSION["adminUsername"] ?>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a id="sellerNav" class="dropdown-item d-block-inline" href="#">Admin Profili</a>
                    </li>
                    <li>
                        <button class="dropdown-item d-block-inline text-danger" type="submit">Çıkış Yap</button>
                    </li>
                </ul>
            </div>
        </form>
        <!-- </div> -->
    </div>
</nav>
<!-- offcanvas -->
<div style="width: 250px;" class="offcanvas offcanvas-start bg-danger bg-gradient text-light" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
    <div class="align-middle">
            <img src="view/admin/img/Annova_Logo.png" alt="">
        </div>
        <button type="button" class="btn btn-danger" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="offcanvas-body text-dark">
        <p>
            <a href="adminHome.php" class="btn text-light">
                <i class="fa-solid fa-house"></i><span> Anasayfa</span>
            </a>
        </p>
        <p>
            <a href="adminSellers.php" class="btn text-light">
                <i class="fa-solid fa-shop"></i><span> Bayiler</span></a>
        </p>
        <?php if($adminAuthority==3): ?>
        <p>
            <a href="adminUsers.php" class="btn text-light">
                <i class="fa-solid fa-user-group"></i><span> Kullanıcılar</span></a>
        </p>
        <?php endif; ?>
        <?php if($adminAuthority>=2): ?>
        <p>
            <a href="adminLicence.php" class="btn text-light">
                <i class="fa-solid fa-cart-plus"></i><span> Lisans</span></a>
        </p>
        <?php endif; ?>
        <?php if($adminAuthority>=2): ?>
        <p>
            <a href="adminLog.php" class="btn text-light">
                <i class="fa-solid fa-book"></i><span> Log Tablosu</span> </a>
        </p>
        <?php endif; ?>
        <?php if($adminAuthority>=2): ?>
        <p>
            <a href="adminOpportunities.php" class="btn text-light">
                <i class="fa-solid fa-star"></i><span> Fırsatlar</span> </a>
        </p>
        <?php endif; ?>
        <p>
            <a href="adminAnalysis.php" class="btn text-light">
                <i class="fa-solid fa-chart-line"></i>
                <span> Analiz(Boş)</span> </a>
        </p>
        <p>
            <a href="#" class="btn text-light">
                <i class="fa-solid fa-coins"></i>
                <span> Finansal İşlemler(Boş)</span> </a>
        </p>

    </div>
</div>





<!-- sidebar -->
<!-- <div class="col-12 col-sm-2 col-md-2 col-xl-1 px-sm-1 px-0 bg-dark d-flex sticky-top">
    <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
        <a href="/" class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5">Annova</span>
        </a>
        <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="adminHome.php" class="nav-link px-sm-0 px-2">
                    <i class="fa-solid fa-house"></i><span class="ms-1 d-none d-sm-inline">Anasayfa</span>
                </a>
            </li>   
            <li>
                <a href="adminSellers.php" class="nav-link px-sm-0 px-2">
                    <i class="fa-solid fa-shop"></i><span class="ms-1 d-none d-sm-inline">Bayiler</span></a>
            </li>
            <li>
                <a href="adminLicence.php" class="nav-link px-sm-0 px-2">
                    <i class="fa-solid fa-cart-plus"></i><span class="ms-1 d-none d-sm-inline">Satışlar</span></a>
            </li>
            <li>
                <a href="adminUsers.php" class="nav-link px-sm-0 px-2">
                    <i class="fa-solid fa-user-group"></i><span class="ms-1 d-none d-sm-inline">Kullanıcılar</span></a>
            </li>
            <li>
                <a href="adminLog.php" class="nav-link px-sm-0 px-2">
                    <i class="fa-solid fa-book"></i><span class="ms-1 d-none d-sm-inline">Log Tablosu</span> </a>
            </li>
            <li>
                <a href="adminOpportunities.php" class="nav-link px-sm-0 px-2">
                    <i class="fa-solid fa-star"></i><span class="ms-1 d-none d-sm-inline">Fırsatlar</span> </a>
            </li>
            <li>
                <div class="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="28" height="28" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION["adminUsername"] ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">Example</a></li>
                        <li><a class="dropdown-item" href="#">Admin Profili</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="adminLogout.php">Çıkış</a></li>
                    </ul>
                </div>
            </li>
        </ul>

    </div>
</div> -->



<?php
if ((isset($_GET) and isset($_GET["logicalref"]) and isset($_GET["alert"]))) {
    $alert = createAlert($_GET["alert"], $_GET["logicalref"]);
}
?>

<?php if ($alert != "") : ?>
    <div id="alert" style="display:none;position: absolute; z-index:5; right:20px; top:65px" class="alert alert-secondary d-block-inline text-center">
        <div>
            <?php echo $alert ?>
        </div>

    </div>
<?php endif; ?>
<script>
    $("#alert").slideDown();
</script>