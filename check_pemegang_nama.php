<?php

// config
include './config/config.php';

$nama = '%' . $_POST['nama'] . '%';

$query_pemegang = db_pemegang_check_nama($nama);
while ($data = mysql_fetch_array($query_pemegang)) {
    echo '<li class="list-group-item auto-list" onclick="set_id(\'' . $data['id'] . '\',\'' . $data['nama'] . '-' . $data['nip'] . '\')">' . $data['nama'] . ' (' . $data['nip'] . ')</li>';
}
?>