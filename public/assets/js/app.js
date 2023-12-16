let nomorAntrian = parseInt(localStorage.getItem('nomorAntrian')) || 1; 

function updateNomorAntrian() {
    const formatNomorAntrian = String(nomorAntrian).padStart(2, "0");
    document.getElementById('nomorAntrian').innerText = formatNomorAntrian; 

    localStorage.setItem('nomorAntrian', nomorAntrian.toString());
}

function ambilAntrian() {

    nomorAntrian++;

    updateNomorAntrian();

}

function resetAntrian() {
    const currentTime = new Date();
    const currentDay = currentTime.getDate();

    if (nomorAntrian > 0 && currentDay !== currentTime.getDate()) {
        nomorAntrian = 1;
    }

    updateNomorAntrian();
}

updateNomorAntrian();

setInterval(resetAntrian, 86400000);