let nomorAntrian = parseInt(localStorage.getItem('nomorAntrian')) || 0; 

const antrianAndaElement = document.getElementById('nomorAntrian');

if(antrianAndaElement){
    const formatNomorAntrian = String(nomorAntrian).padStart(2, "0");
    document.getElementById('nomorAntrian').innerText = formatNomorAntrian; 
}

document.addEventListener("DOMContentLoaded", function () {
    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function () {
        window.history.pushState(null, "", window.location.href);
    };

    if (localStorage.getItem('Antrian_button_click') !== 'true' || window.location.href.indexOf('/resi') === -1) {
        window.location.href = '/';
    }
});

function kembaliKeHalamanUtama() {
    localStorage.setItem('Antrian_button_click', 'false');
    window.location.href = '/';
}