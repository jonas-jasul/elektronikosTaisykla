// function hide(elements) {
//     elements = elements.length ? elements : [elements];

//     for (var i = 0; i < elements.length; i++) {
//         elements[i].style.display = 'none';
//     }
// }

// hide(document.querySelector('#gmap1'));
// hide(document.querySelector('#gmap2'));


function showHideWelcomeMap(gmap, btn) {
    const button1= document.getElementById(btn);

    button1.addEventListener('click', () => {
        const googlemap = document.getElementById(gmap);
    
        if (googlemap.style.display === 'block') {
            googlemap.style.display = 'none';
        }
        else {
            googlemap.style.display = 'block';
            
        }
    });
};

showHideWelcomeMap('gmap2', 'btn-show-map2');
showHideWelcomeMap('gmap1', 'btn-show-map1');
showHideWelcomeMap('gmap3', 'btn-show-map3');
showHideWelcomeMap('gmap4', 'btn-show-map4');