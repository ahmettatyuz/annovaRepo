<?php 
/*
    admin login ekranının gorunumu

*/

if(!defined("securityAdmin")){die("Erişim Engellendi");} ?>
<div class="container mt-5">
    <?php if ($hata != "") : ?>
        <div id="alert" style="display: none;" class="alert alert-danger text-center col-12 col-md-6 mx-auto">
            <?php echo $hata; ?>
        </div>

    <?php endif; ?>
    <div class="card border-danger mx-auto col-12 col-lg-6 shadow">
        <div class="card-header text-center bg-danger text-light">
            <h3 class="card-title">
                Admin Girişi
            </h3>
        </div>
        <div class="card-body">
            <form action="" method="POST" class="col-12 col-md-6 mx-auto">
                <div class="form-group my-2">
                    <input class="form-control" type="text" name="USERNAME" id="username" placeholder="Kullanıcı Adı" required>
                </div>
                <div class="form-group my-2">
                    <input class="form-control" type="password" name="PASSWORD" id="password" placeholder="Parola" required>
                </div>
                <div class="text-center">
                    <div style="display: inline-block;" class="g-recaptcha" data-sitekey="6LfzBiQhAAAAALMd6sfbKTYplZD_aAyHScSWFxMt"></div>
                </div>
                <div class="form-group">
                    <input type="hidden" id="auth" name="SUBMITTED" value="1">
                    <button class="btn btn-primary d-block mx-auto" type="submit">Giriş</button>
                </div>
            </form>
            <div class="d-flex flex-row flex-row-reverse">
                <form action="sellerPasswordUpdate.php" method="POST">
                    <input type="hidden" name="RESETPASSWORD" value="1">
                    <button class="btn btn-warning" type="submit" id="resetpassword">Parolamı Unuttum</button>
                </form>
            </div>
        </div>
    </div>
</div>