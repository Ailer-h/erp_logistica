function showPassword(){

    let input = document.getElementById('floatingPassword');
    let button = document.getElementById('show_password');

    if(input.type == "password"){
        input.type = "text";
        button.className = "bi bi-eye-fill fs-4";
        return;
    }

    input.type = "password";
    button.className = "bi bi-eye-slash-fill fs-4";

}