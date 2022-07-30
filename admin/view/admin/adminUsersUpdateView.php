<?php
/*
    admin kullanıcılar guncelleme ekranı gorunumu

*/


$access = 3;
if (!defined("securityAdmin")) {
    die("Erişim Engellendi");
} ?>

<div class="container my-5">
    <div class="card shadow border-danger p-4">
        <h3 class="display-5 text-center">Kullanıcıyı Düzenle</h3>
        <form action="" method="POST">
            <div class="col-lg-6 col-12 mx-auto">
                <div class="input-group my-2">
                    <div class="input-group-text">Kullanıcı Adı:</div>
                    <input type="text" class="form-control" name="USERNAME" value="<?=$user["USERNAME"]?>">
                </div>
                <div class="input-group my-2">
                    <div class="input-group-text">Yetki Düzeyi</div>
                    <select class="form-select" name="AUTHORITY" id="authority">
                        <option class="dropdown-item" value="1" <?php if($user["AUTHORITY"]=="1"){echo "selected";} ?> >1</option>
                        <option class="dropdown-item" value="2" <?php if($user["AUTHORITY"]=="2"){echo "selected";} ?> >2</option>
                        <option class="dropdown-item" value="3" <?php if($user["AUTHORITY"]=="3"){echo "selected";} ?> >3</option>
                    </select>
                </div>
                <div class="form-group text-end my-2">
                    <input type="hidden" name="SUBMITTED" value="1">
                    <button class="btn btn-primary" type="submit">Güncelle</button>
                    <a class="btn btn-danger" href="adminUsers.php">İptal</a>
                </div>
            </div>
        </form>
    </div>
</div>