<?php if (!defined("security")) {
    die("Erişim Engellendi");
} ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">
                Bayi Bilgileri Güncelle
            </h3>   
        </div>
        <div class="card-body">
            <form class="p-3" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-check-input" type="radio" name="TAXTYPE" id="sahis" value="0" required>
                            <label class="me-3" for="sahis">Şahıs</label>
                            <input class="form-check-input" type="radio" name="TAXTYPE" id="tuzel" value="1" required>
                            <label for="tuzel">Tüzel</label>
                            <x id="currentTaxType" value="<?php echo $seller["TAXTYPE"]; ?>" hidden></x>
                        </div>
                    </div>

                    <div class="col-md-6 col-12 my-3">
                        <div class="input-group my-2">
                            <div id="tcText" class="input-group-text">TC Kimlik No:</div>
                            <input class="form-control" name="TAXCODE" value="<?= $seller["TAXCODE"] ?>" id="taxcode" type="text" placeholder="TC Kimlik No" maxlength="11" required>
                        </div>
                        <div class="input-group my-2">
                            <div class="input-group-text">Ad Soyad:</div>
                            <input class="form-control" name="NAMESURNAME" value="<?= $seller["NAMESURNAME"] ?>" id="namesurname" type="text" placeholder="Ad Soyad" required>
                        </div>
                        <div class="input-group my-2">
                            <div class="input-group-text">Unvan:</div>
                            <input class="form-control" name="DESCRIPTION" value="<?= $seller["DESCRIPTION"] ?>" id="description" type="text" placeholder="Unvan" required>
                        </div>
                        <div class="input-group my-2">
                            <div class="input-group-text">Telefon Numarası:</div>
                            <input class="form-control" name="PHONE" value="<?= $seller["MOBILE"] ?>" id="phone" type="text" placeholder="5XX XXX XXXX" maxlength="10" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-12 my-3">
                        <div class="input-group my-2">
                            <div class="input-group-text">Şehir:</div>
                            <select class="form-select citySelect" name="CITY" id="city" required>
                                <option value=" " disabled selected>Şehir Seçin</option>
                                <?php foreach ($cities as $city) : ?>
                                    <option class="city" value="<?= $city["CODE"] ?>" <?php if ($seller["CITY"] == $city["CODE"]) {echo "selected";} ?>><?= $city["NAME"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group my-2">
                            <div class="input-group-text">Vergi Dairesi:</div>
                            <select class="form-select taxOfficeSelect" name="TAXOFFICE" id="taxoffice" required>
                                <option value="" disabled selected>Vergi dairesi seçin</option>
                                <?php foreach ($taxoffices as $taxoffice) : ?>
                                    <option class="taxoffice" value="<?= $taxoffice["CODE"] ?>" <?php if ($seller["TAXOFFICE"] == $taxoffice["CODE"]) { echo "selected";}?>><?= $taxoffice["PLAKA"] . "-" . $taxoffice["NAME"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <div class="input-group-text">Adres:</div>
                            <textarea class="form-control" name="ADDRESS" id="address" cols="30" rows="3" placeholder="Adres" required><?= $seller["ADDRESS"] ?></textarea>
                        </div>

                    </div>

                    <div class="col-md-6 col-12 my-3">
                        <div class="input-group my-2">
                            <div class="input-group-text">Kullanıcı Adı:</div>
                            <input class="form-control" type="text" name="USERNAME" value="<?= $seller["USERNAME"] ?>" id="username" placeholder="Kullanıcı Adı" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-12 my-3">
                        <div class="form-group mt-5 float-end">
                            <input type="hidden" value="1" name="SUBMITTED">
                            <button class="btn btn-primary" type="submit">Güncelle</button>
                            <a class="btn btn-danger" href="seller.php">İptal</a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#sahis").click(function() {
            $("#taxcode").attr("placeholder", "TC Kimlik No");
            $("#taxcode").attr("maxlength", "11");
            $("#namesurname").removeAttr("disabled");
            $("#tcText").text("TC Kimlik No:");
        })

        $("#tuzel").click(function() {
            $("#taxcode").attr("placeholder", "Vergi No");
            $("#taxcode").removeAttr("maxlength");
            $("#namesurname").attr("disabled", "");
            $("#tcText").text("Vergi No:");
        })

        var currentTaxType = $("#currentTaxType").attr("value");
        if (currentTaxType == 0) {
            $("#sahis").attr("checked", "");
            $("#taxcode").attr("placeholder", "TC Kimlik No");
            $("#taxcode").attr("maxlength", "11");
            $("#namesurname").removeAttr("disabled");
        } else if (currentTaxType == 1) {
            $("#tuzel").attr("checked", "");
            $("#taxcode").attr("placeholder", "Vergi No");
            $("#taxcode").removeAttr("maxlength");
            $("#namesurname").attr("disabled", "");
            $("#tcText").text("Vergi No:");
        }

        function cityTaxFilter() {
            var selectedCity = $(".citySelect option:selected").attr("value");
            console.log(selectedCity);
            $(".taxoffice").each(function() {
                if ($(this).text().split("-")[0] != selectedCity) {
                    $(this).css("display", "none");
                }else{
                    $(this).css("display", "");
                }
            })
        }
        cityTaxFilter();

        $(".citySelect").change(function() {
            var selectedCity = $(".citySelect option:selected").attr("value");
            console.log(selectedCity);
            $(".taxoffice").each(function() {
                console.log($(this).text().split("-")[0].trim());
                if ($(this).text().split("-")[0].trim() != selectedCity) {
                    $(this).css("display", "none");
                }else{
                    $(this).css("display", "");
                }
            })
        });


    })
</script>