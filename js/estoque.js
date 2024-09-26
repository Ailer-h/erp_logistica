const forms = document.querySelectorAll('.needs-validation');
const modal_add = new bootstrap.Modal('#modal_add');
const modal_edit = new bootstrap.Modal('#modal_edit');
const modal_delete = new bootstrap.Modal('#modal_delete');
const modal_baixa = new bootstrap.Modal('#modal_baixa');

document.addEventListener('DOMContentLoaded', function(){
    table('searchbar');
});


Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
    }

    form.classList.add('was-validated')
}, false)});

document.getElementById('form_add').addEventListener('submit', event => {
   
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
                table('searchbar');
                clear_form_add();
                modal_add.hide();
            }
        })
    }
});

function clear_form_add(){

    document.getElementById('nome_prod').value = '';
    document.getElementById('qtd_padrao').value = '';
    document.getElementById('unidade_medida').value = '-1';
    document.getElementById('form_add').classList.remove('was-validated');

}

function clear_form_edit(){

    document.getElementById('form_edit').classList.remove('was-validated');
    document.getElementById('modalEdit_body').innerHTML = '';

}
function clear_form_delete(){

    document.getElementById('form_delete').classList.remove('was-validated');
    document.getElementById('modalDelete_body').innerHTML = '';

}

function clear_form_baixa(){

    document.getElementById('form_baixa').classList.remove('was-validated');
    document.getElementById('modalBaixa_body').innerHTML = '';

}

function int_js(valor, input){

    valor = valor.toString().replace(/[^0-9]/g, '');

    document.getElementById(input.id).value = valor;

}

function getFilters(){

    let estado = document.getElementById('estado').value;

    if(estado.length > 0){
        
        if(estado == 'falta'){
            return 'and ((100 * qtd_estoque) / qtd_padrao) <= 25';
        
        }
        if(estado == 'em_estoque'){
            return 'and ((100 * qtd_estoque) / qtd_padrao) > 25';

        }
    }
    return '';
}

function table(searchbar_id){

    let search = document.getElementById(searchbar_id).value;

    $.ajax({
        url: "utilities/consultar_estoque.php",
        method: "post",
        data: {
            search: search,
            filtros: getFilters()
        },
        success: function(data){
            $('#table').html(data)
        }
    });
}

function showEditModal(id_materiaPrima){
    
    modal_edit.show();

    $.ajax({

        // Chama o arquivo que pega as informações
        url: "utilities/puxarInfo_estoque.php",
        // Define o method
        method: "post",
        // Valores de "input"
        data:{

            id: id_materiaPrima,
            acao: 'edit'

        },
        // Quando der certo retorna um valor
        success: function(data){

            $("#modalEdit_body").html(data);

        }

    });

}
function showDeleteModal(id_materiaPrima){
    
    modal_delete.show();

    $.ajax({

        // Chama o arquivo que pega as informações
        url: "utilities/puxarInfo_estoque.php",
        // Define o method
        method: "post",
        // Valores de "input"
        data:{

            id: id_materiaPrima,
            acao: 'delete'

        },
        // Quando der certo retorna um valor
        success: function(data){

            $("#modalDelete_body").html(data);

        }

    });


}

function show_modalBaixa(id_materiaPrima){

    modal_baixa.show();

    $.ajax({

        url: "utilities/puxarInfo_estoque.php",
        method: "post",
        data:{

            id: id_materiaPrima,
            acao: 'baixa'

        },
        // Quando der certo retorna um valor
        success: function(data){

            $("#modalBaixa_body").html(data);

        }

    });

}

document.getElementById('form_edit').addEventListener('submit', event => {
   
    event.preventDefault();

    let nome = document.getElementById('nome_prod_edit').value;
    let qtd = document.getElementById('qtd_padrao_edit').value;
    let unidade = document.getElementById('unidade_medida_edit').value;
    let id = document.getElementById('id_edit').value;

    if(nome.length > 0 && qtd.length > 0 && unidade.length > 0){
        
        $.ajax({
            url: "utilities/editar_item_estoque.php",
            method: "post",
            data: {
                nome: nome,
                qtd_padrao: qtd,
                unidade_medida: unidade,
                id: id
            },
            success: function(){
                table('searchbar');
                clear_form_edit();
                modal_edit.hide();
            }
        })
    }
});
document.getElementById('form_delete').addEventListener('submit', event => {
   
    event.preventDefault();

    let id = document.getElementById('id_delete').value;

    $.ajax({
        url: "utilities/deletar_item_estoque.php",
        method: "post",
        data: {
            id: id
        },
        success: function(data){
            table('searchbar');
            clear_form_delete();
            modal_delete.hide();
        }
    })
});

document.getElementById('form_baixa').addEventListener('submit', event =>{
    event.preventDefault();

    let id = document.getElementById('id_baixa').value;
    let qtd = document.getElementById('qtd_prod_baixa').value;

    $.ajax({
        url: "utilities/dar_baixa.php",
        method: "post",
        data: {
            id: id,
            qtd: qtd
        },
        success: function(){
            table('searchbar');
            clear_form_baixa();
            modal_baixa.hide();
        }
        });
})

function limit_input(id_input, max){
    let input = document.getElementById(id_input);

    if(parseFloat(input.value) > max){
        input.value = max;
    }
}