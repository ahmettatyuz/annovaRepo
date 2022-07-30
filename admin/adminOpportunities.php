<?php 
/*
    admin firsatlar sayfasidir. Bu sayfanin gorunumunu degistirmek icin adminOpportunitiesView.php dosyasina gidilmelidir.

    calisma mantigi:
    $sellers degiskenine tum bayiler aktarilir.
    $opportunities degiskenine tum firsatlar aktarilir.
    daha sonra adminOpportunitiesView.php dosyasına bu dizilerdeki degerler ekrana yazdirilir.
    

*/
$access = 1;
$alert="";
require "security.php";
require "libs/connection.php";
require "libs/functions.php";

$sellers = getAllSellersName($db);
$opportunities=getAllOpportunities($db);
$title="Fırsatlar";
require "view/header.php";
require "view/admin/navbar.php";
require "view/admin/adminOpportunitiesView.php";
require "view/footer.php";

?>

<script>
    $(document).ready(function(){
        $("#opportunitiesTable").DataTable({
            dom: 'Bfrtlip',
            buttons: [
                'excel','copy','print','pdf'
            ]
        });
    })
</script>