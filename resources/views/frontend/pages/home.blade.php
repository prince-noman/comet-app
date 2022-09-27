@extends('frontend.layouts.app')

@section('frontend-main')

    <!-- Home Section-->
    <section id="home">
        <!-- Home Slider-->
        <div id="home-slider" class="flexslider">
          <ul class="slides">

            {{-- @php
              $sliders = App\Models\Slider::latest()->get();
            @endphp --}}
            @foreach ($sliders as $slider)
            <li>
              <img src="{{ url('storage/sliders/'.$slider->photo) }}" alt="">
              <div class="slide-wrap">
                <div class="slide-content">
                  <div class="container">
                    <h1>{{ $slider->title }}<span class="red-dot"></span></h1>
                    <h6>{{ $slider->subtitle }}</h6>
                    <p>
                      @foreach (json_decode($slider->btns) as $btn)
                      <a href="{{ $btn->btn_link }}" class="btn {{ $btn->btn_type }}">{{ $btn->btn_title }}</a>
                      @endforeach
                      
                      
                    </p>
                  </div>
                </div>
              </div>
            </li>
            @endforeach
            

          </ul>
        </div>
        <!-- End Home Slider-->
    </section>
    <!-- End Home Section-->

    @include('frontend.sections.title')
    @include('frontend.sections.expertise')
    @include('frontend.sections.vision')
    @include('frontend.sections.portfolio')
    @include('frontend.sections.clients')
    @include('frontend.sections.testimonial')
    @include('frontend.sections.blog')
    
@endsection