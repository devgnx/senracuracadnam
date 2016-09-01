<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Highlander Bros.">
    <link rel="icon" href="../../favicon.ico">

    <title>Faça login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <div class="col-xs-push-3 col-xs-6">
        <h1 class="text-center" style="margin-top: 80px;"><strong>MANDACARU CARNES</strong></h1>
        <hr>
        <form action="{{ route('admin::auth') }}" method="post">
          {{ csrf_field() }}

          <h4>Painel administrativo</h4>

          @if (session('errors'))
            @foreach(session('errors') as $error)
              <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Erro:</span>
                {{ $error }}
              </div>
            @endforeach
          @endif

          <div class="form-group">
            <label for="email" class="sr-only">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember"> Manter-me conectado
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
      </div>
    </div>
  </body>
</html>
