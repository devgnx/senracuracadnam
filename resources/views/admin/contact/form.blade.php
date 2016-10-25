@extends('admin.layout')

@section('content')
  <div class="container">
    <h1>Dados da Empresa</h1>
    <hr>
    <form action="{{ route('admin::contact:save') }}" method="post">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" value="{{ $contact->name or old('name') }}">
          </div>
          <div class="form-group">
            <label>Telefone</label>
            <input name="telephone" type="text" class="form-control" value="{{ $contact->telephone or old('telephone') }}">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input name="email" type="text" class="form-control" value="{{ $contact->email or old('email') }}">
          </div>
          <div class="form-group">
            <label>CEP</label>
            <input name="postal_code" type="text" class="form-control" value="{{ $contact->postal_code or old('postal_code') }}">
          </div>
          <div class="form-group">
            <label>Endereço</label>
            <input name="address" type="text" class="form-control" value="{{ $contact->address or old('address') }}">
          </div>
          <div class="form-group">
            <label>Cidade</label>
            <input name="city" type="text" class="form-control" value="{{ $contact->city or old('city') }}">
          </div>
          <div class="form-group">
            <label>Estado</label>
            <input name="state" type="text" class="form-control" value="{{ $contact->state or old('state') }}">
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
