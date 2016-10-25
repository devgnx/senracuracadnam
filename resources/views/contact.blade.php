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
              <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=JoomShaper,+Dhaka,+Dhaka+Division,+Bangladesh&amp;aq=0&amp;oq=joomshaper&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,80.332031&amp;ie=UTF8&amp;hq=JoomShaper,&amp;hnear=Dhaka,+Dhaka+Division,+Bangladesh&amp;ll=23.73854,90.385504&amp;spn=0.001515,0.002452&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1073661719450182870&amp;output=embed"></iframe>
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
