@extends('layouts.main')

@section('contents')
  <section id="contact-info">
    <div class="center">
      <h2>Encontre-nos</h2>
      <p class="lead"></p>
    </div>
    <div class="gmap-area">
      <div class="container">
        <div class="row">
          <div class="col-sm-5 text-center">
            <div class="gmap">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8709.546997194784!2d-51.962044754885106!3d-23.391349057572594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ecd6a2cd274c55%3A0x4dd663696269531!2sMandacaru+carnes!5e0!3m2!1sen!2sbr!4v1477700503949" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-sm-7 map-content">
            <ul class="row">
              <li class="col-sm-6">
                <address>
                  <h5>{{ $contact->name }}</h5>
                  <p>{{ $contact->address }} <br>
                     {{ $contact->postal_code }}</p>
                  <p>Telefone: {{ $contact->telephone }} <br>
                  Email: {{ $contact->email }}</p>
                </address>
              </li>
            </ul>
          </div>
        </div>
        <hr>
        <form class="front" action="{{ route('contact.send') }}" method="post">
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
              <button type="submit" class="btn btn-danger pull-right">Enviar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
