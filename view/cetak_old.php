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
                                <b>CETAK DATA KARYAWAN PERBULAN</b>
                            </div>
                            <div class="panel-body small" style="font-size: 80%;">
                                <br/>
                                <form action="./cetak_self.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input type="text" id="cnip_nama" name="nip_nama" onkeyup="autoNama()" class="form-control" placeholder="Masukan nip atau nama..." value="" required />
                                            </div>
                                            <br/>
                                            <input type="hidden" id="cpemegang_id" name="pemegang_id" value=""/>
                                            <ul id="pemegang_nama_list" class="list-group small"></ul>
                                        </div>
                                        <div class="col-lg-4" id="cbulan-head">
                                            <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">BULAN</small></span>
                                                <select id="cbulan" name="bulan" onchange="ajaxTableBiaya()" class="form-control">
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3" id="ctahun-head">
                                            <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">TAHUN</small></span>
                                                <select id="ctahun" name="tahun" onchange="ajaxTableBiaya()" class="form-control">
                                                    <?php
                                                    for ($i = 2010; $i < 2020; $i++) {
                                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <small class="pull-right"><input id="btn_cetak_self" type="submit" name="cetak_self" value="CETAK" class="btn btn-success" /></small>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>CETAK DATA SEMUA KARYAWAN PERBULAN</b>
                            </div>
                            <div class="panel-body small" style="font-size: 80%;">
                                <br/>
                                <form action="./cetak_semua_karyawan_bln.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="input-group">
                                            </div>
                                            <br/>
                                            <input type="hidden" id="cpemegang_id" name="pemegang_id" value=""/>
                                            <ul id="pemegang_nama_list" class="list-group small"></ul>
                                        </div>
                                        <div class="col-lg-4" id="cbulan-head">
                                            <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">BULAN</small></span>
                                                <select id="cbulan" name="bulan" onchange="ajaxTableBiaya()" class="form-control">
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3" id="ctahun-head">
                                            <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">TAHUN</small></span>
                                                <select id="ctahun" name="tahun" onchange="ajaxTableBiaya()" class="form-control">
                                                    <?php
                                                    for ($i = 2010; $i < 2020; $i++) {
                                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <br>
                                            <small class="pull-right"><input id="btn_cetak_self" type="submit" name="cetak_self" value="CETAK" class="btn btn-success" /></small>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                         <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>CETAK DATA KARYAWAN PERTAHUN</b>
                            </div>
                            <div class="panel-body small" style="font-size: 80%;">
                                <br/>
                                <form action="./cetak_self.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-4">
                                        </div>
                                        <div class="col-lg-5" id="cbulan-head">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input type="text" id="cnip_nama" name="nip_nama" onkeyup="autoNama()" class="form-control" placeholder="Masukan nip atau nama..." value="" required />
                                            </div>
                                            <br/>
                                            <input type="hidden" id="cpemegang_id" name="pemegang_id" value=""/>
                                            <ul id="pemegang_nama_list" class="list-group small"></ul>
                                        </div>
                                        <div class="col-lg-3" id="ctahun-head">
                                            <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">TAHUN</small></span>
                                                <select id="ctahun" name="tahun" onchange="ajaxTableBiaya()" class="form-control">
                                                    <?php
                                                    for ($i = 2010; $i < 2020; $i++) {
                                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <small class="pull-right"><input id="btn_cetak_self" type="submit" name="cetak_self" value="CETAK" class="btn btn-success" /></small>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>CETAK DATA SEMUA KARYAWAN PERTAHUN</b>
                            </div>
                            <div class="panel-body small" style="font-size: 80%;">
                                <br/>
                                <form action="./cetak_semua_karyawan_bln.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-5">
                                        </div>
                                        <div class="col-lg-4" id="cbulan-head">
                                         
                                        </div>
                                        <div class="col-lg-3" id="ctahun-head">
                                            <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">TAHUN</small></span>
                                                <select id="ctahun" name="tahun" onchange="ajaxTableBiaya()" class="form-control">
                                                    <?php
                                                    for ($i = 2010; $i < 2020; $i++) {
                                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <br>
                                            <small class="pull-right"><input id="btn_cetak_self" type="submit" name="cetak_self" value="CETAK" class="btn btn-success" /></small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>CETAK DATA PENGGUNAAN BBM PERTAHUN</b>
                            </div>
                            <div class="panel-body small" style="font-size: 80%;">
                                <br/>
                                <form action="./cetak_semua_karyawan_bln.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-5">
                                        </div>
                                        <div class="col-lg-4" id="cbulan-head">
                                         
                                        </div>
                                        <div class="col-lg-3" id="ctahun-head">
                                            <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">TAHUN</small></span>
                                                <select id="ctahun" name="tahun" onchange="ajaxTableBiaya()" class="form-control">
                                                    <?php
                                                    for ($i = 2010; $i < 2020; $i++) {
                                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <br>
                                            <small class="pull-right"><input id="btn_cetak_self" type="submit" name="cetak_self" value="CETAK" class="btn btn-success" /></small>
                                        </div>
                                    </div>
                                </form>
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
    function autoNama() {
        $('#btn_cetak_self').hide();

        var min_length = 0;
        var keyword = $('#cnip_nama').val();
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
        $('#cnip_nama').val(nama);
        $('#cpemegang_id').val(id);
        // hide proposition list
        $('#pemegang_nama_list').hide();
        $('#btn_cetak_self').show();
    }
    
</script>