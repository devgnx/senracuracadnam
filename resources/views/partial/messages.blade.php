@if (session('success'))
  @foreach(session('success') as $type => $message)
    <div class="alert alert-{{ App\Enum\MessageTypes::has($type) ? App\Enum\MessageTypes::get($type) : 'success' }}" role="alert">
      <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
      <span class="sr-only">Sucesso:</span>
      {{ $message }}
    </div>
  @endforeach
@endif

@if (session('info'))
  @foreach(session('info') as $message)
    <div class="alert alert-info" role="alert">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      <span class="sr-only">Atenção:</span>
      {{ $message }}
    </div>
  @endforeach
@endif

@if (session('warning'))
  @foreach(session('warning') as $message)
    <div class="alert alert-warning" role="alert">
      <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
      <span class="sr-only">Atenção:</span>
      {{ $message}}
    </div>
  @endforeach
@endif

@if (session('error'))
  @foreach(session('error') as $message)
    <div class="alert alert-danger" role="alert">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      <span class="sr-only">Erro:</span>
      {{ $message }}
    </div>
  @endforeach
@endif
