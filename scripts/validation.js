// var phone = document.getElementById('phone');

// phone.addEventListener('input', () => {
//     phone.setCustomValidity('');
//     phone.checkValidity();
// })

// phone.addEventListener('invalid', () => {
//     if(phone.value=== '') {
//         phone.setCustomValidity('Įveskite tel. nr.');
//     }
//     else {
//         phone.setCustomValidity('Teisingas formatas: +370xxx.')
//     }
// })

function phoneNumValidation() {
    var phoneNum=document.getElementById('phone').value;
    var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;

    var phoneResult= re.test(phoneNum);
    if(phoneResult==false) {
        // alert("Neteisingas tel. nr.");
        document.getElementById('tel_error').style.cssText+= 'display:inline';
        document.getElementById('tel_error').innerHTML="Neteisingas tel. nr. formatas";
        document.getElementById('tel_error').style.cssText+= 'border-radius: 5px; color: #a94442; border:1px solid #a94442; background-color:#f2dede';
        return false;
    }
    else {
        document.getElementById('tel_error').style.cssText+= 'display:none';
        return true;
    }
    
}

// function nameValidation() {
//     var name=document.getElementById('name').value;
//     var re = /^[\p{L}'][ \p{L}'-]*[\p{L}]$/u;
    
//     var nameResult = re.test(name);
//     if(nameResult==false) {
//         document.getElementById('name_error').innerHTML="Neteisingas vardas";
//         document.getElementById('name_error').style.cssText+= 'border: 2px solid red; background-color:red';
//         return false;
//     }
//     return true;
// }

function emailValidation() {
    var email=document.getElementById('email').value;
    var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    var emailResult=re.test(email);
    if(emailResult==false) {
        document.getElementById('email_error').style.cssText+= 'display:inline';
        document.getElementById('email_error').innerHTML="Neteisingas el. paštas";
        document.getElementById('email_error').style.cssText+= 'border-radius: 5px; color: #a94442; border:1px solid #a94442; background-color:#f2dede';
        return false;
    }
    else {
        document.getElementById('email_error').style.cssText+= 'display:none';
        return true;
    }
    
}

// document.getElementsByClassName(".register-cont").addEventListener("submit", validateForm);

