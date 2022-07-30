<?php if (!defined("security")) {
    die("Erişim Engellendi");
} ?>
<div class="container my-5">
    <div class="card p-3 shadow border-success">
        <h3 class="display-4 text-center mt-3">
            Bayi Bilgileri
        </h3>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary text-center col-6 mx-auto">
                        Kullanıcı Adı:
                        <b> <?php echo $seller["USERNAME"]; ?></b>
                    </div>
                </div>
                <div class="col-12">
                    <div class="alert border-primary">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <img class="img-fluid" src="view/seller/img/name.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <div class="row">
                                    <div class="col">
                                        <h4>Ad Soyad:</h4>
                                        <div class="my-3 display-6"><?php echo $seller["NAMESURNAME"]; ?></div>
                                    </div>
                                    <div class="col">
                                        <h4>Ünvan:</h4>
                                        <div class="my-3 display-6"><?php echo $seller["DESCRIPTION"]; ?></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="alert border-success">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <img class="img-fluid" src="view/seller/img/mapIcon.png" alt="">
                            </div>
                            <div class="col-10">
                                <h6>Ulaşım</h6>
                                <hr>
                                <div class="my-3"><?php echo $seller["ADDRESS"]; ?></div>
                                <div class="fw-semibold my-3"><?php echo $seller["MOBILE"]; ?></div>
                                <div class="fw-bold my-3"><?php echo getCityName($db,$seller["CITY"]); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="alert border-warning">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <img class="img-fluid" src="view/seller/img/tax.png" alt="">
                            </div>
                            <div class="col-10">
                                <h6>Vergi Bilgileri</h6>
                                <hr>
                                <div class="my-3"> <span class="fw-semibold">Vergi Dairesi:</span> <?php echo getTaxOfficeName($db,$seller["TAXOFFICE"]); ?></div>
                                <div class="my-3"><span class="fw-semibold">Vergi/TC No: </span><?php echo $seller["TAXCODE"]; ?></div>
                                <div class="my-3"><span class="fw-semibold">Vergi Tipi: </span><?php echo $seller["TAXTYPE"] == 1 ? "Tüzel" : "Şahıs"; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between p-3">
                <div>
                    <a href="sellerUpdate.php" class="btn btn-primary fw-semibold" type="submit"> Bilgileri Güncelle <img width="18" class="img-fluid" src="view/seller/img/edit.png" alt=""></a>
                </div>
                <div>
                    <a href="sellerResetPassword.php" class="btn btn-warning fw-semibold" type="submit">Parolayı Değiştir <img width="18" src="view/seller/img/resetpw.png" alt=""></a>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#infoAlert").slideDown();
        $("#pwAlert").slideDown();
    })
</script>