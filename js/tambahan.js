$(function () {
    $("#btn_next").click(function (e) {
        var tgl_berangkat = $("#tgl_berangkat").val();

        if(tgl_berangkat == "") {
            alert("Tanggal harus di isi.");
            return;
        }
        e.preventDefault();
        $.ajax({
            url: 'admin/proses/next.php',
            type: 'POST',
            data: {
                dari: $("#dari").val(),
                tgl_berangkat: tgl_berangkat,
                jam_berangkat: $("#jam_berangkat").val(),
                kursi: $("#kursi").val()
            },
            success: function (result) {
                var count = result.result;
                if (count == 0) {
                    document.getElementById("jadwal").style.display = "none";
                    document.getElementById("pesan").style.display = "block";
                } else {
                    alert("Jadwal keberangkatan tidak tersedia.");
                }
                return false;
            }
        });
        return false;
    });
});

function batal() {
    document.getElementById("pesan").style.display = "none";
    document.getElementById("jadwal").style.display = "block";
}