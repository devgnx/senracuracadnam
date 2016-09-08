@extends('layouts.main')

@section('contents')
    <section id="services" class="service-item">
       <div class="container">
            <div class="center wow fadeInDown">
                <h2>CARNES</h2>
                <p class="lead"></p>
            </div>

            <div class="row">
              @foreach($category->products as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div>
                            <a href="{{ route("product.index", $product->id) }}">
                                <img class="img-responsive" src="{{ $product->image }}">
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="{{ route("product.index", $product->id) }}">
                              <h3 class="media-heading">{{ $product->name }}</h3>
                                <p>{{ $product->price }}</p>
                            </a>
                        </div>
                    </div>
                </div>
              @endforeach
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->
@endsection
