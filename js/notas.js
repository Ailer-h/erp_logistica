function table(searchbar_id){ //WIP

    let search = document.getElementById(searchbar_id).value;

    $.ajax({
        url: "utilities/consultar_notas.php",
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