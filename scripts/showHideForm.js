const btn= document.getElementById('btn-show');

btn.addEventListener('click', () => {
    const form = document.getElementById('form');

    if(form.style.display==='none') {
        form.style.display='block';
    }

    else {
        form.style.display='none';
    }
});