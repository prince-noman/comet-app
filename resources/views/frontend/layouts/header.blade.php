    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="container">
          <!-- Logo container-->
          <div class="logo">
            <a href="{{ route('home.page') }}">
              <img src="frontend/images/logo_light.png" alt="" class="logo-light">
              <img src="frontend/images/logo_dark.png" alt="" class="logo-dark">
            </a>
          </div>
          <!-- End Logo container-->
          <div class="menu-extras">
            {{-- <div class="menu-item"> --}}
              {{-- <!-- Shopping cart-->
              <div class="cart">
                <a href="#">
                  <i class="ti-bag"></i><span class="cart-number">2</span>
                </a>
                <div class="shopping-cart">
                  <div class="shopping-cart-info">
                    <div class="row">
                      <div class="col-xs-6">
                        <h6 class="upper">Your Cart</h6>
                      </div>
                      <div class="col-xs-6 text-right">
                        <h6 class="upper">$399.99</h6>
                      </div>
                    </div>
                    <!-- end of row-->
                  </div>
                  <ul class="nav product-list">
                    <li>
                      <div class="product-thumbnail">
                        <img src="frontend/images/shop/2.jpg" alt="">
                      </div>
                      <div class="product-summary">
                        <a href="#">Premium Suit Blazer</a><span>$199.99</span>
                      </div>
                    </li>
                    <li>
                      <div class="product-thumbnail">
                        <img src="frontend/images/shop/5.jpg" alt="">
                      </div>
                      <div class="product-summary">
                        <a href="#">Reiss Vara Tailored Blazer</a><span>$199.99</span>
                      </div>
                    </li>
                  </ul>
                  <p><a href="#" class="btn btn-color btn-block btn-sm">Checkout</a>
                  </p>
                </div>
              </div>
              <!-- End shopping cart--> --}}
            {{-- </div> --}}
            <div class="menu-item">
              <!-- Search Form-->
              <div class="search">
                <a href="#">
                  <i class="ti-search"></i>
                </a>
                <div class="search-form">
                  <form action="#" class="inline-form">
                    <div class="input-group">
                      <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn"><button type="button" class="btn btn-color"><span><i class="ti-search"></i></span>
                      </button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End search form-->
            </div>
            <div class="menu-item">
              <!-- Mobile menu toggle-->
              <a class="navbar-toggle">
                <div class="lines">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </a>
              <!-- End mobile menu toggle-->
            </div>
          </div>
          <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
              <li>
                <a href="{{ route('home.page') }}">Home</a>
                {{-- <ul class="submenu megamenu">
                  <li>
                    <ul>
                      <li>
                        <span>Multi Page</span>
                      </li>
                      <li>
                        <a href="index-2.html">Home Classic</a>
                      </li>
                      <li>
                        <a href="index-01.html">Video Background</a>
                      </li>
                      <li>
                        <a href="index-02.html">HTML5 Video BG</a>
                      </li>
                      <li>
                        <a href="index-03.html">Animated Zoom Slider</a>
                      </li>
                      <li>
                        <a href="index-04.html">Text Rotator</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <ul>
                      <li>
                        <span>One Page</span>
                      </li>
                      <li>
                        <a href="index-op.html">One Page Classic</a>
                      </li>
                      <li>
                        <a href="index-op-01.html">Video Background</a>
                      </li>
                      <li>
                        <a href="index-op-02.html">HTML5 Video BG</a>
                      </li>
                      <li>
                        <a href="index-op-03.html">Animated Zoom Slider</a>
                      </li>
                      <li>
                        <a href="index-op-04.html">Text Rotator</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <ul>
                      <li>
                        <span>Home Layouts</span>
                      </li>
                      <li>
                        <a href="home-restaurant.html">Restaurant</a>
                      </li>
                      <li>
                        <a href="home-architecture.html">Architecture</a>
                      </li>
                      <li>
                        <a href="home-photography.html">Photography</a>
                      </li>
                      <li>
                        <a href="home-landing.html">Landing Page</a>
                      </li>
                      <li>
                        <a href="home-resume.html">Resume</a>
                      </li>
                      <li>
                        <a href="home-models.html">Model Agency<span class="label">New</span></a>
                      </li>
                      <li>
                        <a href="home-fitness.html">Fitness<span class="label">New</span></a>
                      </li>
                    </ul>
                  </li>
                </ul> --}}
              </li>
              <li>
                <a href="#">About</a>
              </li>
              <li>
                <a href="#">Pricing</a>
              </li>
              <li>
                <a href="#">Team</a>
              </li>
              <li>
                <a href="#">Services</a>
              </li>
              <li>
                <a href="#">Contact</a>
              </li>
            </ul>
            <!-- End navigation menu        -->
          </div>
        </div>
      </header>
      <!-- End Navigation Bar-->