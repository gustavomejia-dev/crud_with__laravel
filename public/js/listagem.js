
function showDiv(id){

    document.getElementById('table-edit').style.display = 'block'
    $.ajax({
        method: "GET",
        url: "http://aprendendolaravel.sis/products/"+id,
        data: {id: id },
        dataType: 'json',
        success: function(res){
            document.getElementById('inputNome').value = res.nome;
            document.getElementById('inputPreco').value = res.preco;

        }
       })
   

   
}