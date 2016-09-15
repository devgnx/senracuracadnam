<footer id="footer" class="midnight-blue">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        &copy; {{ Carbon\Carbon::now()->year }} <a href="{{ route('home') }}" title="Mandacaru Carnes">Mandacaru Carnes</a>.
      </div>
      <div class="col-sm-6">
        <ul class="pull-right">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('product.categories') }}">Produtos</a></li>
          <li><a href="{{ route('contact') }}">Contato</a></li>
          <li><a href="{{ route('cart.list') }}" onclick="return false;">Carrinho</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer><!--/#footer-->
