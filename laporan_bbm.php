<?php
// config
include './config/config.php';
if ($ses_login === TRUE) {
    $tahun = $_SESSION['tahun'];
    if($tahun !=""){
        $data_cetak = db_cek_bbm($tahun);
        unset($_SESSION['tahun']);
        $site_title = "Laporan BBM";
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
                </table>
                <br/>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Biaya</th>
                            <th>Liter</th>
                            <th>Total</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=0;
                        while ($data = mysql_fetch_array($data_cetak)) {
                            ++$no;
                            $jumlah = $data['jumlah'];
                            if($jumlah=="0"){
                                $jml = "1";
                                $jmlx = "-";
                            }else{
                                $jmlx = $jumlah;
                                $jml = $jumlah;
                            }
                            $tot += $data['biaya']*$jml;
                            $data_biaya = db_cetak_biaya_pertahun($nip, $tahun);
                            ?>
                            <tr>
                                <td style="text-align:center"><?php echo $no . "."; ?></td>
                                <td style="text-align:right"><?php echo date("d-m-Y",strtotime($data['tanggal'])); ?></td>
                                <td><?php echo $data['jenis']; ?></td>
                                <td style="text-align:right"><?php echo "Rp. " . number_format($data['biaya']); ?></td>
                                <td style="text-align:right"><?php echo $jmlx; ?></td>
                                <td style="text-align:right"><?php echo "Rp. " . number_format($data['biaya']*$jml); ?></td>
                                <td><?php echo $data['keterangan']; ?></td>
                            </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <td>
                    <th>Jumlah </th>
                    <th><?php echo ""; ?></th>
                    <td>
                    <td>
                    <th style="text-align:right"><?php echo "Rp . " . number_format($tot); ?></th>
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
        unset($_SESSION['id']);
        include './view/footer.php';
    }else{
        header('location:cetak.php');
    }
    
} else {
    redirect($site_url, 'login.php');
}
?>