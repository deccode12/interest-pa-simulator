<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Simulasi Pendanaan</title>
</head>

<body style="background:#f5f5f5">
    <section class="container mt-4 pt-4 bg-white shadow-sm" style="max-width:640px">
        <div class="p-3 pt-2 pb-4">
            <h2>Simulasi Pendanaan</h2>
            <hr>
            <div class="d-flex justify-content-between mt-5">
                <label class="form-label">Modal Pendanaan</label>
                <label><strong>Rp <span id="angka-rupiah">300.000</span></strong></label>
            </div>
            <input name="range-rupiah" type="range" class="form-range" id="range-rupiah" value="2" step="1" max="4">

            <div class="d-flex justify-content-between mt-4">
                <label class="form-label">Jangka Waktu</label>
                <label><strong><span id="angka-hari">45</span> Hari</strong></label>
            </div>
            <input name="range-hari" type="range" class="form-range" id="range-hari" value="2" step="1" max="5">

            <div class="row mt-4">
                <div class="col">
                    <label>Interest Rate</label>
                    <h3>18% pa</h3>
                </div>
                <div class="col">
                    <label>Keuntungan</label>
                    <h3>Rp <span id="angka-untung">0</span></h3>
                </div>
            </div>

            <div class="mt-4 mb-5">
                <label>Modal + Keuntungan*</label>
                <h3 class="text-primary">Rp <span id="angka-kembali">0</span></h3>
            </div>

            <hr>

            <p class="text-secondary">*Total yang didapat saat jangka waktu selesai</p>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            var bunga = 18 / 100; //Bunga 18% per tahun
            var hariSetahun = 365; //Jumlah hari dalam setahun
            var pendanaan = 300000; //Nilai default pendanaan rupiah
            var jangkawaktu = 45; //Nilai default jangka waktu

            hitungUntung(pendanaan, jangkawaktu); //hitung keuntungan dari nilai default

            //Fungsi mengubah teks label Rupiah secara realtime saat Range slider modal pendanaan digeser
            $('#range-rupiah').on('input change', function() {
                var rangeRupiah = (parseInt($('#range-rupiah').val()) + 1) * 100000;
                pendanaan = rangeRupiah;
                $('#angka-rupiah').text(rangeRupiah.toLocaleString('id', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }));

                hitungUntung(pendanaan, jangkawaktu);
            });

            //Fungsi mengubah teks label Hari secara realtime saat Range slider jangka waktu digeser
            $('#range-hari').on('input change', function() {
                var rangeHari = (parseInt($('#range-hari').val()) + 1) * 15;
                jangkawaktu = rangeHari
                $('#angka-hari').text(rangeHari)

                hitungUntung(pendanaan, jangkawaktu);
            });

            //Fungsi Menghitung keuntungan
            function hitungUntung(dana, hari) {
                //Rumus = Jumlah Rupiah x Bunga Pertahun x Jangka Waktu (hari) / 365 Hari
                //Math.floor merupakan pembulatan ke bawah
                var untung = Math.floor(dana * bunga * hari / hariSetahun);
                $('#angka-untung').text(untung.toLocaleString('id', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }));
                $('#angka-kembali').text(parseInt(pendanaan+untung).toLocaleString('id', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }));
            }
        });
    </script>

</body>

</html>