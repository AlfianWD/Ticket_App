document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

    var totalAntrian = localStorage.getItem('totalAntrian') || document.head.querySelector('meta[name="total-antrian"]').getAttribute('content');
    var antrianSekarang = localStorage.getItem('antrianSekarang') || document.head.querySelector('meta[name="antrian-sekarang"]').getAttribute('content');
    var antrianSelanjutnya = localStorage.getItem('antrianSelanjutnya') || document.head.querySelector('meta[name="antrian-selanjutnya"]').getAttribute('content');
    var sisaAntrian = localStorage.getItem('sisaAntrian') || document.head.querySelector('meta[name="sisa-antrian"]').getAttribute('content');

    localStorage.setItem('totalAntrian', totalAntrian);
    localStorage.setItem('antrianSekarang', antrianSekarang);
    localStorage.setItem('antrianSelanjutnya', antrianSelanjutnya);
    localStorage.setItem('sisaAntrian', sisaAntrian);

    document.getElementById('totalAntrian').textContent = totalAntrian;
    document.getElementById('antrianSekarang').textContent = antrianSekarang;
    document.getElementById('antrianSelanjutnya').textContent = antrianSelanjutnya;
    document.getElementById('sisaAntrian').textContent = sisaAntrian;

    const btnPanggil = document.getElementById('btnPanggil');

    if (btnPanggil) {
        const btnPanggilRow = btnPanggil.closest('tr');
        btnPanggilRow.classList.add('disabled');
        btnPanggilRow.querySelector('button').setAttribute('disabled', true);
        btnPanggilRow.querySelector('button').classList.replace('btn-outline-success', 'btn-outline-secondary');
    }
    
    btnPanggil.addEventListener('click', function () {
        fetch('/panggil-antrian', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            antrianSekarang = data.antrianSekarang;
            antrianSelanjutnya = data.antrianSelanjutnya;

            const btnPanggilRow = btnPanggil.closest('tr');
            btnPanggilRow.classList.add('disabled');
            btnPanggilRow.querySelector('button').setAttribute('disabled', true);
            btnPanggilRow.querySelector('button').classList.replace('btn-outline-success', 'btn-outline-secondary');

            document.getElementById('antrianSekarang').textContent = antrianSekarang.nomor_antrian;
            document.getElementById('antrianSelanjutnya').textContent = antrianSelanjutnya.nomor_antrian;
            document.getElementById('sisaAntrian').textContent = Math.abs(antrianSekarang.nomor_antrian-totalAntrian);

            localStorage.setItem('antrianSekarang', antrianSekarang.nomor_antrian);
            localStorage.setItem('antrianSelanjutnya', antrianSelanjutnya.nomor_antrian);
            localStorage.setItem('sisaAntrian', Math.abs(antrianSekarang.nomor_antrian-totalAntrian))
        })
        .catch(error => console.error('Error:', error));
    });
});