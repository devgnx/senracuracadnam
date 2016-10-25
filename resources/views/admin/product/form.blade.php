@extends('admin.layout')

@section('content')
  <div class="container">
    <h1>Produto</h1>
    <hr>
    <form action="{{ route('admin::product:save', isset($product->id) ? $product->id : null) }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <div class="form-group">
            <label for="name">Nome</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ $product->name or old('name') }}" required>
          </div>
          <div class="form-group">
            <label for="image">Imagem</label>
            @if(!empty($product->image))
              <a href="#" data-toggle="modal" data-target="#image-viewer" class="load-image-viewer thumbnail" style="max-width: 200px;">
                <img src="{{ $product->image }}" class="img-responsive">
              </a>
            @endif
            <input id="image" name="image" type="file" class="form-control" @if(empty($product->image)) required @endif>
          </div>
          <div class="form-group">
            <label for="price">Preço</label>
            <div class="input-group">
              <span class="input-group-addon">R$</span>
              <input id="price" name="price" type="text" class="form-price form-control" value="{{ $product->price or old('price') }}" required>
            </div>
          </div>
          <div class="form-group">
            <label for="category">Categoria</label>
            <div id="category-list" class="input-group" @if (false && !$categories->count()) style="display: none" @endif>
              <select id="category" name="category" class="form-control">
                @foreach($categories as $category)
                  <option value="{{ $category->id }}"
                    @if((isset($product->category->id) and ($product->category->id or old('category->id'))) == $category->id) selected @endif>
                      {{ $category->name }}
                  </option>
                @endforeach
              </select>
              @if (false)
                <span class="input-group-btn">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#category-modal" type="button">
                    <i class="fa fa-plus"></i>&nbsp; Novo
                  </button>
                </span>
              @endif
            </div>
            @if (false)
              <button id="new-category-trigger" class="btn btn-primary" data-toggle="modal" data-target="#category-modal" type="button" style="width: 100%; @if ($categories->count()) display: none; @endif">
                <i class="fa fa-plus-circle"></i>&nbsp; Adicionar nova Categoria
              </button>
            @endif
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

  <div id="image-viewer" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="padding: 5px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-bottom: 5px;"><span aria-hidden="true">&times;</span></button>
        <img class="img-responsive" src="">
      </div>
  </div>

  @include('admin.product.category-modal')
@endsection

@section('scripts')
  <script src="{{ asset('/assets-admin/js/jquery.maskMoney.min.js') }}"></script>
  <script src="{{ asset('/assets-admin/js/products.js') }}"></script>
@endsection
