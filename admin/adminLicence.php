<?php

/*
    admin lisans sayfasıdır.
    bu sayfanın gorunumunu degistirmek icin adminLicenceView.php dosyasına gidilmelidir.

    calisma mantigi:
    $licences degiskenine tum lisanslar aktarilir.
    adminLicenceView.php dosyanıda $licences dizisi tabloya yazdırılır

*/
$access = 2;
$alert = "";
require "security.php";
require "libs/connection.php";
require "libs/functions.php";

$licences = getAllLicences($db);


$title = "Lisans İşlemleri";
require "view/header.php";
require "view/admin/navbar.php";
require "view/admin/adminLicenceView.php";
require "view/footer.php";

?>

<script>
    $(document).ready(function() {
        $('#licenceTable').DataTable({
            dom: 'Bfrtlip',
            buttons: [
                'excel','copy','print','pdf'
            ]
        });
    })
</script>