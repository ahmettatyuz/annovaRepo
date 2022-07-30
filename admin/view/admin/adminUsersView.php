<?php 
/*
    admin kullanıcılar ekranı gorunumu
*/

if (!defined("securityAdmin")) {
    die("Erişim Engellendi");
} ?>

<div class="col-sm-10 col-md-10 col-xl-11 col-12 d-flex flex-column h-sm-100 mx-auto">
    <div class="row">
        <div class="container my-5">
            <div class="col-md-6 col-12 mx-auto text-center">
                <button id="addNewUser" class="btn btn-primary mx-auto d-block">Yeni Kullanıcı Ekle <i class="fa fa-plus" aria-hidden="true"></i></button>
                <div id="newUserForm" style="display: none;" class="card shadow border-danger">
                    <div class="card-body">
                        <form action="adminUsersEdit.php" method="POST">
                            <h1 class="display-6">Kullanıcı Ekle</h1>
                            <hr>
                            <div class="input-group my-2">
                                <div class="input-group-text">
                                    Kullanıcı Adı
                                </div>
                                <input id="username" class="form-control" name="USERNAME" type="text" required>
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-text">
                                    Parola
                                </div>
                                <input id="password" class="form-control" name="PASSWORD" type="text" required>
                                <div id="createPassword" class="input-group-text btn btn-secondary">Parola Üret</div>
                            </div>
                            <div class="form-group col-4 ms-auto my-2">
                                <select class="form-select" name="AUTHORITY" id="authority" required>
                                    <option value="" disabled selected>Yetki düzeyi seçin</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="form-group my-2">
                                <input type="hidden" name="NEWUSERSUBMIT" value="1">
                                <button class="btn btn-primary">Ekle</button>
                                <div id="cancelBtn" class="btn btn-danger text-center">İptal <i class="fa-solid fa-angle-up ms-2"></i></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="card shadow border-danger p-4 mt-5">
                <h1 class="display-4 text-center">Tüm Kullanıcılar</h1>
                <div class="table-responsive">
                    <table id="usersTable" class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>LOGICALREF</th>
                                <th>Kullanıcı Adı</th>
                                <th>Yetki Düzeyi</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?php echo $user["LOGICALREF"] ?></td>
                                    <td><?php echo $user["USERNAME"] ?></td>
                                    <td><?php echo $user["AUTHORITY"] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                İşlemler
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="adminUsersUpdate.php?logicalref=<?php echo $user["LOGICALREF"] ?>">Düzenle</a>
                                                </li>
                                                <li><a class="dropdown-item text-warning" href="#">
                                                        <form action="adminUsersEdit.php" method="POST">
                                                            <div class="input-group">

                                                                <select class="form-select" name="AUTHORITY" id="authority">
                                                                    <option class="dropdown-item" value="" selected disabled>Yetki Düzeyi Değiştir</option>
                                                                    <option class="dropdown-item" value="1">1</option>
                                                                    <option class="dropdown-item" value="2">2</option>
                                                                    <option class="dropdown-item" value="3">3</option>
                                                                </select>
                                                                <input type="hidden" name="LOGICALREF" value="<?php echo $user["LOGICALREF"] ?>">
                                                                <input type="hidden" name="AUTHSUBMIT" value="1">
                                                                <button type="submit" class="btn btn-warning input-group-text">
                                                                    <i class="fa-solid fa-check"></i>
                                                                </button>
                                                            </div>

                                                        </form>

                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            dom: 'Bfrtlip',
            buttons: [
                'excel', 'copy', 'print', 'pdf'
            ]
        });

        $("#addNewUser").click(function() {
            $("#newUserForm").slideToggle();
        })

        $("#createPassword").click(function() {
            var password = "";
            var charset = "abcdefghijklmnopqrstuvwxyz+*-ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+*-";
            for (let i = 0; i < 8; i++) {
                var random = Math.floor(Math.random() * 68);
                password += charset.charAt(random);
            }
            $("#password").val(password);

        })
        $("#cancelBtn").click(function() {
            $("#newUserForm").slideUp();
            $("#password").val("");
            $("#username").val("");
            $("#authority").val("");
        })
    });
</script>