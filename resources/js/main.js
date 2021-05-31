require('./bootstrap');






var navbar = document.querySelector('#main-navbar');

document.querySelector('#main-navbar-toggler').addEventListener('click', function(){
    if(navbar.style.display == '' || navbar.style.display == 'none'){
        navbar.style.display = 'block';
    } else {
        navbar.style.display = 'none';
    }

});


window.addEventListener('load', (event) => {
    
    setTimeout(function(){

        document.querySelector('#appearing-text-1').style.opacity = '1';

    }, 1000);

    setTimeout(function(){
        document.querySelector('#appearing-text-2').style.opacity = '1';
    }, 2000);

});