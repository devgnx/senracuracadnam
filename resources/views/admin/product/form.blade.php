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
            <label>Nome</label>
            <input name="name" type="text" class="form-control" value="{{ $product->name or old('name') }}">
          </div>
          <div class="form-group">
            <label>Preço</label>
            <div class="input-group">
              <span class="input-group-addon">R$</span>
              <input name="name" type="text" class="form-price form-control" value="{{ $product->price or old('price') }}">
            </div>
          </div>
          <div class="form-group">
            <label>Categoria</label>
            <select name="category" class="form-control">
              @foreach($categories as $category)
                <option value="{{ $category->id }}"
                  @if(($product->category->id or old('category->id')) == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
              @endforeach
            </select>
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
        <div class="col-xs-2 text-right">
          <button class="btn btn-success" type="submit">Salvar</button>
        </div>
      </div>
    </form>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('/assets_admin/js/jquery.maskMoney.min.js') }}"></script>
  <script src="{{ asset('/assets_admin/js/products.js') }}"></script>
@endsection
