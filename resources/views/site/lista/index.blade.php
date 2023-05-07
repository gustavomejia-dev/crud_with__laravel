<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/list.css')}}">
    
    <title>Document</title>
</head>
<body>

</div>
    <div id="container">
    <h2>Produtos</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>ID</td>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>

        </tr>
        </thead>
        <tbody>
            
            
            @foreach ($produtos as $produto)
            <tr>
                <td>{{$produto->id}}</td>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->preco}}</td>
                <td><button onclick=showDiv('{{$produto->id}}')>Editar</button>
                <form action="products/{{$produto->id}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit">Excluir</button></td>
                 </form>

            </tr>    
            @endforeach
            

            
        
            
        <tbody>
    </table>
 
</div>
<div id="table-edit">
    
    <form id = "formEdit"  method="POST">
        @csrf
        @method("PUT")
    <input id = "inputId" type="hidden" name="id" value="">
        <div class="inputNome">
            <span>Nome</span>
            <input id = "inputNome" type="text" name="nome" value="">    
        </div>
        <div class="inputPreco">
            <span>Preço</span>
            <input id ="inputPreco" type="number" name="preco" value="">
            <button id ="btnEdit" type="submit">Editar</button>
        </div>
        
    </form>    
</div>
</div>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{asset('js/listagem.js')}}"></script>

</body>
</html>