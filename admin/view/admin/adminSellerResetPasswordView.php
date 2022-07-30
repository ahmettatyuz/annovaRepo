<?php 
/*
    admin bayi parola degistirme ekranı gorunumu 
*/
if (!defined("securityAdmin")) {
    die("Erişim Engellendi");
} ?>
<div class="col-sm-10 col-md-10 col-xl-11 col-12 d-flex flex-column h-sm-100 mx-auto">
    <div class="row overflow-auto ">
        <div class="container mt-5">
            <div class="card col-md-6 col-12 mx-auto shadow border-danger">
                <h4 class="display-6 text-center mt-4">
                    <?php echo $_GET["seller"] ?> Nolu Bayinin Parolasını Değiştir
                </h4>
                <div class="card-body">
                    <form method="POST">
                        <div class="input-group my-2">
                            <div class="input-group-text">Yeni Parola :</div>
                            <input class="form-control pw" name="NEWPASSWORD" type="password" required>
                        </div>
                        <div class="input-group my-2">
                            <div class="input-group-text">Yeni Parola (Tekrar) :</div>
                            <input class="form-control pw" name="NEWPASSWORDX" type="password" required></button>
                        </div>
                        <div class="form-group float-end my-2">
                            <input type="hidden" name="SUBMITTED" value="1">
                            <button class="btn btn-primary" type="submit">Onayla</button>
                            <a class="btn btn-danger" href="adminSellers.php">İptal</a>
                        </div>
                    </form>
                    <div class="btn btn-secondary eye">Parolaları Göster <i class="btn border fa-solid fa-eye"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(".eye").mousedown(function() {
            $(".pw").attr("type", "text");
        })
        $(".eye").mouseup(function() {
            $(".pw").attr("type", "password");
        })
    })
</script>