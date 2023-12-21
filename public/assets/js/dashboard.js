document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

    var totalAntrian = localStorage.getItem('totalAntrian') || document.head.querySelector('meta[name="total-antrian"]').getAttribute('content');
    var antrianSekarang = localStorage.getItem('antrianSekarang') || document.head.querySelector('meta[name="antrian-sekarang"]').getAttribute('content');
    var antrianSelanjutnya = localStorage.getItem('antrianSelanjutnya') || document.head.querySelector('meta[name="antrian-selanjutnya"]').getAttribute('content');
    var sisaAntrian = localStorage.getItem('sisaAntrian') || document.head.querySelector('meta[name="sisa-antrian"]').getAttribute('content');
    var btnPanggilPressed = JSON.parse(localStorage.getItem('btnPanggilPressed')) || {};

    localStorage.setItem('totalAntrian', totalAntrian);
    localStorage.setItem('antrianSekarang', antrianSekarang);
    localStorage.setItem('antrianSelanjutnya', antrianSelanjutnya);
    localStorage.setItem('sisaAntrian', sisaAntrian);

    document.getElementById('totalAntrian').textContent = totalAntrian;
    document.getElementById('antrianSekarang').textContent = antrianSekarang;
    document.getElementById('antrianSelanjutnya').textContent = antrianSelanjutnya;
    document.getElementById('sisaAntrian').textContent = sisaAntrian;

    const tabelBody = document.getElementById('tabelBody');

            tabelBody.addEventListener('click', function (event) {
                const clickedButton = event.target.closest('.btnPanggil');

                if (clickedButton) {
                    const nomorAntrian = clickedButton.dataset.no;

                    handlePanggilButtonClick(clickedButton, nomorAntrian, btnPanggilPressed);
                }
            });

            if (btnPanggilPressed) {
                const btnPanggilList = document.querySelectorAll('.btnPanggil');
                btnPanggilList.forEach(clickedButton => {
                    const nomorAntrian = clickedButton.dataset.no;
                    if (btnPanggilPressed[nomorAntrian]) {
                        const btnPanggilRow = clickedButton.closest('tr');
                        btnPanggilRow.classList.add('disabled');
                        clickedButton.setAttribute('disabled', true);
                        clickedButton.classList.replace('btn-outline-success', 'btn-outline-secondary');
                    }
                });
            }
});

function handlePanggilButtonClick(clickedButton, nomorAntrian, btnPanggilPressed) {

    const btnPanggilRow = clickedButton.closest('tr');
    if (btnPanggilRow) {
        btnPanggilRow.classList.add('disabled');
        clickedButton.setAttribute('disabled', true);
        clickedButton.classList.replace('btn-outline-success', 'btn-outline-secondary');

        btnPanggilPressed[nomorAntrian] = true;
        localStorage.setItem('btnPanggilPressed', JSON.stringify(btnPanggilPressed));

        document.getElementById('antrianSekarang').textContent = nomorAntrian;
        localStorage.setItem('antrianSekarang', nomorAntrian);

        const totalAntrian = parseInt(localStorage.getItem('totalAntrian'));
        const antrianSekarang = parseInt(nomorAntrian);
        const antrianSelanjutnya = parseInt(nomorAntrian) + 1;
        const sisaAntrian = totalAntrian - antrianSekarang;

        document.getElementById('totalAntrian').textContent = totalAntrian;
        document.getElementById('antrianSelanjutnya').textContent = antrianSelanjutnya;
        document.getElementById('sisaAntrian').textContent = sisaAntrian;

        localStorage.setItem('totalAntrian', totalAntrian);
        localStorage.setItem('antrianSelanjutnya', antrianSelanjutnya);
        localStorage.setItem('sisaAntrian', sisaAntrian);
    } else {
        console.error('Elemen closest tr tidak ditemukan.');
    }
}

document.getElementById('btnRefresh').addEventListener('click', function() {
    location.reload();
});

document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    console.log('Navbar element:', navbar);

    window.addEventListener('scroll', function() {
        if(window.scrollY > 1) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });
});