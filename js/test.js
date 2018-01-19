function validate() {
    var alert = document.getElementById("succees_para");
    alert.style.visibility = "hidden";
    var letters = /^[A-Za-zsא-ת\ ]+$/
    var name = document.getElementById("name_of_user");
    name.style.border = "1px solid green";
    if (name.value == "" || !letters.test(name.value) || name.value.length > 300) {
        Error(" You have to write your name and it it can contain only letters. ");
        name.style.border = "1px solid red";
        return false;
    }
    var fname = document.getElementById("fname_of_user");
    fname.style.border = "1px solid green";
    if (fname.value == "" || !letters.test(fname.value) || fname.value.length > 300) {
        Error(" You have to write your fname and it it can contain only letters. ");
        fname.style.border = "1px solid red";
        return false;
    }
    var num = /^[0-9]+$/;
    var phone = document.getElementById("phone_of_user");
    phone.style.border = "1px solid green";
    if (!num.test(phone.value) || phone.value.length > 300) {
        Error("You have to write your phone and it can contain only numbers. ");
        phone.style.border = "1px solid red";
        return false;
    }
    var email = document.getElementById("email_of_user");
    email.style.border = "1px solid green";
    if (email.value == "" || email.value.indexOf("@") == -1 || email.value.length > 300) {
        Error(" You Have To Write Valid Email Address. ");
        email.style.border = "1px solid red";
        return false;
    }

    var age = document.getElementById("age_of_user");
    age.style.border = "1px solid green";
    if (!num.test(age.value) || age.value == 0) {
        Error("You have to write your age and it can contain only numbers. ");
        age.style.border = "1px solid red";
        return false;
    } else {
        return true;
    };
}

function Error(text) {
    //errors of validation
    var alert = document.getElementById("error_para");
    alert.innerText = text + "  ";
    alert.style.visibility = "visible";
}