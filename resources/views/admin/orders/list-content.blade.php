<table class="table table-striped">
  <thead>
    <tr>
      <th style="width: 40px;">#</th>
      <th>Nome</th>
      <th>Telefone</th>
      <th style="min-width: 150px;">Status</th>
      <th style="width: 90px;">Itens</th>
      <th>Qtd.</th>
      <th>Total</th>
      <th style="width: 200px;"></th>
    </tr>
  </thead>
  <tbody>
    @forelse($orders as $key => $value)
      <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->telephone }}</td>
        <td>
          <select class="status form-control" data-id="{{ $value->id }}">
            <option value="1" @if($value->delivered == \App\Enum\StatusEnum::DELIVERED) selected @endif>Entregue</option>
            <option value="0" @if($value->delivered == \App\Enum\StatusEnum::UNDELIVERED) selected @endif>Aguardando</option>
          </select>
        </td>
        <td>{{ $value->items->count() }}</td>
        <td>{{ $value->totalFormated }}</td>
        <td class="text-right">
          <a class="btn btn-info" href="{{ route('admin::order:view', $value->id) }}">
            <i class="fa fa-eye"></i>&nbsp; Visualizar
          </a>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="5"><h4 class="text-center">Não há registros.</h4></td>
      </tr>
    @endforelse
  </tbody>
</table>
