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