<h3>Dados do cliente</h3>
<table>
  <tr>
    <td>Nome:</td>
    <td>{{ $order->name }}</td>
  </tr>
  <tr>
    <td>Telefone:</td>
    <td>{{ $order->telephone }}</td>
  </tr>
  <tr>
    <td>Endereço:</td>
    <td>{{ $order->address }}</td>
  </tr>
</table>
<br>
<div style="border-bottom: 1px solid #333;"></div>
<h3>Pedido</h3>
<table>
  <thead>
    <tr>
      <th style="width: 60%; text-align: left; padding-right: 5%">Nome</th>
      <th style="width: 15%; text-align: left; padding-right: 5%">Quantidade</th>
      <th style="width: 15%; text-align: left;">Preço no site</th>
    </tr>
  </thead>
  <tbody>
    @foreach($order->items()->get() as $item)
      <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->price }}</td>
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
