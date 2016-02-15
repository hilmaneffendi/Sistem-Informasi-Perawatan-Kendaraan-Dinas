<?php
// config
include './config/config.php';

$id = $_POST['id'];

$db_query = db_kendaraan_get_by_pemegang($id);
$db_query_row_kendaran = db_kendaraan_get_row_by_pemegang_id($id);
$db_num = mysql_num_rows($db_query);

$data_kendaraan = $db_query_row_kendaran;
$data_current_biaya = db_biaya_get_current_biaya_year($id);

if ($db_num > 0) {
    ?>

    <div class="panel panel-default">
        <div class="panel-body bg-primary">
            <div class="row">
                <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                        <span class="form-control"><?php echo $data_kendaraan['nama']; ?></span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon"><small class="bold">ANGGARAN</small></span>
                        <span class="form-control">Rp. <?php echo number_format($data_kendaraan['anggaran']); ?></span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon"><small class="bold">SISA</small></span>
                        <span class="form-control">Rp. <?php echo number_format($data_kendaraan['anggaran'] - $data_current_biaya); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>                        

    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-plus space-5"></i><b>TAMBAH DATA</b>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon"><b>TANGGAL</b></span>
                        <input type="text" id="ctanggal" name="tanggal" class="form-control" required/>
                    </div>                                        
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon"><b>JENIS</b></span>
                        <select name="jenis" id="cjenis" class="form-control">
                            <option value="Bahan Bakar">Bahan Bakar</option>
                            <option value="Pembelian Barang Atau Jasa">Pembelian Barang Atau Jasa</option>
                        </select>
                    </div>                                        
                </div>
                <div class="col-lg-12" id="cjumlah">
                    <br/>
                    <input type="text" name="jumlah" id="val_jumlah" class="form-control" placeholder="Jumlah (Liter)"/>
                </div>
                <div class="col-lg-12">
                    <br/>
                    <input type="text" name="biaya" id="cbiaya" class="form-control" placeholder="Biaya (Rp.)"/>
                </div>
                <div class="col-lg-12">
                    <br/>
                    <textarea name="keterangan" id="cketerangan" class="form-control" placeholder="Keterangan..."></textarea>
                </div>
                <div class="col-lg-12">
                    <br/>
                    <button class="btn btn-success" type="submit" id="btn-tambah-biaya" name="create"><i class="glyphicon glyphicon-pencil space-5"></i>TAMBAH</button>
                    <br/>
                    <div id="info-biaya" ></div>
                    <br/>
                </div>
            </div>
        </div>
    </div>                        

    <div class="row-fluid small">
        <br/>
        <table id="tbl-data" class="table table-responsive table-bordered table-hover">
            <thead>
                <tr class="active">
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Jenis Biaya</th>
                    <th>Harga</th>
                    <th>Jumlah (Liter)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="table-biaya">

            </tbody>
        </table>
    </div>
    <script>
        $('#ctanggal').datepicker({
            todayBtn: "linked",
            format: 'yyyy-mm-dd',
            language: "id",
            orientation: "bottom left",
            todayHighlight: true
        });
        $('#cjenis').change(function () {
            var jenis = $('#cjenis').val();

            if (jenis === "Bahan Bakar") {
                $('#cjumlah').show();
            }
            else {
                $('#cjumlah').hide();
            }
        });

        $('#btn-tambah-biaya').click(function () {
            var tanggal = $('#ctanggal').val();
            var jenis = $('#cjenis').val();
            var biaya = $('#cbiaya').val();
            var jumlah = $('#val_jumlah').val();
            var keterangan = $('#cketerangan').val();
            var id = $('#cpemegang_id').val();


            if (tanggal.length === 0) {
                window.alert('Tanggal tidak boleh kosong !');
            }
            else if (biaya.length === 0) {
                window.alert('Biaya tidak boleh kosong !');
            }
            else if (keterangan.length === 0) {
                window.alert('Keterangan tidak boleh kosong !');
            }
            else {
                $('#btn-tambah-biaya').hide();

                $.ajax({
                    url: 'ajax_table_biaya_add.php',
                    type: 'POST',
                    cache: false,
                    data: {tanggal: tanggal, jenis: jenis, biaya: biaya, jumlah: jumlah, keterangan: keterangan, id: id},
                    success: function (data) {
                        $('#btn-tambah-biaya').show();
                        $('#info-biaya').html(data);
                        ajaxTableBiaya();
                        $('#ctanggal').val("");
                        $('#cjenis').val("");
                        $('#cbiaya').val("");
                        $('#val_jumlah').val("");
                        $('#cketerangan').val("");
                    }
                });
            }

        });

    </script>
    <?php
} else {
    echo '<div class="alert alert-danger">Pemegang belum memiliki kendaraan dinas !</div>';
}
?>
