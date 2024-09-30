const forms = document.querySelectorAll('.needs-validation');
const modal_add = new bootstrap.Modal('#modal_add')
const modal_cancel = new bootstrap.Modal('#modal_cancel')

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

document.getElementById('form_add').addEventListener('submit', event =>{
    event.preventDefault();

    let produto = document.getElementById('nome_produto').value;
    let qtd = document.getElementById('qtd_requisitada').value;
    let data_chegada = document.getElementById('data_chegada').value;

    if(produto.length > 0 && qtd.length > 0 && data_chegada.length == 10){
        
        $.ajax({
            url: "utilities/nova_nota.php",
            method: 'post',
            data: {
                produto: produto,
                qtd: qtd,
                data: data_chegada
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
    
    document.getElementById('nome_produto').value = '';
    document.getElementById('qtd_requisitada').value = '';
    document.getElementById('data_chegada').value = '';
    document.getElementById('qtd_requisitada').disabled = true;

    document.getElementById('form_add').classList.remove('was-validated');

}

function clear_form_cancel(){

    document.getElementById('form_cancel').classList.remove('was-validated');
    document.getElementById('modalCancel_body').innerHTML = '';

}

function getDateFilter(){

    let data_filtro = document.getElementById('filter-date').value;
    
    if(data_filtro.length == 10){
        data_filtro = data_filtro.split('/').reverse().join('-');
        return ` and nt.data_nota = '${data_filtro}'`;

    }

    return ""
    
}

function getStatusFilter(){

    let estado = document.getElementById('estado').value;

    if(estado.length > 0 && estado != "todos"){
        return ` and nt.estado_nota = '${estado}'`;
    
    }

    return "";

}

function table(searchbar_id){

    let search = document.getElementById(searchbar_id).value;

    $.ajax({
        url: "utilities/consultar_notas.php",
        method: "post",
        data: {
            search: search,
            filtros: getDateFilter() + getStatusFilter()
        },
        success: function(data){
            $('#table').html(data)
        }
    });
}

function int_js(valor, input){

    valor = valor.toString().replace(/[^0-9]/g, '');

    document.getElementById(input.id).value = valor;

}

function showCancelModal(id_nota){
    
    modal_cancel.show();

    $.ajax({

        // Chama o arquivo que pega as informações
        url: "utilities/puxarInfo_nota.php",
        // Define o method
        method: "post",
        // Valores de "input"
        data:{

            id: id_nota,

        },
        // Quando der certo retorna um valor
        success: function(data){

            $("#modalCancel_body").html(data);

        }

    });

}
document.getElementById('form_cancel').addEventListener('submit', event => {
   
    event.preventDefault();

    let id = document.getElementById('id_cancel').value;
        
        $.ajax({
            url: "utilities/cancelar_item_nota.php",
            method: "post",
            data: {

                id: id

            },
            success: function(){
                table('searchbar');
                clear_form_cancel();
                modal_cancel.hide();
            }
        })
    
});

function change_input_sufix(id_materiaPrima){
    $.ajax({
        url: "utilities/get_unidadeMedida.php",
        method: "post",
        data: {
            id_materiaPrima: id_materiaPrima
        },
        success: function(data){
            $('#span_unidade_medida').html(data);
            if(document.getElementById('max-nota').value > 0){

                document.getElementById('qtd_requisitada').disabled = false;
                document.getElementById('salvarNota').disabled = false;

            }else{

                document.getElementById('qtd_requisitada').disabled = true;
                document.getElementById('qtd_requisitada').value = "";
                document.getElementById('salvarNota').disabled = true;


            }
        }
    });
}

function limit_input(id_input){
    let input = document.getElementById(id_input);
    let max_nota = document.getElementById('max-nota').value;

    if(parseFloat(input.value) > max_nota){
        input.value = max_nota;
    }
}