
function showDiv(id){

    document.getElementById('table-edit').style.display = 'block'
    $.ajax({
        method: "GET",
        url: "http://crudlaravel.sis/products/"+id,
        data: {id: id },
        dataType: 'json',
        success: function(res){
            document.getElementById('inputId').value = res.id;
            document.getElementById('inputNome').value = res.nome;
            document.getElementById('inputPreco').value = res.preco;

        }
       })
   

   
}


const form = document.getElementById('formEdit')
form.addEventListener('submit', e => {
    var id = document.getElementById('inputId').value;
    e.preventDefault()
    

        $.ajax({   
        method: "PUT",
        url: "http://crudlaravel.sis/products/"+id,
        data: {id : id},
        dataType: 'json',
        success: function(res){
            console.log(res)
        }
            
})
    
})

//     var id = document.getElementById('inputId').value;
//     console.log(id);

