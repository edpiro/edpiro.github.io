const elNav1 = document.querySelector('.item1');
const elNav2 = document.querySelector('.item2');
const elNav3 = document.querySelector('.item3');
const elNav4 = document.querySelector('.item4');
const elNav5 = document.querySelector('.item5');
const elNav6 = document.querySelector('.item6');
const elNav7 = document.querySelector('.item7');

window.onscroll = function(){
    var top = window.scrollY;
console.log(top);
    if(top >= 0 & top <500){
        elNav1.classList.add('active');
    }else{
        elNav1.classList.remove('active');
    }

    if(top >=500 & top < 1000){
        elNav2.classList.add('active');
    }else{
        elNav2.classList.remove('active');
    }

    if(top >=1000 & top < 1800){
        elNav3.classList.add('active');
    }else{
        elNav3.classList.remove('active');
    }

    if(top >=1800 & top < 2700){
        elNav4.classList.add('active');
    }else{
        elNav4.classList.remove('active');
    }

    if(top >=2700 & top < 3700){
        elNav5.classList.add('active');
    }else{
        elNav5.classList.remove('active');
    }

    if(top >=3700 & top < 4800){
        elNav6.classList.add('active');
    }else{
        elNav6.classList.remove('active');
    }

    
    if(top >=4800 & top < 5600){
        elNav7.classList.add('active');
    }else{
        elNav7.classList.remove('active');
    }
};