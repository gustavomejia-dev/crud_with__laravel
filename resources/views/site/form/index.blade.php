<div class="form">
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <div class="inputNome">
            <span>Nome</span>
            
            <input type="text" name="nome">    
        </div>
        <div class="inputPreco">
            <span>Preço</span>
            <input type="number" name="preco">
        </div>

        <button type="">Cadastrar</button>
       <a href="{{route('products.index')}}"><button type="button">Listar</button></a> 

    </form>


</div>