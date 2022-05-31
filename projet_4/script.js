

const headerBg = document.getElementById('bg');
// const headerPaper = document.getElementById('paper');


// parallax accueil du site
window.addEventListener('scroll', goToMenu);

function goToMenu(){
    headerBg.style.opacity = 1 - +window.pageYOffset/550+'';
    headerBg.style.top = +window.pageYOffset+'px';
    headerBg.style.backgroundPositionY = - +window.pageYOffset/2+'px';
    // headerPaper.style.opacity = 1 - +window.pageYOffset/550+'';
    // headerBg.style.top = +window.pageYOffset+'px';
    // headerPaper.style.backgroundPositionY = - +window.pageYOffset/2+'px';
}