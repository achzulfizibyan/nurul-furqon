document.addEventListener("DOMContentLoaded", function () {
    const provinsiSelect = document.getElementById("provinsi");
    const kabupatenSelect = document.getElementById("kabupaten");
    const kecamatanSelect = document.getElementById("kecamatan");

    // cek elemen, kalau tidak ada langsung return
    if (!provinsiSelect || !kabupatenSelect || !kecamatanSelect) return;

    // Load Provinsi
    fetch("https://ibnux.github.io/data-indonesia/provinsi.json")
        .then((res) => res.json())
        .then((data) => {
            data.forEach((p) => {
                provinsiSelect.innerHTML += `<option value="${p.id}">${p.nama}</option>`;
            });
        });

    // Load Kabupaten berdasarkan Provinsi
    provinsiSelect.addEventListener("change", function () {
        const provId = this.value;
        kabupatenSelect.innerHTML = `<option value="">-- Pilih Kabupaten/Kota --</option>`;
        kecamatanSelect.innerHTML = `<option value="">-- Pilih Kecamatan --</option>`;

        if (!provId) return;

        fetch(`https://ibnux.github.io/data-indonesia/kabupaten/${provId}.json`)
            .then((res) => res.json())
            .then((data) => {
                data.forEach((k) => {
                    kabupatenSelect.innerHTML += `<option value="${k.id}">${k.nama}</option>`;
                });
            });
    });

    // Load Kecamatan berdasarkan Kabupaten
    kabupatenSelect.addEventListener("change", function () {
        const kabId = this.value;
        kecamatanSelect.innerHTML = `<option value="">-- Pilih Kecamatan --</option>`;

        if (!kabId) return;

        fetch(`https://ibnux.github.io/data-indonesia/kecamatan/${kabId}.json`)
            .then((res) => res.json())
            .then((data) => {
                data.forEach((k) => {
                    kecamatanSelect.innerHTML += `<option value="${k.id}">${k.nama}</option>`;
                });
            });
    });
});
