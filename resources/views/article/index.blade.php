@extends('layouts.app')


@section('contenido_js')
    
@endsection

@section('contenido_cSS')
    <link rel="stylesheet" href="{{ asset('css/indexNow.css') }}">
@endsection


@section('content')
    <h4 class="text-center py-4"> Ingrese su articulo </h4>
    <div class="container">
        @include('article.create')

    </div>
    <h4 class="text-center py-4"> Lista de articulos </h4>

    @include('article.show')



@endsection

@section('contenido_abajo_js')

@if (session('contractFailed'))
<script>
    Swal.fire({
        title: "Error en el contrato",
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

@if (session('statusRegisterArticle'))
<script>
    Swal.fire({
        title: "Articulo",
        html:  `
        {{session('statusRegisterArticle')}}`,
        icon: "success"
    });
</script>
@endif
@endsection