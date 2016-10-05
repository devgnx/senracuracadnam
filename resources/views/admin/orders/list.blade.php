@extends('admin.layout')

@section('content')
  <div class="container">
    <h1>Pedidos</h1>
    <hr>
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active">
        <a href="#undelivered" aria-controls="undelivered" role="tab" data-toggle="tab">
          <i class="fa fa-exclamation-circle"></i>
          Novos pedidos
        </a>
      </li>
      <li role="presentation">
        <a href="#delivered" aria-controls="delivered" role="tab" data-toggle="tab">
          <i class="fa fa-check-circle"></i>
          Pedidos entregues
        </a>
      </li>
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="undelivered">
        @include('admin.orders.list-content', ['orders'=> $orders->undelivered])
      </div>
      <div role="tabpanel" class="tab-pane fade" id="delivered">
        @include('admin.orders.list-content', ['orders' => $orders->delivered])
      </div>
    </div>
  </div>
@endsection
