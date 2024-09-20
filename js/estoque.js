const forms = document.querySelectorAll('.needs-validation')
const modal_add = new bootstrap.Modal('#modal_crud');

document.addEventListener('DOMContentLoaded', function(){
    table('');
});

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

    let nome = document.getElementById('nome_prod').value;
    let qtd = document.getElementById('qtd_padrao').value;
    let unidade = document.getElementById('unidade_medida').value;

    if(nome.length > 0 && qtd.length > 0 && unidade.length > 0){
        
        $.ajax({
            url: "utilities/novo_item_estoque.php",
            method: "post",
            data: {
                nome: nome,
                qtd_padrao: qtd,
                unidade_medida: unidade
            },
            success: function(){
                modal_add.hide();
                clear_form();
                table('');
            }
        })
    }
});

function clear_form(){
    document.getElementById('nome_prod').value = '';
    document.getElementById('qtd_padrao').value = '';
    document.getElementById('unidade_medida').value = '-1';
    document.getElementById('form').classList.remove('was-validated');
}

function int_js(valor, input){

    valor = valor.toString().replace(/[^0-9]/g, '');

    document.getElementById(input.id).value = valor;

}

function table(search){
    $.ajax({
        url: "utilities/consultar_estoque.php",
        method: "post",
        data: {
            search: search
        },
        success: function(data){
            $('#table').html(data)
        }
    });
}