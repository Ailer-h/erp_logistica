const modal_confirm = new bootstrap.Modal('#modal_confirm')

document.addEventListener('DOMContentLoaded', function(){
    table('searchbar');
})

function table(searchbar_id){

    let search = document.getElementById(searchbar_id).value;

    $.ajax({
        url: "utilities/consultar_registros.php",
        method: "post",
        data: {
            search: search
        },
        success: function(data){
            $('#table').html(data)
        }
    });
}



function showModalConfirm(id_regis){

    console.log(id_regis);
    
    modal_confirm.show();

    $.ajax({

        // Chama o arquivo que pega as informações
        url: "utilities/puxarInfo_registro.php",
        // Define o method
        method: "post",
        // Valores de "input"
        data:{

            id: id_regis,

        },
        // Quando der certo retorna um valor
        success: function(data){

            $("#modalConfirm_body").html(data);

        }

    });

}
function clear_form_confirm(){
    
    document.getElementById('nome_prod_regis').value = '';
    document.getElementById('qtd_pedida_regis').value = '';
    document.getElementById('data_entrega_regis').value = '';

    document.getElementById('form_confirm').classList.remove('was-validated');

}

document.getElementById('form_confirm').addEventListener('submit', event =>{

    event.preventDefault();

    let id = document.getElementById('id_regis').value;

    console.log(id);
    
        $.ajax({
            
            url: "utilities/atualizar_registro.php",
            method: 'post',
            data: {

                id: id,
                estado: 'Em análise'

            },
            success: function(){
                table('searchbar');
                clear_form_confirm();
                modal_confirm.hide();
            }
        })

});