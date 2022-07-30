<?php 
/*
    admin lisans guncelleme sayfasının görünümü
*/
if (!defined("securityAdmin")) {
    die("Erişim Engellendi");
} ?>
<div class="col-sm-10 col-md-10 col-xl-11 col-12 d-flex flex-column h-sm-100 mx-auto">
    <div class="row overflow-auto ">
        <div class="container my-5">
            <div class="card shadow border-danger p-4">
                <h3 class="display-5 text-center">Lisansı Düzenle</h3>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="input-group my-2">
                                <div class="input-group-text">Firma Adı</div>
                                <input class="form-control" type="text" name="FRM" value="<?= $licence["FRM"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">Firma Yetkilisi</div>
                                <input class="form-control" type="text" name="OFFICAL" value="<?= $licence["OFFICAL"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">Telefon</div>
                                <input class="form-control" type="text" name="PHONE" value="<?= $licence["PHONE"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">SMS Telefonu</div>
                                <input class="form-control" type="text" name="SMSPHONE" value="<?= $licence["SMSPHONE"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">Versiyon</div>
                                <input class="form-control" type="text" name="VERSION" value="<?= $licence["VERSION"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">Video Controller</div>
                                <input class="form-control" type="text" name="VIDEOCONTROLLER" value="<?= $licence["VIDEOCONTROLLER"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">CPU ID</div>
                                <input class="form-control" type="text" name="CPUID" value="<?= $licence["CPUID"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">VOLUMESERIAL</div>
                                <input class="form-control" type="text" name="VOLUMESERIAL" value="<?= $licence["VOLUMESERIAL"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">USERS</div>
                                <input class="form-control" type="text" name="USERS" value="<?= $licence["USERS"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">Adres</div>
                                <input class="form-control" type="text" name="ADDRESS" value="<?= $licence["ADDRESS"] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="input-group my-2">
                                <div class="input-group-text">Şehir</div>
                                <input class="form-control" type="text" name="CITY" value="<?= $licence["CITY"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">Vergi Dairesi</div>
                                <input class="form-control" type="text" name="TAXOFFICE" value="<?= $licence["TAXOFFICE"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">Vergi/TC No:</div>
                                <input class="form-control" type="text" name="TAXCODE" value="<?= $licence["TAXCODE"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">MACID</div>
                                <input class="form-control" type="text" name="MACID" value="<?= $licence["MACID"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">Bayi ID</div>
                                <input class="form-control" type="text" name="SELLERID" value="<?= $licence["SELLERID"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">ADDDATE</div>
                                <input class="form-control" type="text" name="ADDDATE" value="<?= $licence["ADDDATE"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">LICENCESTART</div>
                                <input class="form-control" type="date" name="LICENCESTART" value="<?= $licence["LICENCESTART"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">LICENCEEXPIRE</div>
                                <input class="form-control" type="date" name="LICENCEEXPIRE" value="<?= $licence["LICENCEEXPIRE"] ?>">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">Lisans Durumu</div>
                                <div class="my-auto ms-5">
                                    <label for="aktif">Aktif</label>
                                    <input class="form-check-input me-4" type="radio" name="LICENCE" id="aktif" value="1" <?php if ($licence["LICENCE"]) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                    <label for="pasif">Pasif</label>
                                    <input class="form-check-input" type="radio" name="LICENCE" id="pasif" value="0" <?php if (!$licence["LICENCE"]) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="float-end">
                                <input type="hidden" name="SUBMITTED" value="1">
                                <button class="btn btn-primary" type="submit">Güncelle</button>
                                <a class="btn btn-danger" href="adminLicence.php">İptal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>