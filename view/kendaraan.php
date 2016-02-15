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
                                <button class="btn btn-default btn-sm space-5" data-toggle="collapse" data-target="#create" id="btn-create"><i class="glyphicon glyphicon-minus" id="lbl-create"></i></button>
                                <b>TAMBAH DATA</b>
                            </div>
                            <div class="panel-body collapse in" id="create">
                                <form action="./kendaraan.php" method="POST" id="formKendaraan">
                                    <table class="table table-bordered table-responsive table-hover small">
                                        <tr>
                                            <td>
                                                <input id="cnik" type="text" name="nik" placeholder="Masukan NIK" class="form-control disabled" maxlength="18" value="BPS-KD-<?php echo rand(100, 999); ?>-<?php echo rand(100, 999); ?>" readonly/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cnama" type="text" name="nama" placeholder="Masukan Nama Kendaraan" class="form-control" maxlength="50"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="cnopol" type="text" name="nopol" placeholder="Masukan No. Polisi Kendaraan" class="form-control" maxlength="10"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="canggaran" type="text" name="anggaran" placeholder="Masukan Jumlah Anggaran (RP) Per Tahun" class="form-control" maxlength="11" required/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="active">
                                                <div class="btn-group-sm">
                                                    <button class="btn btn-success" type="submit" name="create"><i class="glyphicon glyphicon-pencil space-5"></i><b>TAMBAH</b></button>
                                                    <button class="btn btn-danger"><i class="glyphicon glyphicon-circle-arrow-right space-5"></i><b>RESET</b></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php echo $site_error; ?>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>LIST DATA KENDARAAN</b>
                            </div>
                            <div class="panel-body small" style="font-size: 80%;">
                                <br/>
                                <table id="tbl-data2" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr class="active">
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama Kendaraan</th>
                                            <th>No. Polisi</th>
                                            <th>Anggaran</th>
                                            <th>Pemilik</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        while ($data = mysql_fetch_array($data_kendaraan_kosong)) {
                                            ++$no;
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['nik']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['nopol']; ?></td>
                                                <td>Rp. <?php echo number_format($data['anggaran']); ?></td>
                                                <td><?php
                                                    if ($data['pemegang_id'] === NULL) {
                                                        echo 'Belum Ada';
                                                    } else {
                                                        $pemegang = db_kendaraan_get_nama_pemegang($data['pemegang_id']);
                                                        echo $pemegang['nama'].' ('.$pemegang['nip'].')';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="kendaraan_edit.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-xs" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="kendaraan_delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Hapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>LIST PEMEGANG KENDARAAN</b>
                            </div>
                            <div class="panel-body small" style="font-size: 80%;">
                                <br/>
                                <table id="tbl-data" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr class="active">
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama Kendaraan</th>
                                            <th>No. Polisi</th>
                                            <th>Anggaran</th>
                                            <th>Pemilik</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        while ($data = mysql_fetch_array($data_kendaraan)) {
                                            ++$no;
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['nik']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['nopol']; ?></td>
                                                <td>Rp. <?php echo number_format($data['anggaran']); ?></td>
                                                <td><?php
                                                    if ($data['pemegang_id'] === NULL) {
                                                        echo 'Belum Ada';
                                                    } else {
                                                        $pemegang = db_kendaraan_get_nama_pemegang($data['pemegang_id']);
                                                        echo $pemegang['nama'].' ('.$pemegang['nip'].')';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="kendaraan_edit.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-xs" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="kendaraan_delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Hapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
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
