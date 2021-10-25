<div class="container">
    <div class="row">
        @foreach($articleAll as $article)
        <div class="col-md-4">
            <div class="card-content">
                <div class="card-img">
                    <img src="https://placeimg.com/380/230/nature" alt="">
                    <span><h4> {{ $article->art_code }}</h4></span>
                </div>
                <div class="card-desc">
                    <h3> {{ $article->art_name }} </h3>
                    <p>
                        Categoria :  {{ $article->art_categorie }}
                    </p>
                    <p>
                        Cantidad :  {{ $article->art_quantity }}
                    </p>

                    <a href="{{ route('articles.edit',$article->id) }} " class="btn-card">Ver articulo</a>   
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>