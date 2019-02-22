function validateEmail(emailField){
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(emailField.value) == false) 
    {
        alert('Invalid Email Address');
        return false;
    }
    return true;
}
function validatePhone(contactField){
    if(contactField.value.length != 10)
    {
        alert("Invalid Phone Number");
        return false;
    }
    return true;
}
function validate(){
    var email = document.getElementById('email_id');
    var contact = document.getElementById('contact_no');
    var email_validate = validateEmail(email);
    var contact_validate = validatePhone(contact);
    return email_validate&&contact_validate;
}