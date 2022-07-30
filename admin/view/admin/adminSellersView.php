<?php 
/*
    admin bayiler ekranı gorunumu
*/


if (!defined("securityAdmin")) {
    die("Erişim Engellendi");
} ?>
<div class="col-sm-10 col-md-10 col-xl-11 col-12 d-flex flex-column h-sm-100 mx-auto">
    <div class="row overflow-auto ">
        <div class="container-fluid my-5">
            <div class="col-md-6 col-12 mx-auto text-center">
                <button id="addSellerBtn" class="btn btn-primary mx-auto d-block">Yeni Bayi Ekle <i class="fa fa-plus" aria-hidden="true"></i></button>
                <div id="addSeller" class="card shadow border-danger" style="display: none;">
                    <h3 class="display-6">Bayi Ekle</h3>
                    <hr>
                    <form action="adminSellerAddDelete.php" method="POST">
                        <div class="card-body">
                            <div class="input-group my-2">
                                <div class="input-group-text">Kullanıcı Adı:</div>
                                <input id="username" class="form-control" name="USERNAME" type="text" required>
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">Parola:</div>
                                <input id="password" class="form-control" name="PASSWORD" type="text">
                                <div id="createPassword" class="btn btn-secondary input-group-text">Parola Üret</div>
                            </div>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <input type="hidden" name="NEWSELLER" value="1">
                            <button class="btn btn-primary" type="submit">Kullanıcıyı Ekle</button>
                            <div id="cancelBtn" class="btn btn-danger mx-auto">
                                İptal <i class="fa-solid fa-angle-up ms-2"></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card border-danger shadow p-4 mt-5">
                <h1 class="display-4 text-center">Tüm Bayiler</h1>
                <div class="table-responsive">
                    <table id="sellerTable" class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>İşlem</th>
                                <th>LOGICAL REF</th>
                                <th>Kullanıcı Adı</th>
                                <th>Adres</th>
                                <!--<th>Şehir</th> -->
                                <th>Vergi/TC No</th>
                                <th>Vergi Dairesi&Tipi</th><!-- <th>Vergi Tipi</th> -->
                                <th>Telefon</th><!-- <th>Telefon</th> -->
                                <th>Unvan</th>
                                <th>Durum</th>

                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($sellers as $seller) : ?>
                                <tr>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                İşlemler
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="adminSellerUpdate.php?seller=<?= $seller["LOGICALREF"] ?>">Düzenle</a></li>
                                                <li><a class="dropdown-item" href="adminSellerResetPassword.php?seller=<?= $seller["LOGICALREF"]; ?>">Parolasını Değiştir</a></li>
                                                <li>
                                                    <form action="adminSellerAddDelete.php" method="POST">
                                                        <input type="hidden" name="ACTIVESELLER" value="<?= $seller["LOGICALREF"]; ?>">
                                                        <input type="hidden" name="ACTIVE" value="<?= $seller["ACTIVE"] ?>">
                                                        <button type="submit" class="dropdown-item" name="ACTIVEBTN">Aktif/Pasif Et</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="adminSellerAddDelete.php" method="POST">
                                                        <input type="hidden" name="DELETESELLER" value="<?= $seller["LOGICALREF"]; ?>">
                                                        <button type="submit" class="dropdown-item" name="DELETEBTN">Sil</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="fw-bold"><?php echo $seller["LOGICALREF"]; ?></td>
                                    <td class="fw-semibold"><?php echo $seller["USERNAME"]; ?></td>
                                    <td>
                                        <div><?php echo $seller["ADDRESS"] ?></div>
                                        <div class="fw-semibold"><?php echo getCityName($db, $seller["CITY"]); ?></div>
                                    </td>
                                    <td><?php echo $seller["TAXCODE"] ?></td>
                                    <td>
                                        <div><?php echo getTaxOfficeName($db, $seller["TAXOFFICE"]) ?></div>
                                        <div class="fw-semibold"><?php echo $seller["TAXTYPE"] ? 'Tüzel' : 'Şahıs ' ?></div>
                                    </td>

                                    <td>
                                        <div><?php echo $seller["NAMESURNAME"] ?></div>
                                        <div><?php echo $seller["MOBILE"] ?></div>
                                    </td>

                                    <td><?php echo $seller["DESCRIPTION"] ?></td>
                                    <td>
                                        <?php echo $seller["ACTIVE"] ? "<b class='text-success'>Aktif</b>" : "<b  class='text-danger'>Pasif</b>" ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>