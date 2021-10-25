<form method="POST" action="{{ route('articles.store') }}">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Codigo del articulo</label>
        <input type="text" required class="form-control" name="codeArticle" id="inputEmail4" placeholder="Codigo">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Nombre del articulo</label>
        <input type="text" required class="form-control" name="nameArticle" id="inputPassword4" placeholder="Nombre">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">Cantidad</label>
        <input type="number" min="1" required step="1" max="1000" name="quantityArticle" class="form-control" id="inputCity" placeholder="Cantidad">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Categoria</label>
        <select id="inputState" required name="categorieArticle" class="form-control">
          <option selected value="Zapatos">Zapatos</option>
          <option value="Mochilas">Mochilas</option>
          <option value="Vestidos">Vestidos</option>
          <option value="Camisas">Camisas</option>
        </select>
      </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary ">Registrar producto</button>

    </div>
  </form>