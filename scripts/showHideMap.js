// function hide(elements) {
//     elements = elements.length ? elements : [elements];

//     for (var i = 0; i < elements.length; i++) {
//         elements[i].style.display = 'none';
//     }
// }

// hide(document.querySelector('#gmap1'));
// hide(document.querySelector('#gmap2'));
const button1 = document.getElementById('btn-show-map1');

button1.addEventListener('click', () => {
    const googlemap = document.getElementById('gmap1');

    if (googlemap.style.display === 'block') {
        googlemap.style.display = 'none';
    }
    else {
        googlemap.style.display = 'block';
    }
});

const button2= document.getElementById('btn-show-map2');

button2.addEventListener('click', () => {
    const googlemap = document.getElementById('gmap2');

    if (googlemap.style.display === 'block') {
        googlemap.style.display = 'none';
    }
    else {
        googlemap.style.display = 'block';
    }
});