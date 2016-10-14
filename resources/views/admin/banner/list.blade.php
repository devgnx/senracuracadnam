@extends('admin.layout')

@section('content')
  <div class="container">
    <h1>Banners</h1>
    <hr>
    <div class="row">
      <div class="col-xs-12 text-right">
        <a href="{{ route('admin::banner:create') }}" class="btn btn-primary">Adicionar novo banner</a>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th style="width: 150px;">Imagem</th>
          <th>Descrição</th>
          <th style="width: 200px;"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($banners as $key => $value)
          <tr>
            <td style="vertical-align: middle;">
              <a href="#" data-toggle="modal" data-target="#image-viewer" class="load-image-viewer thumbnail" style="margin: 0; vertical-align: middle;">
                <img src="{{ $value->image }}">
              </a>
            </td>
            <td style="vertical-align: middle;">
              <h3>{{ $value->description }}</h3>
            </td>
            <td class="text-right" style="vertical-align: middle;">
              <a class="btn btn-success" href="{{ route('admin::banner:edit', $value->id) }}">
                <i class="fa fa-pencil"></i> Editar
              </a>
              <a class="btn btn-danger" href="{{ route('admin::banner:delete', $value->id) }}" onclick="confirm('Tem certeza que deseja remover o banner?')">
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

  <div id="image-viewer" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="padding: 5px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-bottom: 5px;"><span aria-hidden="true">&times;</span></button>
        <img class="img-responsive" src="">
      </div>
  </div>
@endsection
