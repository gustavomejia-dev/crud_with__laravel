list()
function list(){
    console.log('oi');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "http://aprendendolaravel.sis/produtos/listar",
        method: "POST",
        data: {
      
        },
        dataType:'json',
        success: function(data){   
            ////melhor forma de se fazer
            console.log(data);
          var tBody = document.getElementById('bodyTable');
          var html = ''
            for(var i = 0;data.length>i;i++){
               
               html += '<tr>'+
                        '<td>' +data[i].id+'</td>'+
                        '<td>' +data[i].nome+'</td>'+
                        '<td>' +data[i].preco+'</td>'+ 
                        '<td><button id="btnEdit" onclick="showDiv('+data[i].id+')" type="button" class="btn btn-primary">Editar</button>'+
                        '<button id="btnCancel" onclick="destroy('+data[i].id+')" type="button" class="btn btn-primary">Deletar</button></td>'+
                       
                        '</tr>'
                 
                
               
       
                
            }
            
            
            document.getElementById('bodyTable').innerHTML = html;
        
        }
      }
      
      )
      

      
}

function destroy(id){
    document.getElementById('table-edit').style.display = 'none'
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "DELETE",
        url: "http://aprendendolaravel.sis/products/"+id,
        data: {
            id: id,
            
        },
        dataType:'json',
        success: function(res){
            if (res == 'sucesso'){
                console.log('delete feito, criar mensagem para mostrar isso');
                document.getElementById('table-edit').style.display = 'none'
                
              }
              list()
        }
        
    })
    
}

// function getIdRow(id){
    

//         document.getElementById('table-edit').style.display = 'block'
//         $.ajax({
//             method: "GET",
//             url: "http://aprendendolaravel.sis/products/"+id,
//             data: {id: id },
//             dataType: 'json',
//             success: function(res){
           
    
//             }
//            })
       
    
       
//     }

function exitModal(){
    document.getElementById('table-edit').style.display = 'none'
}
function showDiv(id){

    document.getElementById('table-edit').style.display = 'block'
    $.ajax({
        method: "GET",
        url: "http://aprendendolaravel.sis/products/"+id,
        data: {id: id },
        dataType: 'json',
        success: function(res){
            document.getElementById('inputId').value = res.id;
            document.getElementById('inputNome').value = res.nome;
            document.getElementById('inputPreco').value = res.preco;
            

        }
       })
   

   
}
// function list(){
//     $.ajax({
//         method: "GET",
//         url: "http://aprendendolaravel.sis/products",
//         data: {},
//         dataType: 'json',
//         success: function(res){
          

//         }
//        })
    
// }


const form = document.getElementById('formEdit')
form.addEventListener('submit', e => {
    var id = document.getElementById('inputId').value;
    console.log(id);
    e.preventDefault()
        $.ajax({   
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "PUT",
        url: "http://aprendendolaravel.sis/products/"+id,
        data: $('#formEdit').serialize(),
        dataType: 'json',
        success: function(res){
          if (res == 'sucesso'){
            console.log('update feito, criar mensagem para mostrar isso');
            document.getElementById('table-edit').style.display = 'none'
            
          }

          list() 
        }
        
            
})
    
})



