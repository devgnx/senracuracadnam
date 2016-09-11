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
                <a class="open-add-to-cart" data-toggle="modal" data-target="#add-to-cart" href="javascript:void(0)">
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

  <div class="modal fade" id="add-to-cart" tabindex="-1" role="dialog" aria-labelledby="add-to-cart-label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="add-to-cart-label">Adicionar ao Carrinho</h4>
        </div>
        <div class="modal-body">
        ...
        </div>
        <div class="modal-footer">
          <button type="button" class="pull-left btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-success">Adicionar</button>
        </div>
      </div>
    </div>
  </div>
@endsection
