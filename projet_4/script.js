

const headerBg = document.getElementById('bg');
const list = document.querySelectorAll('.list');


// parallax accueil du site
window.addEventListener('scroll', goToMenu);

function goToMenu(){
    headerBg.style.opacity = 1 - +window.pageYOffset/550+'';
    headerBg.style.top = +window.pageYOffset+'px';
    headerBg.style.backgroundPositionY = - +window.pageYOffset/2+'px';
}

// main menu bar
function activeLink(){
    list.forEach((item) => 
    item.classList.remove("active"));
    this.classList.add("active");
}
list.forEach((item) =>
item.addEventListener('click', activeLink));