<div class="modal fade" id="category-modal" tabindex="-1" role="dialog" aria-labelledby="category-modal-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="category-modal-label">Adicionar nova Categoria</h4>
      </div>
      <div class="modal-body">
        <div class="category-form-container">
          <form action="{{ route('admin::category:save') }}">
            <input id="id" name="id" type="hidden">
            <div class="form-group">
              <label for="name">Nome</label>
              <input id="name" name="name" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label for="image">Imagem</label>
              <input id="image" name="image" type="file" class="form-control">
            </div>
          </form>
        </div>

        @if (isset($products))
          <div class="category-list-container" data-route-url="{{ route('admin::category:list') }}" style="display: none;">
            @include('admin.product.category-list')
          </div>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
    </div>
  </div>
</div>
