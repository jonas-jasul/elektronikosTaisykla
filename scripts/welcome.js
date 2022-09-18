// const btn = document.getElementById('arrow-down-btn');

// const divAnimate = [
//     {top: '-10px'}
// ];

// const divAnimate2 =[
//     {bottom: '10px'}
// ];
// const divTimings = {
//     duration:2000,
//     iterations:1
// }
// btn.addEventListener('mouseenter', () => {
//     const div = document.getElementById('welcomeDiv');
    
// });
$(document).ready(function() {
    $('.welcomeText').mouseover(function() {
        $('#welcomeDiv').animate({
            bottom: '+=40px'            
        },1400);
        $('#welcomeDiv').animate( {
            bottom: '-=40px'            
        }, 1400);  
    });
    

    $('#arrow-down-btn').mouseenter(function() {
        $('#arrow-down-btn').animate({
            "padding-top": "50px"
        }, 2000);

    });

    $('#arrow-down-btn').mouseleave(function() {
        $('#arrow-down-btn').animate({
            "padding-top": "0px"
        }, 2000);

    });
    // $('.welcomeText').mouseout(function() {
    //     $('#welcomeDiv').stop();
    // });
    
});