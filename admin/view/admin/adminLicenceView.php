<?php 
/*
    admin lisans sayfasının gorunumu
*/

if (!defined("securityAdmin")) {
    die("Erişim Engellendi");
} ?>
<div class="container-fluid my-5">
    <div class="card shadow p-4 border-danger">
        <h3 class="display-4 text-center">Satışlar</h3>
        <div class="table-responsive">
            <table id="licenceTable" class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>İşlemler</th>
                        <th>Lisans</th>
                        <th>LOGICALNO</th>
                        <th>Firma</th>
                        <!--firma yetkilisi -->
                        <th>Telefon</th>
                        <!--smsphone -->
                        <th>Versiyon</th>
                        <th>VideoController</th>
                        <th>CPUID</th>
                        <th>VolumeSerial</th>
                        <th>Kullanıcılar</th>
                        <th>Adres</th>
                        <!-- şehir -->
                        <th>Vergi Dairesi</th>
                        <!-- taxcode -->
                        <th>MACID</th>
                        <th>BayiID</th>
                        <th>Tarih</th>

                        <th>Lisans Başlangıç</th>
                        <th>Lisans Bitiş</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($licences as $sale) : ?>
                        <tr>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        İşlemler
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text-primary" href="adminLicenceUpdate.php?logicalno=<?= $sale["LOGICALNO"]; ?>">Düzenle</a></li>
                                        <li>
                                            <form action="adminLicenceUpdate.php" method="POST">
                                                <input type="hidden" name="LICENCETOGGLE" value="<?= $sale["LOGICALNO"]; ?>">
                                                <input type="hidden" name="LICENCEVALUE" value="<?= $sale["LICENCE"]; ?>">
                                                <button class="dropdown-item text-danger" type="submit">Lisans Aktif/Pasif Et</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <?php echo $sale["LICENCE"] ? "<b class='text-success'>Aktif</b>" : "<b  class='text-danger'>Pasif</b>"; ?>
                            </td>
                            <td><?php echo $sale["LOGICALNO"] ?></td>
                            <td>
                                <div class="fw-bolder   "><?php echo $sale["FRM"] ?></div>
                                <div class="fw-semibold"><?php echo $sale["OFFICAL"]; ?></div>
                            </td>
                            <td>
                                <div class="mb-2"><?php echo $sale["PHONE"]; ?></div>
                                <div><?php echo $sale["SMSPHONE"]; ?></div>
                            </td>
                            <td><?php echo $sale["VERSION"] ?></td>
                            <td><?php echo $sale["VIDEOCONTROLLER"] ?></td>
                            <td><?php echo $sale["CPUID"] ?></td>
                            <td><?php echo $sale["VOLUMESERIAL"] ?></td>
                            <td><?php echo $sale["USERS"] ?></td>
                            <td>
                                <div class="fw-semibold"><?php echo $sale["ADDRESS"]; ?></div>
                                <div class="fw-bold"><?php echo $sale["CITY"]; ?></div>
                            </td>
                            <td>
                                <div><?php echo $sale["TAXOFFICE"]; ?></div>
                                <div><?php echo $sale["TAXCODE"]; ?></div>
                            </td>
                            <td><?php echo $sale["MACID"] ?></td>
                            <td><?php echo $sale["SELLERID"]; ?></td>
                            <td><?php echo $sale["ADDDATE"]; ?></td>
                            <td><?php echo $sale["LICENCESTART"] ?></td>
                            <td><?php echo $sale["LICENCEEXPIRE"] ?></td>

                        </tr>



                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<script>

</script>