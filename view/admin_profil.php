.,......,,,,,./
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

                        <form action="admin_profil.php" method="POST"/>
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>
                                    <input type="text" title="USER ID" name="username" class="form-control disabled" maxlength="10" value="<?php echo $ses_username; ?>" required readonly/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" title="KATA SANDI" name="password" class="form-control" value="" maxlength="10" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" title="NAMA LENGKAP" name="nama" class="form-control" maxlength="50" value="<?php echo $data['nama']; ?>" required/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="tel" title="TELEPON" name="telepon" class="form-control" maxlength="12" value="<?php echo $data['telepon']; ?>" required/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" name="update" class="btn btn-default"><i class="glyphicon glyphicon-pencil space-5"></i> <strong>Update</strong></button>
                                </td>
                            </tr>
                        </table>
                        </form>

                        <?php echo $site_alert; ?>

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