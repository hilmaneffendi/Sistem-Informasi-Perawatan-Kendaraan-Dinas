<?php
// config
include './config/config.php';
if ($ses_login === TRUE) {
    $tahun = $_SESSION['tahun'];
    $nip = $_SESSION['id'];
    if($tahun !=""){
        $data_cetak = db_cek_data_pertahun_karyawan($nip,$tahun);
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
                        <td>Tahun </td>
                        <td> : </td>
                        <td><?php echo $tahun; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Karyawan </td>
                        <td> : </td>
                        <td><?php echo $_SESSION['nami_karyawan']; ?></td>
                    </tr>
                    <tr>
                        <td>No Polisi </td>
                        <td> : </td>
                        <td><?php echo $_SESSION['nopol']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Kendaraan </td>
                        <td> : </td>
                        <td><?php echo $_SESSION['nama_kendaraan']; ?></td>
                    </tr>
                </table>
                <br/>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=0;
                        while ($data = mysql_fetch_array($data_cetak)) {
                            ++$no;
                            $bulan = date("m",strtotime($data['tanggal']));
                            $data_biaya = db_cetak_biaya_pertahun_bln($nip, $tahun,$bulan);
                            while ($datax = mysql_fetch_array($data_biaya)) {
                                $totna = "Rp. " . number_format($datax['totbiaya']);
                                $tot +=$datax['totbiaya'];
                            }
                            ?>
                            <tr>
                                <td style="text-align:center"><?php echo $no . "."; ?></td>
                                <td style="text-align:left"><?php echo bulan($bulan) ; ?></td>
                                <td><?php echo $totna; ?></td>
                            </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <td>
                    <th>Jumlah </th>
                    <th style="text-align:right"><?php echo "Rp . " . number_format($tot); ?></th>
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
        unset($_SESSION['id']);
        include './view/footer.php';
    }else{
        header('location:cetak.php');
    }
    
} else {
    redirect($site_url, 'login.php');
}

?>