let nomorAntrian = parseInt(localStorage.getItem('nomorAntrian')) || 1; 

const antrianAndaElement = document.getElementById('nomorAntrian');

if(antrianAndaElement){
    const formatNomorAntrian = String(nomorAntrian).padStart(2, "0");
    document.getElementById('nomorAntrian').innerText = formatNomorAntrian; 
}



