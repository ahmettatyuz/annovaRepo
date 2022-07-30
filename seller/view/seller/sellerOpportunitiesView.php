<?php if (!defined("security")) {
    die("Erişim Engellendi");
} ?>
<div class="container-fluid my-5">
    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <div class="card shadow border-success p-4">
                <h4 class="display-6">Fırsat Değerlendirme</h4>
                <div id="form" style="display:none;" class="form">
                    <hr>
                    <h4 id="titleOpp">Fırsat Adı</h4>
                    <p id="contentOpp" class="fw-semibold">Açıklama</p>
                    <form action="sellerOpportunitiesUpdate.php" method="POST">
                        <div class="input-group">
                            <input id="logicalno" type="hidden" name="LOGICALNOOPP" value="0">
                            <input class="form-range" type="range" name="STATUSOPP" id="statusOpp" value="0" min="0" max="2">
                        </div>
                        <div class="row">
                            <div class="col text-start">
                                İşleme alınmadı
                            </div>
                            <div class="col text-center">
                                İşleme alındı
                            </div>
                            <div class="col text-end">
                                Satıldı
                            </div>
                        </div>
                        <div class="text-end my-2">
                            <input type="hidden" value="1" name="SUBMITTED">
                            <button class="btn btn-primary" type="submit">Onayla</button>
                            <div id="cancel" class="btn btn-danger">İptal</div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="card border-success shadow p-4">
                <div class="row">
                    <h3 class="display-6 mb-4">Fırsatlarım</h3>
                    <hr>
                    <?php foreach ($opportunities as $value) : ?>
                        <div class="col-sm-12 col-md-4 col-xxl-3 p-2">
                            <div class="card border-primary p-3">
                                <div class="btn btn-primary mb-3 oppBtn">Güncelle</div>
                                <div id="logicalno" style="display:none;"><?php echo $value["LOGICALNO"] ?></div>
                                <div class="row">
                                    <div class="col-9">
                                        <h4 id="title" class="display-6 my-auto">
                                            <?php echo $value["TITLE"] ?>
                                        </h4>
                                    </div>
                                    <div class="col-3"><img width="40px" class="img-fluid" src="view/seller/img/opportunity" alt=""></div>
                                </div>
                                <div id="content" class="card-text my-2">
                                    <?php echo $value["CONTENT"] ?>
                                </div>
                                <div class="progress">
                                    <div id="status" style="width: <?= ($value["STATUS"] * 50) ?>%;" class="progress-bar <?= $value['STATUS'] == 2 ? 'bg-success' : 'bg-primary progress-bar progress-bar-striped progress-bar-animated' ?>" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $value["STATUS"] ?>" aria-valuemin="0" aria-valuemax="2"></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(function() {
        $(".oppBtn").click(function(e) {
            var title = $(this).parent().find("#title").text().trim();
            var content = $(this).parent().find("#content").text().trim();
            var status = $(this).parent().find("#status").attr("aria-valuenow").trim();
            var logicalno = $(this).parent().find("#logicalno").text().trim();
            // console.log(title);
            // console.log(content);
            // console.log(status);
            $("#titleOpp").text(title);
            $("#contentOpp").text(content);
            $("#statusOpp").attr("value", status);
            $("#logicalno").attr("value", logicalno);

            $('html, body').animate({
                scrollTop: 0
            });
            $("#form").slideDown();
            e.preventDefault();
        })
        $("#cancel").click(function() {
            $("#form").slideUp();
        })

        function goToByScroll(id) {
            $('html,body').animate({
                scrollTop: $("#" + id).offset().top
            }, 'slow');
        }

    })
</script>