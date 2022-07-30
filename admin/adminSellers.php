<?php
$access = 1;
$alert = "";
require "security.php";
require "libs/connection.php";
require "libs/functions.php";
$sellers = getAllSellers($db);
$title = "Bayiler";
require "view/header.php";
require "view/admin/navbar.php";
require "view/admin/adminSellersView.php";
require "view/footer.php";

?>

<script>
    $(document).ready(function() {
        $('#sellerTable').DataTable({
            dom: 'Bfrtlip',
            buttons: [
                'excel','copy','print','pdf'
            ]
        });
        $("#infoAlert").slideDown();
        $("#pwAlert").slideDown();
        $("#newUserAlert").slideDown();
        $("#createPassword").click(function() {
            var password = "";
            var charset = "abcdefghijklmnopqrstuvwxyz+*-ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+*-";
            for (let i = 0; i < 8; i++) {
                var random = Math.floor(Math.random() * 68);
                password += charset.charAt(random);
            }
            $("#password").val(password);

        })

        $("#addSellerBtn").click(function() {
            $("#addSeller").slideToggle();
        })
        $("#cancelBtn").click(function() {
            $("#addSeller").slideUp();
            $("#password").val("");
            $("#username").val("");
        })

        $("#navAlert").slideDown();
    });
</script>