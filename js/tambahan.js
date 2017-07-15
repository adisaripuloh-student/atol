$(function () {
    $("#btn_next").click(function (e) {
        var tgl_berangkat = $("#tgl_berangkat").val();
        var date1 = new Date(tgl_berangkat);
        var date2 = new Date();
        var timeDiff = date1.getTime() - date2.getTime();
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
        if(diffDays < 0) {
            alert("Anda tidak bisa memilih hari sebelum hari ini.");
            return false;
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

    $('#btn_simpan').on('click', function (e) {
        var tujuan = $('#tujuan').val();
        if(tujuan == 'Bandung - Jatinangor') {
            var dari = 'Bandung';
        } else {
            var dari = 'Jatinangor';
        }
        var tgl_berangkat = $('#tgl_berangkat').val();
        var jam_berangkat = $('#jam_berangkat').val();
        var kursi = $('#kursi').val();
        $.ajax({
            type: 'post',
            url: '/admin/proses/next.php',
            data: {
                dari: dari,
                tgl_berangkat: tgl_berangkat,
                jam_berangkat: jam_berangkat,
                kursi: kursi
            },
            success: function (result) {
                var count = result.result;
                console.log(count);
                if (count > 0) {
                    alert('Sudah terisi');
                    return false;
                } else {
                    $('#form-edit-pesanan').submit();
                }
            }
        })

    });
});

function batal() {
    document.getElementById("pesan").style.display = "none";
    document.getElementById("jadwal").style.display = "block";
}