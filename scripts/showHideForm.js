const btn= document.getElementById('btn-show');

btn.addEventListener('click', () => {
    const form = document.getElementById('formInsertTechn');

    if(form.style.display==='block') {
        form.style.display='none';
    }

    else {
        form.style.display='block';
    }
});