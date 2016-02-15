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
                                <b>LIST DATA BIAYA</b>
                            </div>
                            <div class="panel-body small" style="font-size: 80%;">
                                <br/>
                                <table id="tbl-data" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr class="active">
                                            <th>#</th>
                                            <th>Nama Pemilik</th>
                                            <th>Tanggal</th>
                                            <th>Jenis Biaya</th>
                                            <th>Harga</th>
                                            <th>Jumlah (Liter)</th>
                                            <th>Keterangan</th>
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
                                                <td><?php
                                                    $pemegang = db_kendaraan_get_nama_pemegang($data['pemegang_id']);
                                                    echo $pemegang['nama'] . ' (' . $pemegang['nip'] . ')';
                                                    ?></td>
                                                <td><?php echo $data['tanggal']; ?></td>
                                                <td><?php echo $data['jenis']; ?></td>
                                                <td>Rp. <?php echo number_format($data['biaya']); ?></td>
                                                <td><?php echo $data['jumlah']; ?></td>
                                                <td><?php echo $data['keterangan']; ?></td>
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
