@extends('admin.layout')

@section('content')
  <div class="container">
    <h1>Produtos</h1>
    <hr>
    <div class="row">
      <div class="col-xs-12 text-right">
        <a href="{{ route('admin::product:create') }}" class="btn btn-primary">Criar novo produto</a>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th style="width: 40px;">#</th>
          <th>Nome</th>
          <th style="width: 200px;"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($products as $key => $value)
          <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td class="text-right">
              <a class="btn btn-success" href="{{ route('admin::product:edit', $value->id) }}">
                <i class="fa fa-pencil"></i> Editar
              </a>
              <a class="btn btn-danger" href="{{ route('admin::product:delete', $value->id) }}" onclick="confirm('Tem certeza que deseja remover o produto?')">
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
