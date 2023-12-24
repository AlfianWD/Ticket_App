document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

    var totalAntrian = localStorage.getItem('totalAntrian') || document.head.querySelector('meta[name="total-antrian"]').getAttribute('content');
    var antrianSekarang = localStorage.getItem('antrianSekarang') || document.head.querySelector('meta[name="antrian-sekarang"]').getAttribute('content');
    var antrianSelanjutnya = localStorage.getItem('antrianSelanjutnya') || document.head.querySelector('meta[name="antrian-selanjutnya"]').getAttribute('content');
    var sisaAntrian = localStorage.getItem('sisaAntrian') || document.head.querySelector('meta[name="sisa-antrian"]').getAttribute('content');
    var btnPanggilPressed = JSON.parse(localStorage.getItem('btnPanggilPressed')) || {};
    var plusSisaAntrian = localStorage.getItem('sisaAntrian') || document.head.querySelector('meta[name="sisa-antrian"]').getAttribute('content');

    localStorage.setItem('totalAntrian', totalAntrian);
    localStorage.setItem('antrianSekarang', antrianSekarang);
    localStorage.setItem('antrianSelanjutnya', antrianSelanjutnya);
    localStorage.setItem('sisaAntrian', sisaAntrian);
    localStorage.setItem('plusSisaAntrian', plusSisaAntrian);

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

            const today = new Date().toLocaleDateString();
            const savedDate = localStorage.getItem('savedDate');

            if (today !== savedDate) {
                localStorage.clear();
                localStorage.setItem('savedDate', today);
            }

    setInterval(fetchTotalAntrian, 5000);
    
});

function fetchTotalAntrian() {
    fetch('/get-total-antrian')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const totalAntrian = data.totalAntrian;
            document.getElementById('totalAntrian').textContent = totalAntrian;
            localStorage.setItem('totalAntrian', totalAntrian);
        })
        .catch(error => console.error('Error fetching total antrian:', error));
}

function handlePanggilButtonClick(clickedButton, nomorAntrian, btnPanggilPressed) {
    const btnPanggilRow = clickedButton.closest('tr');

    if (btnPanggilRow) {
        btnPanggilRow.classList.add('disabled');
        clickedButton.setAttribute('disabled', true);
        clickedButton.classList.replace('btn-outline-success', 'btn-outline-secondary');

        btnPanggilPressed[nomorAntrian] = true;
        localStorage.setItem('btnPanggilPressed', JSON.stringify(btnPanggilPressed));

        const antrianSekarang = parseInt(localStorage.getItem('antrianSekarang'));
        const antrianSelanjutnya = parseInt(nomorAntrian) + 1;
        
        const sisaAntrian = Math.max(parseInt(localStorage.getItem('sisaAntrian')) - 1, 0);

        document.getElementById('antrianSelanjutnya').textContent = antrianSelanjutnya;
        document.getElementById('antrianSekarang').textContent = nomorAntrian;
        document.getElementById('sisaAntrian').textContent = sisaAntrian;

        localStorage.setItem('sisaAntrian', sisaAntrian);
        localStorage.setItem('antrianSekarang', nomorAntrian);
        localStorage.setItem('antrianSelanjutnya', antrianSelanjutnya);
    } else {
        console.error('Elemen closest tr tidak ditemukan.');
    }
}

document.getElementById('btnRefresh').addEventListener('click', function() {

    const totalAntrian = parseInt(localStorage.getItem('totalAntrian')) || 0;
    const plusSisaAntrian = parseInt(localStorage.getItem('plusSisaAntrian')) || 0;

    if(totalAntrian > plusSisaAntrian) {
        const sisaAntrian = Math.max(parseInt(localStorage.getItem('sisaAntrian')) + 1, 0);
        document.getElementById('sisaAntrian').textContent = sisaAntrian;
        localStorage.setItem('sisaAntrian', sisaAntrian);

        location.reload();
    }
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