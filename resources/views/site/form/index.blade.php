<div class="form">
    <form action="" method="get">
        <div class="inputNome">
            <span>Nome</span>
            
            <input type="text" name="nome">    
        </div>
        <div class="inputPreco">
            <span>Preço</span>
            <input type="number" name="preco">
        </div>

        <button type="submit">Cadastrar</button>
       <a href="{{route('listar')}}"><button type="button">Listar</button></a> 

    </form>


</div>