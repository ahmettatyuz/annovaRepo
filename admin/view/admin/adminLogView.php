<?php 
/*
    admin log sayfasının gorunumu
*/

if (!defined("securityAdmin")) {
    die("Erişim Engellendi");
} ?>

<div class="col-sm-10 col-md-10 col-xl-11 col-12 d-flex flex-column h-sm-100 mx-auto">
    <div class="row overflow-auto ">
        <div class="container my-5">
            <div class="card shadow border-danger p-4">
                <h1 class="display-4 text-center">Tüm İşlemler</h1>
                <div class="table-responsive">
                    <table id="logTable" class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Yetkili</th>
                                <th>Tarih/Saat</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <?php foreach ($logs as $log) : ?>
                                <tr>
                                    <td><?php echo $log["ADMINUSERNAME"] ?></td>
                                    <td><?php echo $log["DATE"] ?></td>
                                    <td><?php echo $log["DESCRIPTION"] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#logTable').DataTable();
    });
</script>