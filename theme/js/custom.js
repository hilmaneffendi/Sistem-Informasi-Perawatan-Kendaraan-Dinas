/* global moment */

$(document).ready(function () {
    $('#btn-create').click(function () {
        var btn_create = $('#lbl-create');
        if (btn_create.hasClass('glyphicon-minus')) {
            btn_create.removeClass('glyphicon-minus');
            btn_create.addClass('glyphicon-plus');
        }
        else {
            btn_create.removeClass('glyphicon-plus');
            btn_create.addClass('glyphicon-minus');
        }
    });
    $('#tbl-data').dataTable({
        "language": {
            "sProcessing": "Sedang memproses...",
            "sLengthMenu": "Tampilkan _MENU_ entri",
            "sZeroRecords": "Tidak ditemukan data yang sesuai",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix": "",
            "sSearch": "Cari:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            }
        }
    });
    $('#tbl-data2').dataTable({
        "language": {
            "sProcessing": "Sedang memproses...",
            "sLengthMenu": "Tampilkan _MENU_ entri",
            "sZeroRecords": "Tidak ditemukan data yang sesuai",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix": "",
            "sSearch": "Cari:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            }
        }
    });
    $('#footer-time').text(getTime());
    $('#footer-date').text(getDate());
    setInterval(function () {
        $('#footer-time').text(getTime());
        $('#footer-date').text(getDate());
    }, 1000);

});

$().extend($.validator.messages,{
    remote:"Data tersebut telah digunakan !"
});

function getDate() {
    var result = moment().format('DD MMMM YYYY');
    return result;
}

function getTime() {
    var result = moment().format('hh:mm:ss A');
    return result;
}
