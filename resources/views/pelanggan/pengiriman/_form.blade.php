@section('assets-top')
<style>
.volume {
    display: none;
}
</style>
@endsection

<div class="form-group">
    <label class="control-label col-md-12">Nama Penerima</label>
    <div class="col-md-12">
        <input type="text" class="form-control" name="nama_penerima" required placeholder="Nama penerima">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-12">Nomor HP / Wa penerima</label>
    <div class="col-md-12">
        <input type="number" class="form-control" name="no_hp_penerima" required placeholder="No Hp / Wa Penerima">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-12">Kota Penerima</label>
    <div class="col-md-12">
        <select name="id_kota_penerima" id="id_kota_penerima" class="form-control" required>
            <option value="" disabled selected hidden>Pilih kota</option>
            <option value="1">Palembang</option>
            <option value="3">Pekanbaru</option>
            <option value="4">Bukit Tinggi</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-12">Kecamatan Penerima</label>
    <div class="col-md-12">
        <select name="id_kecamatan_penerima" id="id_kecamatan_penerima" class="form-control" required>
            <option value="" disabled selected hidden>Pilih Kecamatan</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-12">Alamat Lengkap Penerima</label>
    <div class="col-md-12">
        <textarea class="form-control" name="alamat_penerima" rows="5" required></textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-12">Biaya ongkir anda : Rp. <label for="ongkir" id="ongkir"></label></label>
</div>
<div class="form-group">
    <label class="control-label col-md-12">Jumlah Koli</label>
    <div class="col-md-12">
        <input type="number" class="form-control" id="input_koli" min="1" placeholder="Jumlah koli" required>
    </div>
</div>
<div class="form-group" id="container">
    <!-- container berapa banyak koli dimasukan -->
</div>
<div class="form-group">
    <label class="control-label col-md-12">Metode Pembayaran</label>
    <div class="col-md-12">
        <select name="metode_pembayaran" class="form-control" required>
            <option value="" disabled selected hidden>Pilih metode pembayaran</option>
            <option value="1">Cash</option>
            <option value="2">COD</option>
            <option value="3">Transfer</option>
            <option value="4">Langganan</option>
        </select>
    </div></br>

    <div class="berat">
        <div class="form-group">
            <label class="control-label col-md-12">Berat (Kg)</label>
            <div class="col-md-12">
                <input name="berat_kg" type="number" id="berat_kg" class="form-control" min="1" placeholder="Kg"
                    step="0.1">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="jumlah_biaya" class="control-label col-md-12">Jumlah Biaya : </label>
            </div>
            <div class="col-md-8">
                <label for="jumlah_biaya" class="control-label col-md-10">
                    Rp : <input name="jumlah_biaya_kg" id="jumlah_biaya_kg" readonly="readonly"
                        class="control-label col-md-3" ste="0.1">
                </label>
            </div>
        </div>
    </div>
    <div class="volume">
        <div class="form-group">
            <label class="control-label col-md-12">P x L x T (CM) = PxLxT / 4000</label>
            <div class="col-md-12">
                <input type="number" class="form-control" min="0" id="panjang" placeholder="Panjang" step="0.1">
            </div>
            <div class="col-md-12">
                <input type="number" class="form-control" min="0" id="lebar" placeholder="Lebar" step="0.1">
            </div>
            <div class="col-md-12">
                <input type="number" class="form-control" min="0" id="tinggi" placeholder="Tinggi" step="0.1">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="berat" class="control-label col-md-12">Total Berat : </label>
            </div>
            <div class="col-md-8">
                <label for="berat" class="control-label col-md-10">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="berat_volume" id="berat_volume" readonly="readonly" class="control-label col-md-3"
                        step="0.01"> Kg
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="jumlah biaya" class="control-label col-md-12">Jumlah biaya : Rp</label>
            </div>
            <div class="col-md-8">
                <label for="jumlah_biaya" class="control-label col-md-10">
                    Rp. <input name="jumlah_biaya_volume" id="jumlah_biaya_volume" readonly="readonly"
                        class="control-label col-md-3" ste="0.01">
                </label>
            </div>
        </div>

    </div>
    <a id="hideLink" class="control-label col-md-3 col-sm-3 col-xs-12" href="#">Hitung volume</a>
    <div class="card-footer bg-transparent">
        <button class="btn btn-primary" type="submit">
            Masukan
        </button>
    </div>

</div>

@section('assets-bottom')
<script type="text/javascript">
    // hitung jumlah biaya dari volume
    ongkir = 0;
    panjang = 0;
    lebar = 0;
    tinggi = 0;

    var berat_volume = document.getElementById("berat_volume");
    var jumlah_biaya_volume = document.getElementById("jumlah_biaya_volume");
    $("#panjang").on("input", function() {
        panjang = document.getElementById("panjang").value;
        var berat_volumeTampung = (panjang * lebar * tinggi) / 4000;
        var berat_pembulatan = Math.round(berat_volumeTampung);
        berat_volume.value = berat_pembulatan;
        var jumlah_volume = berat_volume.value * ongkir;
        jumlah_biaya_volume.value = formatRupiahJumlah(jumlah_volume);
    });

    $("#lebar").on("input", function() {
        lebar = document.getElementById("lebar").value;
        var berat_volumeTampung = (panjang * lebar * tinggi) / 4000;
        var berat_pembulatan = Math.round(berat_volumeTampung);
        berat_volume.value = berat_pembulatan;
        var jumlah_volume = berat_volume.value * ongkir;
        jumlah_biaya_volume.value = formatRupiahJumlah(jumlah_volume);

    });

    $("#tinggi").on("input", function() {
        tinggi = document.getElementById("tinggi").value;
        var berat_volumeTampung = (panjang * lebar * tinggi) / 4000;
        var berat_pembulatan = Math.round(berat_volumeTampung);
        berat_volume.value = berat_pembulatan;
        var jumlah_volume = berat_volume.value * ongkir;
        jumlah_biaya_volume.value = formatRupiahJumlah(jumlah_volume);

    });

    // hitung jumlah biaya dari kg
    $("#berat_kg").on('input', function() {
        var jumlah_biaya_kg = document.getElementById('jumlah_biaya_kg');
        var berat_kg = document.getElementById("berat_kg").value;
        jumlah_biaya_kg.value = formatRupiahJumlah(ongkir * berat_kg);
    })

    // fungsi format rupiah untuk jumlah kg dan volume
    function formatRupiahJumlah(angka){
        var number_string = angka.toString(),
        sisa     		= number_string.length % 3,
        rupiah     		= number_string.substr(0, sisa),
        ribuan     		= number_string.substr(sisa).match(/\d{3}/gi);
    
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return rupiah;
    }


    // mengambil data kecamatan penerima berdasarkan kota
    var kota_penerima = $('#id_kota_penerima');
    var kecamatan_penerima = $('#id_kecamatan_penerima');
    kota_penerima.select2().on('change', function() {
        $.ajax({
            url: '/pelanggan/json/kecamatan/' + kota_penerima.val(),
            type: 'GET',
            success: function(data) {
                kecamatan_penerima.empty();
                kecamatan_penerima.append(
                    '<option value="" disabled selected hidden>Pilih Kecamatan</option>');
                $.each(data, function(value, key) {
                    kecamatan_penerima.append('<option value="' + value + '">' + key +
                        '</option>');
                });

                kecamatan_penerima.select2();
            }
        });
    });

    // mengeset nilai ongkir
    kecamatan_penerima.select2().on('change', function() {
        $.ajax({
            url: '/pelanggan/json-ongkir/' + kecamatan_penerima.val(),
            type: 'GET',
            success: function(data) {
                document.getElementById('ongkir').innerHTML = formatRupiahJumlah(data);
                ongkir = data;
            }
        });
    });


    // menampilkan metode perhitungan kg / volume
    $("#hideLink").on("click", function(e) {
        e.preventDefault()
        if ($(this).text() == "Hitung volume") {
            $(this).text("Hitung berat");
            $(".berat").hide();
            $("#berat_kg").val("");
            $("#jumlah_biaya_kg").val("");
            $(".volume").show("slow")
        } else {
            $(this).text("Hitung volume");
            $(".volume").hide();
            $("#panjang").val("");
            $("#lebar").val("");
            $("#tinggi").val("");
            $("#berat_volume").val("");
            $("#jumlah_biaya_volume").val("");
            $(".berat").show("slow");
        }
    });

    // jumlah koli
    input_koli.oninput = function() {
        var input = document.getElementById("input_koli").value;
        var container = document.getElementById("container");

        while (container.hasChildNodes()) {
            container.removeChild(container.lastChild);
        }

        for (let i = 0; i < input; i++) {
            var elementLabel = document.createElement("label");
            var textLabel = document.createTextNode("Koli " + (i + 1));
            elementLabel.setAttribute("class", "control-label col-md-12");
            elementLabel.appendChild(textLabel);

            var divCol = document.createElement("div");
            divCol.setAttribute("class", "col-md-12");

            var elementInput = document.createElement("input");
            elementInput.setAttribute("type", "text");
            elementInput.setAttribute("name", "koli[]");
            elementInput.setAttribute("class", "form-control");
            elementInput.setAttribute("required", "required");
            divCol.appendChild(elementInput);

            container.appendChild(elementLabel);
            container.appendChild(divCol);
        }
    };

    kecamatan_pengirim.select2();
</script>

@endsection