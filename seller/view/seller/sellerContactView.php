<?php if (!defined("security")) {
    die("Erişim Engellendi");
} ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            <div class="card p-4 shadow border-success">
                <div class="row">
                    <div class="col-12 col-md-6 border rounded my-auto align-items-center text-center">
                        <img class="img-fluid" src="view/seller/img/annova.png" alt="">
                    </div>
                    <div class="col-12 col-md-6 mx-auto mt-3 text-center">
                        <h3 class="display-6 mb-3">
                            Bizimle İletişime Geç
                        </h3>
                        <form id="demo-form" action="" method="POST">
                        <div class="form-group my-2">
                                <input class="form-control" type="text" name="KONU" placeholder="Konu" required>
                            </div>
                            <div class="form-group my-2">
                                <input class="form-control" type="email" name="EMAIL" placeholder="Email" required>
                            </div>
                            <div class="form-group my-2">
                                <textarea class="form-control" name="MESSAGE" id="message" cols="30" rows="5" placeholder="Mesajınız" required></textarea>
                            </div>
                            <div class="text-center">
                                <div style="display: inline-block;" class="g-recaptcha" data-sitekey="6LfzBiQhAAAAALMd6sfbKTYplZD_aAyHScSWFxMt"></div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="SUBMITTED" value="1">
                                <button class="btn btn-primary" type="submit">Gönder</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-lg-4 col-12 my-2">
                                <div class="row">
                                    <div class="col text-center p-0">
                                        <a href="https://goo.gl/maps/fFoEroeQv8AgGQKk7">
                                            <img class="img-fluid" src="view/seller/img/mapIcon.png" alt="">
                                        </a>
                                    </div>
                                    <div class="col text-break p-0">
                                        <b>Adres:</b> <br>
                                        Aşağı Kayabaşı Mah. Gazeteci İsmet Sayın Cad, D:No:19/27 Merkez/Niğde
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12 my-2">
                                <div class="row">
                                    <div class="col text-center p-0">
                                        <img class="img-fluid" src="view/seller/img/phoneIcon.png" alt="">
                                    </div>
                                    <div class="col p-0">
                                        <b>Telefon:</b><br>
                                        (0388) 502 08 08
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12 my-2">
                                <div class="row">
                                    <div class="col text-center p-0">
                                        <img class="img-fluid" src="view/seller/img/mailIcon.png" alt="">
                                    </div>
                                    <div class="col p-0">
                                        <b>Email:</b> <br>
                                        info@annova.com
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>