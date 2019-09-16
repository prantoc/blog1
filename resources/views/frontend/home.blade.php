@extends('layouts.frontend.home-design')
  @section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('assets/img/2.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">First Slide</h2>
            <p class="lead">This is a description for the first slide.</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('assets/img/3.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Second Slide</h2>
            <p class="lead">This is a description for the second slide.</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('assets/img/44.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Third Slide</h2>
            <p class="lead">This is a description for the third slide.</p>
          </div>
        </div> 
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('assets/img/2.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Four Slide</h2>
            <p class="lead">This is a description for the third slide.</p>
          </div>
        </div> 
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('assets/img/3.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Five Slide</h2>
            <p class="lead">This is a description for the third slide.</p>
          </div>
        </div>
         <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('assets/img/44.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Six Slide</h2>
            <p class="lead">This is a description for the third slide.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
      </a>
    </div>

  @endsection