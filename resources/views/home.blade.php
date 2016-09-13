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

              <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                  <div class="container">
                      <div class="row slide-margin">
                          <div class="col-sm-6">
                              <div class="carousel-content">
                                  <h1 class="animation animated-item-1">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                                  <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                  <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div><!--/.item-->

              <div class="item" style="background-image: url(uploads/img/slider/bg2.jpg)">
                  <div class="container">
                      <div class="row slide-margin">
                          <div class="col-sm-6">
                              <div class="carousel-content">
                                  <h1 class="animation animated-item-1">Carne de vaca faz bem, coma</h1>
                                  <h2 class="animation animated-item-2">Porco faz mal, não coma !!!</h2>
                                  <a class="btn-slide animation animated-item-3" href="#">sadasdasdsa</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div><!--/.item-->

              <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                  <div class="container">
                      <div class="row slide-margin">
                          <div class="col-sm-6">
                              <div class="carousel-content">
                                  <h1 class="animation animated-item-1">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                                  <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                  <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div><!--/.item-->
          </div><!--/.carousel-inner-->
      </div><!--/.carousel-->
      <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
          <i class="fa fa-chevron-left"></i>
      </a>
      <a class="next hidden-xs" href="#main-slider" data-slide="next">
          <i class="fa fa-chevron-right"></i>
      </a>
  </section><!--/#main-slider-->
@endsection
