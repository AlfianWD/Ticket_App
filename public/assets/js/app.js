let nomorAntrian = parseInt(localStorage.getItem('nomorAntrian')) || 0; 
let ambilAntrianDipanggil = false;

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function updateNomorAntrian() {
    const formatNomorAntrian = String(nomorAntrian).padStart(2, "0");
    document.getElementById('nomorAntrian').innerText = formatNomorAntrian; 

    localStorage.setItem('nomorAntrian', nomorAntrian.toString());
}

function ambilAntrian() {

    nomorAntrian++;

    const tanggal = new Date().toLocaleDateString();

    localStorage.setItem('Antrian_button_click', 'true');

    fetch('/simpan-nomor-antrian', {
        method: 'POST',
        headers: {
            'content-type': 'application/json',
            'X-CSRF-TOKEN' : csrfToken
        },
        body: JSON.stringify({
            nomorAntrian: nomorAntrian,
            tanggal: tanggal,
            tombolDiklik: true,
        }),
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        window.location.href = '/resi';
    })
    .catch(error => {
        console.log('gagal mengirim data:', error);
    });

    updateNomorAntrian();

}

function resetAntrian() {
    const currentTime = new Date().toLocaleDateString();
    const lastResetDay = localStorage.getItem('lastResetDay');

    if (currentTime !== lastResetDay) {
        nomorAntrian = 0;

        fetch('/tandai-reset-antrian', {
            method: 'POST',
            headers: {
                'content-type': 'application/json',
                'X-CSRF-TOKEN' : csrfToken
            },
            body: JSON.stringify({
                resetAntrian: false,
            }),
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.log('gagal mengirim data:', error);
        });

        localStorage.setItem('lastResetDay', currentTime)
    }

    updateNomorAntrian();
}


updateNomorAntrian();
resetAntrian();


setInterval(resetAntrian, 86400000);