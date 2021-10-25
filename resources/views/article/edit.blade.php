@extends('layouts.app')


@section('contenido_js')
    
@endsection

@section('contenido_cSS')
    
@endsection


@section('content')
<div class="row container">
    <div class="col-4">
        <div class="card" >
            <img class="card-img-top" src="https://placeimg.com/380/230/nature" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $article->art_name }}</h5>
              <p class="card-text"> Categoria : {{ $article->art_categorie }}</p>
            </div>
          </div>
        
    </div>
    <div class="col-8">
        <div class="card container py-2">
            <form method="POST" action="{{ route('articles.update',$article->id) }}">
                @csrf
                @method('put')
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Codigo</label>
                    <input type="text" class="form-control" disabled value="{{ $article->art_code }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Nombre del articulo</label>
                    <input type="text" required class="form-control" name="nameArticle" id="inputPassword4" value="{{ $article->art_name }}" placeholder="Nombre">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">Cantidad</label>
                    <input type="number" min="1" required step="1" max="1000" name="quantityArticle" class="form-control" value="{{ $article->art_quantity }}" id="inputCity" placeholder="Cantidad">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">Categoria</label>
                    <select id="inputState"  disabled class="form-control">
                      <option selected value="Zapatos">Zapatos</option>
                      <option value="Mochilas">Mochilas</option>
                      <option value="Vestidos">Vestidos</option>
                      <option value="Camisas">Camisas</option>
                    </select>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mr-2">Editar</button>
            
                </div>
              </form>
              <form action="{{ route('articles.destroy',$article->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger ">Borrar</button>
            
                </div>                
            </form>



        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    <a href="{{ route('articles.index') }}" class="btn btn-primary" >Ver productos</a>
</div>

@endsection

@section('contenido_abajo_js')
@if (session('contractFailed'))
<script>
    Swal.fire({
        title: "Error al registrar articulo",
        html:  `
        {{session('contractFailed')}}
        <br>
        <ul>
            @foreach ($errors->contractProccessForm->all() as $errorRegister)
                <li>{{ $errorRegister }}</li>
            @endforeach
        </ul>`,
        icon: "error"
    });
</script>
@endif

@if (session('updateArticle'))
<script>
    Swal.fire({
        title: "Articulo actualizado correctamente",
        html:  `
        {{session('updateArticle')}}`,
        icon: "success"
    });

</script>
@endif
@endsection