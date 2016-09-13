@extends('layouts.main')

@section('contents')
  <section id="services" class="service-item">
    <div class="container">
      <div class="center wow fadeInDown">
        <h2>PRODUTOS</h2>
        <p class="lead"></p>
      </div>

      <div class="row">
        @foreach($categories as $category)
          <div class="col-sm-6 col-md-4">
            <div class="services-media media services-wrap wow fadeInDown" style="background-image: url({{ $category->image }});">
              <div class="media-body">
                <a href="{{ route('product.list', $category->id) }}">
                  <h3 class="media-heading">{{ $category->name }}</h3>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div><!--/.row-->
    </div><!--/.container-->
  </section><!--/#services-->
@endsection
