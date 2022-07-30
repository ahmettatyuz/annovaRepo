<?php if(!defined("security")){die("Erişim Engellendi");} ?>
<div class="container mt-5">
    <div class="card col-md-6 col-12 mx-auto">
            <h3 class="display-6 text-center mt-4">
                Parolayı Değiştir
            </h3>
        <div class="card-body">
            <form method="POST">
            <div class="input-group my-2">
                    <div class="input-group-text">Mevcut Parola :</div>
                    <input class="form-control pw" name="CURRENTPASSWORD" type="password" required>
                </div>
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
                    <a class="btn btn-danger" href="seller.php">İptal</a>
                </div>
            </form>
            <div class="btn btn-secondary eye">Parolaları Göster <i class="btn border fa-solid fa-eye"></i></div>
        </div>
    </div>
</div>

<script>
    // göz butonu koy basınca şifre gözüksün
    $(document).ready(function(){
        $(".eye").mousedown(function() {
            $(".pw").attr("type", "text");
        })
        $(".eye").mouseup(function() {
            $(".pw").attr("type", "password");
        })
    })
</script>