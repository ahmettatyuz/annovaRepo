<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">
                Bayi Kayıt
            </h3>
        </div>
        <div class="card-body">
            <form class="p-3" action="register.php" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-check-input" type="radio" name="TAXTYPE" id="sahis" value="0" required>
                            <label for="sahis">Şahıs</label>
                            <input class="form-check-input" type="radio" name="TAXTYPE" id="tuzel" value="1" required>
                            <label for="tuzel">Tüzel</label>
                        </div>
                    </div>

                    <div class="col-md-6 col-12 my-3">
                        <div class="form-group my-2">
                            <input class="form-control" name="TAXCODE" id="taxcode" type="text" placeholder="TC Kimlik No" maxlength="11" required>
                        </div>
                        <div class="form-group my-2">
                            <input class="form-control" name="NAMESURNAME" id="namesurname" type="text" placeholder="Ad Soyad" required>
                        </div>
                        <div class="form-group my-2">
                            <input class="form-control" name="DESCRIPTION" id="description" type="text" placeholder="Unvan" required>
                        </div>
                        <div class="input-group my-2">
                            <div class="input-group-text">Telefon Numarası</div>
                            <input class="form-control" name="PHONE" id="phone" type="text" placeholder="5XX XXX XXXX" maxlength="10" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-12 my-3">
                        <div class="input-group my-2">
                            <div class="input-group-text">Vergi Dairesi</div>
                            <select class="form-select" name="TAXOFFICE" id="taxoffice" required>
                                <option value="1">Deneme</option>
                            </select>
                        </div>
                        <div class="input-group my-2">
                            <div class="input-group-text">Şehir</div>
                            <select class="form-select" name="CITY" id="city">
                                <option value="Niğde">Niğde</option>
                                <option value="İstanbul">İstanbul</option>
                                <option value="İzmir">İzmir</option>
                                <option value="Ankara">Ankara</option>
                                <option value="Konya">Konya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="ADDRESS" id="address" cols="30" rows="3" placeholder="Adres" required></textarea>
                        </div>

                    </div>

                    <div class="col-md-6 col-12 my-3">
                        <div class="form-group my-2">
                            <input class="form-control" type="text" name="USERNAME" id="username" placeholder="Kullanıcı Adı" required>
                        </div>
                        <div class="form-group my-2">
                            <input class="form-control" type="password" id="password" name="PASSWORD" placeholder="Parola" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-12 my-3">
                        <div class="form-group mt-5">
                            <button class="btn btn-primary d-block mx-auto" type="submit" value="1" name="submitted">Kaydet</button>
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

        })

        $("#tuzel").click(function() {
            $("#taxcode").attr("placeholder", "Vergi No");
            $("#taxcode").removeAttr("maxlength");
            $("#namesurname").attr("disabled", "");
        })
    })
</script>