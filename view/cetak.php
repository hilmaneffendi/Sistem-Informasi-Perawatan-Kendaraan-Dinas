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
                                <b>CETAK DATA <?php echo $_SESSION['sasih'] . $_SESSION['tahun'];?></b>
                            </div>
                            <div class="panel-body small" style="font-size: 80%;">
                                <br/>
                                <form action="javascript:void()" id="formna" class="form-inline" method="POST">
                                  <div class="form-group">
                                    <label>
                                        <input type="radio" class="uniforms" name="optionsRadios" id="perbulan" value="1">
                                        Rekap Data Perbulan
                                    </label>
                                  </div>
                                  <div class="form-group">
                                    <label>
                                        <input type="radio" class="uniforms" name="optionsRadios" id="pertahun" value="2">
                                        Rekap Data Pertahun
                                    </label>
                                  </div>
                                  <div class="form-group">
                                    <label>
                                        <input type="radio" class="uniforms" name="optionsRadios" id="bbm_thn" value="3">
                                        Rekap Data BBM Pertahun
                                    </label>
                                  </div>
                                  <div id="bulan">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                           <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">Karyawan</small></span>
                                                <input type="text" id="cnip_nama" name="nip_nama" onkeyup="autoNama()" class="form-control" placeholder="Semua Karyawan" value=""  />
                                                <br/>
                                                <input type="hidden" id="cpemegang_id" name="pemegang_id" value=""/>
                                            </div>
                                           
                                            <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">BULAN</small></span>
                                                <select id="cbulan" name="cbulan" class="form-control">
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">Tahun</small></span>
                                                <select id="ctahun" name="ctahun" class="form-control">
                                                    <?php
                                                    for ($i = 2010; $i < 2020; $i++) {
                                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4">
                                                <ul id="pemegang_nama_list" class="list-group"></ul>    
                                            </div>
                                        </div>

                                  </div>
                                  <div id="tahun">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                           <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">Karyawan</small></span>
                                                <input type="text" id="cnip_nama_thn" name="nip_nama" onkeyup="autoNama_thn()" class="form-control" placeholder="Semua Karyawan" value="" />
                                                <br/>
                                                <input type="hidden" id="cpemegang_id_thn" name="pemegang_id" value=""/>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">Tahun</small></span>
                                                <select id="ctahun_thn" name="tahun" class="form-control">
                                                    <?php
                                                    for ($i = 2010; $i < 2020; $i++) {
                                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4">
                                                <ul id="pemegang_nama_list_thn" class="list-group"></ul>    
                                            </div>
                                        </div>
                                  </div>
                                  <div id="bbm">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><small class="bold">Tahun</small></span>
                                                <select id="ctahun_bbm" name="tahun" class="form-control">
                                                    <?php
                                                    for ($i = 2010; $i < 2020; $i++) {
                                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                  </div>

                                  <br/>
                                  <div class="row">
                                      <div class="col-md-1"></div>
                                      <div>
                                          <div id="tombolx">
                                            <div class="form-group">
                                                <label>
                                                    <button class="btn btn-primary btn-sm" onclick="repall()">TAMPILKAN</button>
                                                </label>
                                            </div>
                                          </div>
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
jQuery(document).ready(function(){
    jQuery("#bulan").hide('slow');
    jQuery("#tahun").hide('slow');
    jQuery("#bbm").hide('slow');
    jQuery("#tombolx").hide('slow');
    jQuery(".uniforms").click(function (){
      var checked_value = jQuery(".uniforms:checked").val();
        if(checked_value==1){
            jQuery("#bulan").show("slow");
            jQuery("#tahun").hide("slow");
            jQuery("#tombolx").show('slow');
            jQuery("#bbm").hide("slow");
        }else if(checked_value==2){
            jQuery("#bulan").hide("slow");
            jQuery("#tahun").show("slow");
            jQuery("#tombolx").show('slow');
            jQuery("#bbm").hide("slow");
        }else if(checked_value==3){
            jQuery("#bulan").hide("slow");
            jQuery("#tahun").hide("slow");
            jQuery("#tombolx").show('slow');
            jQuery("#bbm").show("slow");
        };
    });
});

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
        $('#cnip_nama_thn').val(nama);
        $('#cpemegang_id').val(id);
        $('#cpemegang_id_thn').val(id);
        // hide proposition list
        $('#pemegang_nama_list').hide();
        $('#pemegang_nama_list_thn').hide();
        $('#btn_cetak_self').show();
    }
    function autoNama_thn() {
        $('#btn_cetak_self').hide();

        var min_length = 0;
        var keyword = $('#cnip_nama_thn').val();
        if (keyword.length >= min_length) {
            $.ajax({
                url: 'check_pemegang_nama.php',
                type: 'POST',
                data: {nama: keyword},
                success: function (data) {
                    $('#pemegang_nama_list_thn').show();
                    $('#pemegang_nama_list_thn').html(data);
                }
            });
        } else {
            $('#pemegang_nama_list_thn').hide();
        }

    }
    var host = window.location.host;
    $BASE_URL = 'http://'+host+'/';  
    function repall(){
        if(jQuery('#perbulan').is(':checked')) {
            if(jQuery("#cbulan").val()!="" && jQuery("#ctahun").val()!="" && jQuery("#cnip_nama").val()==""){
                var bln = jQuery("#cbulan").val();
                var thn = jQuery("#ctahun").val();
                jQuery.ajax({
                    url     : $BASE_URL+"validasi.php?bln="+bln+"&&thn="+thn,
                    type    : 'POST',
                    data    : {txtbln:bln,txtthn:thn},
                    dataType: 'json',
                    success: function(json){
                        if (json.say == "ok") {
                            window.location.href = $BASE_URL+"laporan_semua_karyawan_perbulan.php";
                            return false;
                        }else{
                            alert("Data Tidak Ditemukan");
                        }
                    }
                });
                return false;
            }else{
                var bln = jQuery("#cbulan").val();
                var thn = jQuery("#ctahun").val();
                var id = jQuery("#cnip_nama").val();
                jQuery.ajax({
                    url     : $BASE_URL+"validasi.php?bln="+bln+"&&thn="+thn+"&&pemegang_id="+id,
                    type    : 'POST',
                    data    : {txtbln:bln,txtthn:thn,txtid:id},
                    dataType: 'json',
                    success: function(json){
                        if (json.say == "ok") {
                            window.location.href = $BASE_URL+"laporan_karyawan_perbulan.php";
                        }else{
                            alert("Data Tidak Ditemukan");
                            return false;
                        }
                    }
                });
                return false;
            }
        }else if (jQuery('#pertahun').is(':checked')) {
            if(jQuery("#ctahun_thn").val()!="" && jQuery("#cnip_nama_thn").val()==""){
                var thn_thn = jQuery("#ctahun_thn").val();
                jQuery.ajax({
                    url     : $BASE_URL+"validasi.php?thn="+thn_thn,
                    type    : 'POST',
                    data    : {txtthn_thn:thn_thn},
                    dataType: 'json',
                    success: function(json){
                        if (json.say == "ok") {
                            window.location.href = $BASE_URL+"laporan_semua_karyawan_pertahun.php";
                        }else{
                            alert("Data Tidak Ditemukan");
                            return false;
                        }
                    }
                });
                return false;
            }else if(jQuery("#ctahun_thn").val()!="" && jQuery("#cnip_nama_thn").val()!=""){
                var cnip = jQuery("#cnip_nama_thn").val();
                var thn_thn = jQuery("#ctahun_thn").val();
                jQuery.ajax({
                    url     : $BASE_URL+"validasi.php?thn="+thn_thn+"&&pemegang_id="+cnip,
                    type    : 'POST',
                    data    : {txtthn_thn:thn_thn,cnip:cnip},
                    dataType: 'json',
                    success: function(json){
                        if (json.say == "ok") {
                            window.location.href = $BASE_URL+"laporan_karyawan_pertahun.php";
                        }else{
                            alert("Data Tidak Ditemukan");
                            return false;
                        }
                    }
                });
                return false;            
            }
        }else if(jQuery('#bbm_thn').is(':checked')) {
            var thn = jQuery("#ctahun_bbm").val();
            jQuery.ajax({
                url     : $BASE_URL+"validasi.php?thn="+thn,
                type    : 'POST',
                data    : {txtthn_bbm:thn},
                dataType: 'json',
                success: function(json){
                    if (json.say == "ok") {
                        window.location.href = $BASE_URL+"laporan_bbm.php";
                    }else{
                        alert("Data Tidak Ditemukan");
                    }
                }
            });
        }
    }
</script>