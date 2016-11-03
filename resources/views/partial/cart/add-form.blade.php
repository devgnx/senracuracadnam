<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="add-to-cart-label">Adicionar ao Carrinho</h4>
    </div>
    <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" id="id" name="id">
      <input type="hidden" id="price" name="price">

      <div class="modal-body">
        @if(!session('customer'))
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label for="name">Nome</label>
                <input name="name" type="text" id="name" class="form-control" placeholder="Nome" required>
              </div>
              <div class="col-sm-6">
                <label for="telephone">Telefone</label>
                <input name="telephone" type="tel" id="telephone" class="form-control" placeholder="Telefone" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="address">Endereço</label>
            <input name="address" type="text" id="address" class="form-control" placeholder="Endereço" required>
          </div>
        @endif
        <div class="form-group">
          <label for="quantity">Quantidade (Kg)</label>
          <input name="quantity" type="text" id="quantity" class="form-control money" placeholder="Quantidade em kg" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="pull-left btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Adicionar</button>
      </div>
    </form>
  </div>
</div>
