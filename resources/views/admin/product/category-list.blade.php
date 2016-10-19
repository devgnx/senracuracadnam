<table class="table table-stripped">
  <tbody>
    @foreach($categories as $category)
      <tr>
        <td><a class="edit-category" href="{{ route('admin::category:edit') }}">{{ $category->name }}</a></td>
      </tr>
    @endforeach
  </tbody>
</table>
