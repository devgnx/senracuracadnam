@extends('layouts.main')

@section('content')


      <!-- Map -->
      <section id="mapa" class="map bg-yellow">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.9618549088686!2d-51.91311068534087!3d-23.425745062482495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDI1JzMyLjciUyA1McKwNTQnMzkuMyJX!5e0!3m2!1spt-BR!2sbr!4v1467844789854" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
      </section>



          <div class="container">
              <form class="front" action="{{ route('contact:send') }}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="name">Nome</label>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Rogério Dantas">
                  </div>
                  <div class="form-group">
                      <label for="email">Email</label>
                      <input name="email"type="email" class="form-control" id="email" placeholder="petergriffin1945@exemlo.com.br">
                  </div>
                  <div class="form-group">
                      <label for="message">Mensagem</label>
                      <textarea name="message" id="message" class="form-control" placeholder="Envie sua mensagem"></textarea>
                  </div>
                  <div class="container">
                      <div class="col-xs-12">
                          <button type="submit" class="btn btn-default pull-right">Enviar</button>
                      </div>
                  </div>
              </form>
@endsection
