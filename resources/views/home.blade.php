@extends("layouts.main")
@section('contents')
  <section id="main-slider" class="no-margin">
      <div class="carousel slide">
          <ol class="carousel-indicators">
              <li data-target="#main-slider" data-slide-to="0" class="active"></li>
              <li data-target="#main-slider" data-slide-to="1"></li>
              <li data-target="#main-slider" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active" style="background-image: url(uploads/img/slider/bg3.jpg)"></div><!--/.item-->
            <div class="item" style="background-image: url(uploads/img/slider/bg2.jpg)"></div><!--/.item-->
            <div class="item" style="background-image: url(uploads/img/slider/bg1.jpg)"></div><!--/.item-->
          </div><!--/.carousel-inner-->
      </div><!--/.carousel-->
      <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
          <i class="fa fa-chevron-left"></i>
      </a>
      <a class="next hidden-xs" href="#main-slider" data-slide="next">
          <i class="fa fa-chevron-right"></i>
      </a>
  </section><!--/#main-slider-->

  <section id="feature">
      <div class="container">
         <div class="center wow fadeInDown">
              <h2>{{ $about->title }}</h2>
              <p class="lead">{{ $about->description }}</p>
          </div>
          <div class="row">
            @foreach($services as $service)
              <div class="features">
                  <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                      <div class="feature-wrap">
                          <i class="fa fa-{{ $service->icon }}"></i>
                          <h2>{{ $service->name }}</h2>
                          <h3>{{ $service->description }}</h3>
                      </div>
                  </div><!--/.col-md-4-->
                @endforeach
              </div><!--/.services-->
          </div><!--/.row-->
      </div><!--/.container-->
  </section><!--/#feature-->
@endsection
