const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
    }

    form.classList.add('was-validated')
}, false)});

document.getElementById('form').addEventListener('submit', event => {
   
    event.preventDefault();

    let nome_input = document.getElementById('nome_prod');
    let qtd_input = document.getElementById('qtd_padrao');

    if(nome_input.value.lenght > 0 && qtd_input.value.lenght > 0){
        
    }
    
});

function int_js(valor, input){

    valor = valor.toString().replace(/[^0-9]/g, '');

    document.getElementById(input.id).value = valor;

}