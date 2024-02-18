@extends('layout.master')

@section('dynamic_content')


<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
  <div class="container">
    <div class="row gy-4 d-flex justify-content-between">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h2 data-aos="fade-up" style="text-align: left">Discover research</h2>
        <p data-aos="fade-up" data-aos-delay="100" style="text-align: left">Access over 1 million publication pages and stay up to date with what's happening in your field.</p>

        <form action="{{ url('search') }}" type="get" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
          <input type="search" id="search" class="form-control" name="query" placeholder="Search publications">
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
      </div>

      <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
        <img src="assets/img/analysis.png" class="img-fluid mb-3 mb-lg-0" alt="">
      </div>

    </div>
  </div>
</section><!-- End Hero Section -->

<main id="main">

  <!-- ======= Featured Services Section ======= -->
  <section id="featured-services" class="featured-services">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
          <div class="icon flex-shrink-0"><i class="fa-solid fa-microscope"></i></div>
          <div>
            <h4 class="title" style="text-align: left">Scientific Research</h4>
            <p class="description">Access to 100+ scientific research for free</p>
            <a href="/home-search" class="readmore stretched-link"><span>Click here</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        <!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
          <div class="icon flex-shrink-0"><i class="fa-solid fa-seedling"></i></div>
          <div>
            <h4 class="title" style="text-align: left">Climate Change</h4>
            <p class="description">Access directly to climate change page</p>
            <a href="/home-search" class="readmore stretched-link"><span>Click here</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <div class="icon flex-shrink-0"><i class="fa-solid fa-flask"></i></div>
          <div>
            <h4 class="title" style="text-align: left">Engineering</h4>
            <p class="description">Access our 50+ free resource</p>
            <a href="/home-search" class="readmore stretched-link"><span>Click here</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

      </div>

    </div>
  </section><!-- End Featured Services Section -->

  <!-- ======= About Us Section ======= -->
  <section id="about" class="about pt-0">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">
        <div class="about content">
          <h3>About Us</h3>
          <p>
            We are a small start up team named Share2YorGate who have a vision to create a plateform that provide our users to access to millions of research without charging any cents from you.
            Discover scientific knowledge and stay connected to the world of science.
          </p>
        </div>
      </div>
    </div>
  </section><!-- End About Us Section -->

  <!-- ======= Discover Action Section ======= -->
  <section id="call-to-action" class="call-to-action">
    <div class="container" data-aos="zoom-out">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h3>Try today</h3>
          <p>Access to our 1 million+ researchs for free</p><br>
          <a class="cta-btn" href="/signup-option">Join with us</a>
        </div>
      </div>

    </div>
  </section><!-- End Call To Action Section -->


</main><!-- End #main -->

@endsection
