let nomorAntrian = parseInt(localStorage.getItem('nomorAntrian')) || 0; 

document.addEventListener("DOMContentLoaded", function () {
    const antrianAndaElement = document.getElementById('nomorAntrian');

    if(antrianAndaElement){
        const formatNomorAntrian = String(nomorAntrian).padStart(2, "0");
        document.getElementById('nomorAntrian').innerText = formatNomorAntrian; 
    }

    const countdownDate = localStorage.getItem('savedDate');
    let startTime, timeDifference;

    if (countdownDate) {
       startTime = new Date(countdownDate).getTime();
       timeDifference = localStorage.getItem('timeDifference') || 0; 
    } else {
        startTime = new Date().getTime() + 86400000;
        timeDifference = 0;
        localStorage.setItem('savedDate', new Date(startTime).toISOString());
        localStorage.setItem('timeDifference', timeDifference);
    }

    function checkSession() {
        const now = new Date().getTime();
        const timeRemaning = Math.max(startTime - now - timeDifference, 0);

        document.getElementById('countdown').textContent = formatCountdown(timeRemaning);

        if (timeRemaning === 0) {
            localStorage.removeItem('savedDate');
            localStorage.removeItem('timeDifference');
            window.location.href = '/'; 
        }
    }

    function formatCountdown(duration) {
        const hours = Math.floor(duration / (1000 * 60 * 60));
        const minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((duration % (1000 * 60)) / 1000);

        const formattedHours = hours < 10 ? '0' + hours : hours;
        const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
        const formattedSeconds = seconds < 10 ? '0' + seconds : seconds;

        return `${formattedHours}:${formattedMinutes}:${formattedSeconds}`;
    }

    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function () {
        window.history.pushState(null, "", window.location.href);
    };

    if (localStorage.getItem('Antrian_button_click') !== 'true' || window.location.href.indexOf('/resi') === -1) {
        window.location.href = '/';
    }

    setInterval(checkSession);
});

function kembaliKeHalamanUtama() {
    localStorage.setItem('Antrian_button_click', 'false');
    window.location.href = '/';
}