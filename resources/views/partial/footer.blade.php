<footer id="footer" class="midnight-blue">
  <div class="container">
    <div class="row" style="font-size: 0;">
      <div class="col-sm-6 col-md-8" style="padding-left: 30px; text-align: left; font-size: 14px; float: none; display: inline-block; vertical-align: middle;">
        &copy; {{ Carbon\Carbon::now()->year }} <a href="{{ route('home') }}" title="Mandacaru Carnes">Mandacaru Carnes</a>.<br>
        {{ $contact->address }}, {{ $contact->city }}, {{ $contact->state }}, <span style="white-space: nowrap;">{{ $contact->postal_code }}</span>
        <br>
        <br>
      </div>
      <div class="col-sm-6 col-md-4" style="font-size: 14px; float: none; display: inline-block; vertical-align: middle;">
        <ul class="pull-right">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('product.categories') }}">Produtos</a></li>
          <li><a href="{{ route('contact') }}">Contato</a></li>
          <li><a href="{{ route('cart.list') }}" data-toggle="modal" data-target="#view-cart">Carrinho</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer><!--/#footer-->
