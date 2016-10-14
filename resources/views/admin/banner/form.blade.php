@extends('admin.layout')

@section('content')
  <div class="container">
    <h1>Banner</h1>
    <hr>
    <form action="{{ route('admin::banner:save', isset($banner->id) ? $banner->id : null) }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <div class="form-group">
            <label for="description">Descrição</label>
            <input id="description" name="description" type="text" class="form-control" value="{{ $banner->description or old('description') }}" required>
          </div>
          <div class="form-group">
            <label for="image">Imagem</label>
            @if(!empty($banner->image))
              <a href="#" data-toggle="modal" data-target="#image-viewer" class="load-image-viewer thumbnail" style="max-width: 200px;">
                <img src="{{ $banner->image }}" class="img-responsive">
              </a>
            @endif
            <input id="image" name="image" type="file" class="form-control" @if(empty($banner->image)) required @endif>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <a href="{{ route('admin::banner:list') }}" class="btn btn-default">Voltar</a>
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
@endsection

@section('scripts')
  <script src="{{ asset('/assets-admin/js/jquery.maskMoney.min.js') }}"></script>
  <script src="{{ asset('/assets-admin/js/banners.js') }}"></script>
@endsection
