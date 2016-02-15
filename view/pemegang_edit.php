<div class="container box">
    <table class="table table-bordered table-responsive">
        <tbody>
            <tr>
                <td class="active">
                    <img src="image/bps-logo.svg" width="64" height="64"/>
                    <strong class="text-title">SISTEM INFORMASI BPS TASIKMALAYA</strong>
                </td>
            </tr>
            <tr>
                <td>
                    <br/>
                    <div class="col-lg-3 col-md-3">
                        <?php include './view/sidebar.php'; ?>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <ol class="breadcrumb small bold">
                            <li><a href="<?php echo $site_url; ?>/home.php"><i class="glyphicon glyphicon-home"></i></a></li>
                            <li><?php echo $site_title; ?></li>                            
                        </ol>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>EDIT DATA</b>
                            </div>
                            <div class="panel-body" id="edit">
                                <form action="./pemegang_edit.php?id=<?php echo $site_id;?>" method="POST" id="formPemegang">
                                    <table class="table table-bordered table-responsive table-hover small">
                                        <tr>
                                            <td>
                                                <input id="cnip" type="text" name="nip" placeholder="Masukan NIP" class="form-control" value="<?php echo $data['nip'];?>" maxlength="18"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cnama" type="text" name="nama" placeholder="Masukan Nama Pemegang" class="form-control" value="<?php echo $data['nama'];?>" maxlength="50"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea id="calamat" name="alamat" class="form-control" placeholder="Alamat Lengkap" maxlength="100" required><?php echo $data['alamat'];?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="ctelepon" type="tel" name="telepon" placeholder="Masukan No. Telepon" class="form-control" value="<?php echo $data['telepon'];?>" maxlength="12" required/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="active">
                                                <div class="btn-group-sm">
                                                    <button class="btn btn-success" type="submit" name="update"><i class="glyphicon glyphicon-pencil space-5"></i><b>UPDATE</b></button>
                                                    <a href="./pemegang.php" class="btn btn-danger"><i class="glyphicon glyphicon-arrow-left space-5"></i><b>BATALKAN</b></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php echo $site_error; ?>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
            <tr>
                <td class="active">
                    <small class="bold pull-left"><span id="footer-time"></span></small>
                    <small class="bold pull-right"><span id="footer-date"></span></small>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    $().ready(function () {
        $('#formPemegang').validate();

        $('#cnip').rules("add", {
            required: true,
            minlength: 18,
            maxlength: 18,
            digits: true
        }
        );
        $('#cnama').rules("add", {
            required: true,
            minlength: 3,
            maxlength: 50
        }
        );
        $('#calamat').rules("add", {
            required: true,
            minlength: 5,
            maxlength: 100
        }
        );
        $('#ctelepon').rules("add", {
            required: true,
            minlength: 9,
            maxlength: 12,
            digits: true
        });
    });
</script>