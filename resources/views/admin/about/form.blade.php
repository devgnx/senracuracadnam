@extends('admin.layout')

@section('content')
  <div class="container">
    <h1>Sobre a Empresa</h1>
    <hr>
    <form action="{{ route('admin::about:save') }}" method="post">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <div class="form-group">
            <label>Titulo</label>
            <input name="title" type="text" class="form-control" value="{{ $about->title or old('title') }}">
          </div>
          <div class="form-group">
            <label>Descrição</label>
            <textarea name="description" class="form-control" rows="4">{{ $about->description or old('description') }}</textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-6 text-right">
          <button class="btn btn-success" type="submit">Salvar</button>
        </div>
      </div>
    </form>
  </div>
@endsection
