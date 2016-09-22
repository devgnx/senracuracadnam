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
    <hr>
    <br>
    <br>
    <div class="row">
      <div class="col-xs-12 text-right">
        @if ($services->count() < 3)
          <a href="{{ route('admin::service:create') }}" class="btn btn-primary">Adicionar descrição</a>
        @endif
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th style="width: 40px;">#</th>
          <th>Título</th>
          <th style="width: 200px;"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($services as $key => $value)
          <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>
              <a class="btn btn-success" href="{{ route('admin::service:edit', $value->id) }}">
                <i class="fa fa-pencil"></i> Editar
              </a>
              <a class="btn btn-danger" href="{{ route('admin::service:delete', $value->id) }}">
                <i class="fa fa-trash"></i> Apagar
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3"><h4 class="text-center">Não há registros.</h4></td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
