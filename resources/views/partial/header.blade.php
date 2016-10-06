<header id="header">
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-xs-4">
          <div class="top-number"><p><i class="fa fa-phone-square"></i>  {{ $contact->telephone or null }}</p></div>
        </div>
      </div>
    </div><!--/.container-->
  </div><!--/.top-bar-->

  <nav class="navbar navbar-inverse" role="banner">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Abrir/Fechar</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route("home") }}"><img src="/img/logo.png" alt="logo"></a>
      </div>

      <div class="collapse navbar-collapse navbar-right">
        <ul class="nav navbar-nav">
          <li @if($page->name == 'home')class="active"@endif>
            <a href="{{ route('home') }}">Home</a>
          </li>
          <li @if($page->name == 'products')class="active"@endif>
            <a href="{{ route('product.categories') }}">Produtos</a>
          </li>
          <li @if($page->name == 'contact')class="active"@endif>
            <a href="{{ route('contact') }}">Contato</a>
          </li>
          <li class="active">
            <a href="{{ route('cart.list') }}" data-toggle="modal" data-target="#view-cart">
              <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Carrinho
              <span class="cart-item-count label label-danger">{{ !empty($cart) ? $cart->items()->count() : 0 }}</span>
            </a>
          </li>
        </ul>
      </div>
    </div><!--/.container-->
  </nav><!--/nav-->
</header><!--/header-->
