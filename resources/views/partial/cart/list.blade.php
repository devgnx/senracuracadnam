<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="view-cart-label">Carrinho</h4>
    </div>
    <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" id="id" name="id">

      <div class="modal-body">
        @include('partial.messages')
        @if($cart->items()->count())
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th class="col-sm-1"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($cart->items()->get() as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->quantity }}</td>
                  <td>{{ $item->price }}</td>
                  <td class="text-center">
                    <a class="remove-item" href="{{ route('cart.remove', $item->id) }}">
                      <i class="fa fa-trash text-danger"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <h2 class="text-center">Não há produtos no carrinho!</h2>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="pull-left btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Fazer Pedido</button>
      </div>
    </form>
  </div>
</div>
