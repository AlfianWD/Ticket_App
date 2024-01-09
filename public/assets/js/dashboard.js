document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

    var totalAntrian = localStorage.getItem('totalAntrian') || document.head.querySelector('meta[name="total-antrian"]').getAttribute('content');
    var antrianSekarang = localStorage.getItem('antrianSekarang') || document.head.querySelector('meta[name="antrian-sekarang"]').getAttribute('content');
    var antrianSelanjutnya = localStorage.getItem('antrianSelanjutnya') || document.head.querySelector('meta[name="antrian-selanjutnya"]').getAttribute('content');
    var btnPanggilPressed = JSON.parse(localStorage.getItem('btnPanggilPressed')) || {};

    localStorage.setItem('totalAntrian', totalAntrian);
    localStorage.setItem('antrianSekarang', antrianSekarang);
    localStorage.setItem('antrianSelanjutnya', antrianSelanjutnya);

    document.getElementById('totalAntrian').textContent = totalAntrian;
    document.getElementById('antrianSekarang').textContent = antrianSekarang;
    document.getElementById('antrianSelanjutnya').textContent = antrianSelanjutnya;
    
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

function handlePanggilButtonClick(clickedButton, nomorAntrian, btnPanggilPressed, antrianSekarang) {
    const btnPanggilRow = clickedButton.closest('tr');

    if (btnPanggilRow) {
        btnPanggilRow.classList.add('disabled');
        clickedButton.setAttribute('disabled', true);
        clickedButton.classList.replace('btn-outline-success', 'btn-outline-secondary');

        btnPanggilPressed[nomorAntrian] = true;
        localStorage.setItem('btnPanggilPressed', JSON.stringify(btnPanggilPressed));

        const antrianSekarangInt = parseInt(nomorAntrian);
        const antrianSelanjutnya = antrianSekarangInt + 1;

        document.getElementById('antrianSelanjutnya').textContent = antrianSelanjutnya.toString().padStart(2, "0");
        document.getElementById('antrianSekarang').textContent = nomorAntrian;

        localStorage.setItem('antrianSelanjutnya', antrianSelanjutnya.toString().padStart(2, "0"));
        localStorage.setItem('antrianSekarang', nomorAntrian);
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