<?php if (!defined("security")) {
    die("Erişim Engellendi");
} ?>
<div class="container-fluid my-5">
    <div class="card shadow p-4 border-success">
        <h3 class="display-4 text-center">Satışlar</h3>
        <div class="table-responsive">
            <table id="sellerSales" class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Firma/Firma Yetkilisi</th>
                        <!--firma yetkilisi -->
                        <th>Telefon/SMS</th>
                        <!--smsphone -->
                        <th>Versiyon</th>
                        <th>Kullanıcılar</th>
                        <th>Adres</th> <!-- şehir -->
                        <th>Vergi Dairesi</th> <!-- taxcode -->
                        <th>Tarih</th>
                        <th>Lisans</th>
                        <th>Lisans Başlangıç-Bitiş</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sales as $sale) : ?>
                        <tr>
                            <td>
                                <div class="fw-bolder"><?php echo $sale["FRM"]?></div>
                                <div class="fw-semibold"><?php echo $sale["OFFICAL"]; ?></div>
                            </td>
                            <td>
                                <div class="mb-2"><?php echo $sale["PHONE"]; ?></div>
                                <div><?php echo $sale["SMSPHONE"]; ?></div>
                            </td>
                            <td><?php echo $sale["VERSION"] ?></td>
                            <td><?php echo $sale["USERS"] ?></td>
                            <td>
                                <div class="fw-semibold"><?php echo $sale["ADDRESS"]; ?></div>
                                <div class="fw-bold"><?php echo $sale["CITY"]; ?></div> 
                            </td>
                            <td>
                                <div><?php echo $sale["TAXOFFICE"]; ?></div>
                                <div><?php echo $sale["TAXCODE"]; ?></div>
                            </td>
                            <td><?php echo $sale["ADDDATE"] ?></td>
                            <td><?php echo $sale["LICENCE"] ? "<b class='text-success'>Aktif</b>" : "<b  class='text-danger'>Pasif</b>"; ?></td>
                            <td>
                                <span class="text-success">Başlangıç:<?php echo $sale["LICENCESTART"] ?></span>
                                <span class="text-danger">Bitiş:<?php echo $sale["LICENCEEXPIRE"] ?></span>
                            </td>
                        </tr>



                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<script>
    $(document).ready(function() {
        $('#sellerSales').DataTable({
            dom: 'Bfrtlip',
            buttons: [
                'excel','copy','print','pdf'
            ]
        });
    })
</script>