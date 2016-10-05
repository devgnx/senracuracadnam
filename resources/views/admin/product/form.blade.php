@extends('admin.layout')

@section('content')
  <div class="container">
    <h1>Produto</h1>
    <hr>
    <form action="{{ route('admin::product:save', isset($product->id) ? $product->id : null) }}" method="post">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <div class="form-group">
            <label for="name">Nome</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ $product->name or old('name') }}">
          </div>
          <div class="form-group">
            <label for="price">Preço</label>
            <div class="input-group">
              <span class="input-group-addon">R$</span>
              <input id="price" name="price" type="text" class="form-price form-control" value="{{ $product->price or old('price') }}">
            </div>
          </div>
          <div class="form-group">
            <label for="category">Categoria</label>
            <div id="category-list" class="input-group" @if (!$categories->count()) style="display: none" @endif>
              <select id="category" name="category" class="form-control">
                @foreach($categories as $category)
                  <option value="{{ $category->id }}"
                    @if((isset($product->category->id) and ($product->category->id or old('category->id'))) == $category->id) selected @endif>
                      {{ $category->name }}
                  </option>
                @endforeach
              </select>
              <span class="input-group-btn">
                <button class="btn btn-primary" data-toggle="modal" data-target="#new-category" type="button">
                  <i class="fa fa-plus"></i>&nbsp; Novo
                </button>
              </span>
            </div>
            <button id="new-category-trigger" class="btn btn-primary" data-toggle="modal" data-target="#new-category" type="button" style="width: 100%; @if ($categories->count()) display: none; @endif">
              <i class="fa fa-plus-circle"></i>&nbsp; Adicionar nova Categoria
            </button>
          </div>
          <div class="form-group">
            <label>Descrição</label>
            <textarea name="description" class="form-control" rows="4">{{ $product->description or old('description') }}</textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <a href="{{ route('admin::product:list') }}" class="btn btn-default">Voltar</a>
        </div>
        <div class="col-xs-8 col-md-2 text-right">
          <button class="btn btn-success" type="submit">Salvar</button>
        </div>
      </div>
    </form>
  </div>

  <div class="modal fade" id="new-category" tabindex="-1" role="dialog" aria-labelledby="new-category-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="new-category-label">Adicionar nova Categoria</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin::category:save') }}">
          <div class="form-group">
            <label for="name">Nome</label>
            <input id="name" name="name" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="image">Imagem</label>
            <input id="image" name="image" type="file" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script src="{{ asset('/assets-admin/js/jquery.maskMoney.min.js') }}"></script>
  <script src="{{ asset('/assets-admin/js/products.js') }}"></script>
@endsection
