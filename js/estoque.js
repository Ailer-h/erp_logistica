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

    let nome = document.getElementById('nome_prod').value.toString();
    let qtd = document.getElementById('qtd_padrao').value.toString();

    console.log(nome.length)
    console.log(qtd.length)

    if(nome.length > 0 && qtd.length > 0){
        
        $.ajax({
            url: "utilities/novo_item_estoque.php",
            method: "post",
            data: {
                nome: nome,
                qtd_padrao: qtd
            },
            success: function(){
                const modal = new bootstrap.Modal('#modal_crud');
                modal.hide();
            }
        })
    }
});

function int_js(valor, input){

    valor = valor.toString().replace(/[^0-9]/g, '');

    document.getElementById(input.id).value = valor;

}