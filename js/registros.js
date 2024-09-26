const forms = document.querySelectorAll('.needs-validation');
const modal_confirm = new bootstrap.Modal('#modal_confirm')
const modal_anali = new bootstrap.Modal('#modal_anali')

function int_js(valor, input){

    valor = valor.toString().replace(/[^0-9]/g, '');

    document.getElementById(input.id).value = valor;

}

document.addEventListener('DOMContentLoaded', function(){
    table('searchbar');
})

Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
    }

    form.classList.add('was-validated')
}, false)});

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

function showModalAnali(id_regis){

    console.log(id_regis);
    
    modal_anali.show();

    $.ajax({

        // Chama o arquivo que pega as informações
        url: "utilities/puxarInfo_registro.php",
        // Define o method
        method: "post",
        // Valores de "input"
        data:{

            id: id_regis,
            acao: "Em analise"

        },
        // Quando der certo retorna um valor
        success: function(data){

            $("#modalAnali_body").html(data);

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
            acao: " "

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
    document.getElementById('data_entrega_regis').value = '';

    document.getElementById('form_confirm').classList.remove('was-validated');

}

function clear_form_anali(){
    
    document.getElementById('nome_prod_regis_anali').value = '';
    document.getElementById('qtd_pedida_regis_anali').value = '';
    document.getElementById('data_entrega_regis_anali').value = '';
    document.getElementById('qtd_chegada_regis_anali').value = '';

    document.getElementById('form_anali').classList.remove('was-validated');

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
document.getElementById('form_anali').addEventListener('submit', event =>{

    event.preventDefault();

    let id = document.getElementById('id_regis').value;
    let qtd = parseFloat(document.getElementById('qtd_chegada_regis_anali').value)
    let qtd_ped = parseFloat(document.getElementById('qtd_pedida_regis_anali').value)

    console.log(qtd);
    console.log(qtd_ped);
    console.log("id registro: ", id);
    console.log(qtd)
    
    if(qtd == qtd_ped){

        $.ajax({
            
            url: "utilities/verificar_nota.php",
            method: 'post',
            data: {

                id: id,
                qtd_rec: qtd,
                qtd_ped: qtd_ped,
                estado : 'Em estoque'

            },
            success: function(){

                table('searchbar');
                clear_form_anali();
                modal_anali.hide();
            }
        })

    }else{

        const toastContent = document.querySelector('#alert-senha');
        const toast = new bootstrap.Toast(toastContent);

        toast.show();
    }
});

function returnOrder(){

    document.getElementById('form_anali').addEventListener('submit', event =>{

        event.preventDefault();
    
        let id = document.getElementById('id_regis').value;
    
            $.ajax({
                
                url: "utilities/verificar_nota.php",
                method: 'post',
                data: {
    
                    id: id,
                    estado : 'Devolvido'
    
                },
                success: function(){
    
                    table('searchbar');
                    clear_form_anali();
                    modal_anali.hide();
                }
            })
        });

}