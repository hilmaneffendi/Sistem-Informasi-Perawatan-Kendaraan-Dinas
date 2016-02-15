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
                            <div class="panel-body collapse in" id="create">
                                <form action="./kendaraan_edit.php?id=<?php echo $site_id;?>" method="POST" id="formKendaraan">
                                    <table class="table table-bordered table-responsive table-hover small">
                                        <tr>
                                            <td>
                                                <input id="cnik" type="text" name="nik" placeholder="Masukan NIK" class="form-control disabled" maxlength="18" value="<?php echo $data['nik']; ?>" readonly/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cnama" type="text" name="nama" placeholder="Masukan Nama Kendaraan" class="form-control" value="<?php echo $data['nama']; ?>" maxlength="50"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cnopol" type="text" name="nopol" placeholder="Masukan No. Polisi Kendaraan" class="form-control" value="<?php echo $data['nopol']; ?>" maxlength="10"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="canggaran" type="text" name="anggaran" placeholder="Masukan Jumlah Anggaran (RP) Per Tahun" class="form-control" value="<?php echo $data['anggaran']; ?>" maxlength="11" required/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cpemegang_nama" type="text" autocomplete="off" name="pemegang_nama" placeholder="Masukan Nama Atau NIP Pemegang" class="form-control" onkeyup="autoNama()" value="<?php
                                                    if ($data['pemegang_id'] != NULL){
                                                        $pemegang = db_kendaraan_get_nama_pemegang($data['pemegang_id']);
                                                        echo $pemegang['nama'].' ('.$pemegang['nip'].')';
                                                    }
                                                ?>" maxlength="100"/>
                                                <ul id="pemegang_nama_list" class="list-group"></ul>
                                                <input type="hidden" id="cpemegang_id" name="pemegang_id" value="<?php echo $data['pemegang_id']; ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="active">
                                                <div class="btn-group-sm">
                                                    <button class="btn btn-success" type="submit" name="update"><i class="glyphicon glyphicon-pencil space-5"></i><b>UPDATE</b></button>
                                                    </form>
                                                    <a href="./kendaraan.php" class="btn btn-danger"><i class="glyphicon glyphicon-arrow-left space-5"></i><b>BATALKAN</b></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
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
        $('#formKendaraan').validate();

        $('#cnama').rules("add", {
            required: true,
            minlength: 3,
            maxlength: 50
        }
        );
        $('#cnopol').rules("add", {
            required: true,
            minlength: 5,
            maxlength: 10
        }
        );
        $('#canggaran').rules("add", {
            required: true,
            minlength: 3,
            maxlength: 11,
            digits: true
        });

    });

    function autoNama() {
        $('#cpemegang_id').val('');
        var min_length = 0;
        var keyword = $('#cpemegang_nama').val();
        if (keyword.length >= min_length) {
            $.ajax({
                url: 'check_pemegang_nama.php',
                type: 'POST',
                data: {nama: keyword},
                success: function (data) {
                    $('#pemegang_nama_list').show();
                    $('#pemegang_nama_list').html(data);
                }
            });
        } else {
            $('#pemegang_nama_list').hide();
        }

    }

    function set_id(id, nama) {
        // change input value
        $('#cpemegang_nama').val(nama);
        $('#cpemegang_id').val(id);
        // hide proposition list
        $('#pemegang_nama_list').hide();
    }
</script>
