function validateForm() {
    //event.preventDefault();

    var namevalid=nameValidation();
    var emailvalid=emailValidation();
    var telvalid = phoneNumValidation();
    if(!namevalid || !emailvalid || !telvalid) {
        return false;
    }

    //event.target.submit();
    return true;
}
function phoneNumValidation() {
    var phoneNum=document.getElementById('phone').value;
    var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;

    var phoneResult= re.test(phoneNum);
    if(phoneResult==false) {
        // alert("Neteisingas tel. nr.");
        document.getElementById('tel_error').style.cssText+= 'display:inline';
        document.getElementById('tel_error').innerHTML="Neteisingas tel. nr. formatas ";
        document.getElementById('tel_error').style.cssText+= 'border-radius: 5px; color: #a94442; border:1px solid #a94442; background-color:#f2dede';
        return false;
    }
    else {
        document.getElementById('tel_error').style.cssText+= 'display:none';
        return true;
    }
    
}
function nameValidation() {
    var nameInput=document.getElementById('name').value;
    var re = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;

    var nameResult= re.test(nameInput);
    if(nameResult==false) {
        // alert("Neteisingas tel. nr.");
        document.getElementById('name_error').style.cssText+= 'display:inline';
        document.getElementById('name_error').innerHTML="Neteisingas vardo formatas ";
        document.getElementById('name_error').style.cssText+= 'border-radius: 5px; color: #a94442; border:1px solid #a94442; background-color:#f2dede';
        return false;
    }
    else {
        document.getElementById('name_error').style.cssText+= 'display:none';
        return true;
    }
    
}

function emailValidation() {
    var email=document.getElementById('email').value;
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    var emailResult=re.test(email);
    if(emailResult==false) {
        document.getElementById('email_error').style.cssText+= 'display:inline';
        document.getElementById('email_error').innerHTML="Neteisingas el. pašto formatas ";
        document.getElementById('email_error').style.cssText+= 'border-radius: 5px; color: #a94442; border:1px solid #a94442; background-color:#f2dede;';
        return false;
    }
    else {
        document.getElementById('email_error').style.cssText+= 'display:none';
        return true;
    }
    
}


// document.getElementsByClassName(".register-cont").addEventListener("submit", validateForm);

