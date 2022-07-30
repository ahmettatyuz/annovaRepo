<?php 
/*
    admin fırsatlar ekranının görünümü
*/
if (!defined("securityAdmin")) {
    die("Erişim Engellendi");
} ?>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card shadow border-danger p-4">
                <h3 class="display-6">Fırsat Ekle</h3>
                <form action="adminEditOpportunities.php" method="POST">
                    <div class="input-group my-2">
                        <div class="input-group-text">
                            Başlık
                        </div>
                        <input name="TITLE" type="text" class="form-control" required>
                    </div>
                    <div class="input-group my-2">
                        <textarea class="form-control" name="CONTENT" id="" cols="30" rows="5" placeholder="Mesaj içeriği" required></textarea>
                    </div>
                    <div class="form-group my-2">
                        <select class="form-select" name="SELLERID" id="sellerSelect" required>
                            <option value="" disabled selected>Bir bayi seçin</option>
                            <?php foreach ($sellers as $seller) : ?>
                                <option value="<?php echo $seller["LOGICALREF"]; ?>"><?php echo $seller["USERNAME"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group text-end">
                        <input type="hidden" name="SUBMITTED" value="1">
                        <button class="btn btn-primary">Gönder</button>
                    </div>
                </form>
            </div>
            <div class="card shadow border-danger p-4 my-4">
                <?php
                $completed = 0;
                $progress = 0;
                $negative = 0;
                foreach ($opportunities as $value) {
                    if ($value["STATUS"] == '2') {
                        $completed += 1;
                    } else if ($value["STATUS"] == '1') {
                        $progress += 1;
                    } else {
                        $negative += 1;
                    }
                }

                ?>
                <h3 class="display-6 mb-4"><i class="fa-solid fa-chart-pie"></i> Analiz</h3>
                <div class="alert alert-success">
                    <i class="fa-solid fa-check"></i> Tamamlanlar : <b><?php echo $completed ?></b>
                </div>
                <div class="alert alert-primary">
                    <i class="fa-solid fa-hourglass"></i> İşleme alınanlar : <b><?php echo $progress ?></b>
                </div>
                <div class="alert alert-danger">
                    <i class="fa-solid fa-ban"></i> İşleme alınmayanlar : <b><?php echo $negative ?></b>
                </div>

            </div>
        </div>
        <div class="col-lg-8 col-12">
            <div class="card border-danger shadow p-4 mb-3">
                <h1 class="display-6">Tüm Fırsatlar</h1>
                <div class="table-responsive">
                    <table id="opportunitiesTable" class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>LOGICALNO</th>
                                <th>Bayi</th>
                                <th>Başlık</th>
                                <th>İçerik</th>
                                <th>Durum</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($opportunities as $value) : ?>
                                <tr>
                                    <td><?php echo $value["LOGICALNO"] ?></td>
                                    <td><?php echo getUsername($db, $value['SELLERID'],"seller") ?></td>
                                    <td><?php echo $value["TITLE"] ?></td>
                                    <td><?php echo $value["CONTENT"] ?></td>
                                    <td>
                                        <div class="progress d-block-inline">
                                            <div id="status" style="width: <?= ($value["STATUS"] * 50) ?>%;" class="progress-bar <?= $value['STATUS'] == 2 ? 'bg-success' : 'bg-primary progress-bar progress-bar-striped progress-bar-animated' ?>" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $value["STATUS"] ?>" aria-valuemin="0" aria-valuemax="2">
                                                <?php
                                                if ($value["STATUS"] == "2") {
                                                    echo "%100";
                                                } else if ($value["STATUS"] == "1") {
                                                    echo "%50";
                                                } else {
                                                    echo "%0";
                                                }
                                                ?>
                                            </div>
                                        </div>
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