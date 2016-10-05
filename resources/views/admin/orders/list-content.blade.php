<table class="table table-striped">
  <thead>
    <tr>
      <th style="width: 40px;">#</th>
      <th>Nome</th>
      <th>Telefone</th>
      <th style="width: 90px;">Itens</th>
      <th style="width: 200px;"></th>
    </tr>
  </thead>
  <tbody>
    @forelse($orders as $key => $value)
      <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->telephone }}</td>
        <td>{{ $value->items->count() }}</td>
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
