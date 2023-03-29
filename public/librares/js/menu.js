function menuShow() {
    let menuMobile = document.querySelector('.nav-list');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
        document.querySelector('.icon').src = '/images/hamburger.png';
    } else {
        menuMobile.classList.add('open');
        document.querySelector('.icon').src = '/images/sair.png';

    }
}