@extends('frontend.layouts.app')

@section('frontend-main')

<section class="page-title parallax">
    <div data-parallax="scroll" data-image-src="{{ url('frontend/images/bg/11.jpg') }}" class="parallax-bg"></div>
    <div class="parallax-overlay">
      <div class="centrize">
        <div class="v-center">
          <div class="container">
            <div class="title center">
              <h1 class="upper">Contact US<span class="red-dot"></span></h1>
              <h4>Let’s get in touch.</h4>
              <hr>
            </div>
          </div>
          <!-- end of container-->
        </div>
      </div>
    </div>
  </section>



  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="counter">
            <div class="counter-icon"><i class="icon-presentation"></i>
            </div>
            <div class="counter-content">
              <h5><span data-count="212" class="number-count">212</span><span class="red-dot"></span></h5><span>Projects</span>
            </div>
          </div>
          <!-- end of counter              -->
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="counter">
            <div class="counter-icon"><i class="icon-beaker"></i>
            </div>
            <div class="counter-content">
              <h5> <span data-count="9060" class="number-count">9060</span><span class="red-dot"></span></h5><span>Lines of Code</span>
            </div>
          </div>
          <!-- end of counter              -->
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="counter">
            <div class="counter-icon"><i class="icon-hourglass"></i>
            </div>
            <div class="counter-content">
              <h5><span data-count="75" class="number-count">75</span><span class="red-dot"></span></h5><span>Clients</span>
            </div>
          </div>
          <!-- end of counter              -->
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="counter">
            <div class="counter-icon"><i class="icon-chat"></i>
            </div>
            <div class="counter-content">
              <h5><span data-count="872" class="number-count">872</span><span class="red-dot"></span></h5><span>Tweets</span>
            </div>
          </div>
          <!-- end of counter              -->
        </div>
      </div>
    </div>
  </section>
    
@endsection