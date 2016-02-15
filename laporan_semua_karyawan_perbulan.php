<?php
// config
include './config/config.php';
if ($ses_login === TRUE) {
    $bulan = $_SESSION['sasih'];
    $tahun = $_SESSION['tahun'];
    if($bulan !="" && $tahun !=""){
        $data_cetak = db_cetak_perbulan_all($bulan, $tahun);
        session_start();
        unset($_SESSION['sasih']);
        unset($_SESSION['tahun']);
        $site_title = "Laporan Perorangan";
        include './view/header_cetak.php';
        ?>
        <div class="row">
            <br/>
            <div class="col-lg-3"></div>
            <div class="col-lg-6" style="text-align: center">
                <b>
                    Rekapitulasi Pemeliharan Kendaraan Dinas Bermotor Roda Dua<br/>
                    BPS Kota Tasikmalaya Tahun Anggaran <?php echo date("Y"); ?>
                </b>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row">
            <br/>
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <table class="identitas">
                    <tr>
                        <td>Bulan </td>
                        <td> : </td>
                        <td><?php echo $bulan . " / " . $tahun; ?></td>
                    </tr>
                </table>
                <br/>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemegang</th>
                            <th>Nopol</th>
                            <th>Nama Kendaraan</th>
                            <th>Total</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=0;
                        while ($data = mysql_fetch_array($data_cetak)) {
                            ++$no;
                            $nip = $data['nip'];
                            $data_biaya = db_cetak_biaya($nip,$bulan, $tahun);
                            ?>
                            <tr>
                                <td style="text-align:center"><?php echo $no . "."; ?></td>
                                <td><?php echo $data['nami']; ?></td>
                                <td><?php echo $data['nopol']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <?php
                                while ($dataxx = mysql_fetch_array($data_biaya)) {
                                    $biayana = $dataxx['totbiaya'];
                                    $totx +=$biayana;
                                    ?>
                                    <td><?php echo number_format($biayana); ?></td>
                                    <?php
                                }
                                ?>
                                <td><?php echo $data['keterangan']; ?></td>
                            </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <td>
                    <th>Jumlah</th>
                    <th></th>
                    <th><?php echo $liter; ?></th>
                    <th>Rp. <?php echo number_format($totx); ?></th>
                    <th></th>
                    </td>
                    </tfoot>
                </table>
                <br>
                <div class="pull-right" style="text-align: right">
                    <p>Tasikmalaya, <span id="footer-date"></span></p>
                    <p>Kasubbag Tata Usaha</p>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <p>Dede Iskandar Nuroni, SE</p>
                    <p>NIP. 19650211 198503 1001</p>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <?php
  
        include './view/footer.php';
    }else{
        header('location:cetak.php');
    }
    
} else {
    redirect($site_url, 'login.php');
}
?>