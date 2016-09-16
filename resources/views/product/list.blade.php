@extends('layouts.main')

@section('contents')
  <section id="services" class="service-item">
    <div class="container">
      <div class="center wow fadeInDown">
        <h2>{{ $category->name }}</h2>
        <p class="lead"></p>
      </div>

      <div class="row">
        @foreach($category->products as $product)
          <div class="col-sm-6 col-md-4">
            <div class="media services-wrap wow fadeInDown">
              <div>
                <a href="#">
                  <img class="img-responsive" src="{{ $product->image }}">
                </a>
              </div>
              <div class="media-body">
                <h3 class="media-heading">{{ $product->name }}</h3>
                <p>{{ $product->price }}</p>
                <div class="text-center">
                  <a class="open-add-to-cart btn btn-primary btn-lg"
                     data-href="{{ route('cart.form') }}"
                     data-id="{{ $product->id }}"
                     data-price="{{ $product->price }}"
                     data-toggle="modal"
                     data-target="#add-to-cart">
                    Adicionar ao Pedido
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div><!--/.row-->
    </div><!--/.container-->
  </section><!--/#services-->
@endsection
