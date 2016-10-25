@extends('admin.layout-flow')

@section('content-flow')
  <div class="col-xs-12">
    <div class="col-sm-7">
      <h1>Dados do Pedido</h1>
      <table>
        <thead>
          <tr>
            <th style="width: 60%; text-align: left; padding-right: 5%; border-top:none;">Nome</th>
            <th style="width: 15%; text-align: left; padding-right: 5%; border-top:none;">Quantidade</th>
            <th style="width: 15%; text-align: left; border-top:none;">Preço no site</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order->items()->get() as $item)
            <tr>
              <td>{{ $item->name }}</td>
              <td>{{ $item->quantity }}</td>
              <td>{{ $item->prefixedPrice }}</td>
            </tr>
          @endforeach
        </tbody>
        <tfooter>
          <tr>
            <td colspan="3">
              <h3 style="text-align: right;">Total: {{ $order->getTotalFormated() }}</h3>
            </td>
          </tr>
        </tfooter>
      </table>
    </div>
    <div class="col-xs-0 col-sm-1"></div>
    <div class="col-sm-4">
      <h1>Dados do cliente</h1>
      <hr>
      <table class="table table-stripped">
        <tr>
          <td>Nome:</td>
          <td style="word-break: break-word">{{ $order->name }}</td>
        </tr>
        <tr>
          <td>Telefone:</td>
          <td style="word-break: break-word">{{ $order->telephone }}</td>
        </tr>
        <tr>
          <td>Endereço:</td>
          <td style="word-break: break-word">{{ $order->address }}</td>
        </tr>
      </table>
    </div>
  </div>
@endsection
