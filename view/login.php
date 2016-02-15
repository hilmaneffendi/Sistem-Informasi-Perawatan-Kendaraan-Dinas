<div class="container box">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <form action="login.php" method="post" name="login">
            <table class="table table-bordered table-hover table-responsive">
                <tbody>
                    <tr>
                        <td class="active">
                            <img src="image/bps-logo.svg" width="64" height="64"/>
                            <strong>SISTEM INFORMASI BPS TASIKMALAYA</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="username" maxlength="10" class="form-control" placeholder="USER ID" required />                                
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" name="password" maxlength="10" class="form-control" placeholder="KATA SANDI" required />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="login" class="btn btn-default"><i class="glyphicon glyphicon-pencil space-5"></i> <strong>Login</strong></button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="active">
                            <small class="bold pull-left"><span id="footer-time"></span></small>
                            <small class="bold pull-right"><span id="footer-date"></span></small>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
        <?php echo $login_error; ?>
    </div>
    <div class="col-lg-3"></div>
</div>