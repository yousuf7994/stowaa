@extends('layouts.frontend')
@section('title', 'Shop')
@section('content')

  <!-- breadcrumb_section - start
                                                        ================================================== -->
  <div class="breadcrumb_section">
    <div class="container">
      <ul class="breadcrumb_nav ul_li">
        <li><a href="index-2.html">Home</a></li>
        <li>Product Details</li>
      </ul>
    </div>
  </div>
  <!-- breadcrumb_section - end
                                                        ================================================== -->

  <!-- product_details - start
                                                        ================================================== -->
  <section class="product_details section_space pb-0">
    <div class="container">
      <div class="row">
        <div class="col col-lg-6">
          <div class="product_details_image">
            <div class="details_image_carousel">
              @foreach ($product->galleries as $gallery)
                <div class="slider_item">
                  <img src="{{ asset('storage/product/' . $gallery->image) }}" alt={{ $product->title }} />
                </div>
              @endforeach

            </div>

            <div class="details_image_carousel_nav">
              @foreach ($product->galleries as $gallery)
                <div class="slider_item">
                  <img src="{{ asset('storage/product/' . $gallery->image) }}" alt={{ $product->title }} />
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="product_details_content">

            <h2 class="item_title">{{ $product->title }}</h2>
            <p>{{ $product->short_description }}</p>
            <div class="item_review">
              <ul class="rating_star ul_li">
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star-half-alt"></i></li>
              </ul>
              <span class="review_value">3 Rating(s)</span>
            </div>

            <div class="item_price">
              <span>
                @if ($product->currency == 'usd' || 'USD')
                  $
                @else
                  Tk
                @endif
                @if ($product->sale_price)
                  {{ $product->sale_price }}
                @else
                  {{ $product->price }}
                @endif
              </span>
              <del>
                @if ($product->sale_price)
                  @if ($product->currency == 'usd' || 'USD')
                    $
                  @else
                    Tk
                  @endif
                  {{ $product->sale_price }}
                @else
                  {{ $product->price }}
                @endif
              </del>
            </div>
            <hr>

            <div class="item_attribute">
              <h3 class="title_text">Options <span class="underline"></span></h3>
              <form action="#">
                <input type="hidden" value="{{ $product->id }}" class="product_id">
                <div class="row">
                  <div class="col col-md-6">
                    <div class="select_option clearfix">
                      <h4 class="input_title">Size *</h4>
                      <select class=" form-select size_select">
                        <option data-display="- Please select -">Choose A Option</option>
                        @foreach ($sizeOf as $inventory)
                          <option value="{{ $inventory->size->id }}">{{ $inventory->size->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col col-md-6">
                    <div class="select_option clearfix">
                      <h4 class="input_title">Color *</h4>
                      <select class=" form-select color_select">
                        {{-- <option data-display="- Please select -">Choose a Option</option> --}}
                      </select>
                    </div>
                  </div>
                </div>
                <span class="repuired_text">Stock Limit <span id="stock_p"></span></span>
              </form>
            </div>

            <form action="{{ route('frontend.cart.store') }}" method="POST">
              @csrf
              <div class="quantity_wrap">
                <input type="hidden" name="inventory_id" id="inventory_id">
                <input type="hidden" name="sub_total" id="sub_total"
                  value="
                @if ($product->sale_price) {{ $product->sale_price }}
                @else
                    {{ $product->price }} @endif
                ">
                {{-- <input type="hidden" name="total" id="total"> --}}
                <div class="quantity_input">
                  <button type="button" class="input_number_decrement">
                    <i class="fal fa-minus"></i>
                  </button>
                  <input class="input_number" name="quantity" type="text" value="1">
                  <button type="button" class="input_number_increment">
                    <i class="fal fa-plus"></i>
                  </button>
                </div>


                <div class="total_price">Total: $ <span class="total_price_in">
                    @if ($product->sale_price)
                      {{ $product->sale_price }}
                    @else
                      {{ $product->price }}
                    @endif
                  </span></div>
              </div>

              <ul class="default_btns_group ul_li">
                <li><button type="submit" class="btn btn_primary addtocart_btn">Add To Cart</button></li>
                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                <li><a href="#!"><i class="fas fa-heart"></i></a></li>
              </ul>
            </form>

            <ul class="default_share_links ul_li">
              <li>
                <a class="facebook" href="#!">
                  <span><i class="fab fa-facebook-square"></i> Like</span>
                  <small>10K</small>
                </a>
              </li>
              <li>
                <a class="twitter" href="#!">
                  <span><i class="fab fa-twitter-square"></i> Tweet</span>
                  <small>15K</small>
                </a>
              </li>
              <li>
                <a class="google" href="#!">
                  <span><i class="fab fa-google-plus-square"></i> Google+</span>
                  <small>20K</small>
                </a>
              </li>
              <li>
                <a class="share" href="#!">
                  <span><i class="fas fa-plus-square"></i> Share</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="details_information_tab">
        <ul class="tabs_nav nav ul_li" role=tablist>
          <li>
            <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button" role="tab"
              aria-controls="description_tab" aria-selected="true">
              Description
            </button>
          </li>
          <li>
            <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button" role="tab"
              aria-controls="additional_information_tab" aria-selected="false">
              Additional information
            </button>
          </li>
          <li>
            <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab"
              aria-controls="reviews_tab" aria-selected="false">
              Reviews(2)
            </button>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor.
              Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi,
              vulputate adipiscing cursus eu, suscipit id nulla.</p>
            <p class="mb-0">
              Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget
              velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate,
              sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur
              adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio
              quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in
              imperdiet ligula euismod eget.
            </p>
          </div>

          <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
            <p>
              Return into stiff sections the bedding was hardly able to cover it and seemed ready to slide off any moment.
              His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked
              what's happened to me he thought It wasn't a dream. His room, a proper human room although a little too
              small
            </p>

            <div class="additional_info_list">
              <h4 class="info_title">Additional Info</h4>
              <ul class="ul_li_block">
                <li>No Side Effects</li>
                <li>Made in USA</li>
              </ul>
            </div>

            <div class="additional_info_list">
              <h4 class="info_title">Product Features Info</h4>
              <ul class="ul_li_block">
                <li>Compatible for indoor and outdoor use</li>
                <li>Wide polypropylene shell seat for unrivalled comfort</li>
                <li>Rust-resistant frame</li>
                <li>Durable UV and weather-resistant construction</li>
                <li>Shell seat features water draining recess</li>
                <li>Shell and base are stackable for transport</li>
                <li>Choice of monochrome finishes and colourways</li>
                <li>Designed by Nagi</li>
              </ul>
            </div>
          </div>

          <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
            <div class="average_area">
              <h4 class="reviews_tab_title">Average Ratings</h4>
              <div class="row align-items-center">
                <div class="col-md-5 order-last">
                  <div class="average_rating_text">
                    <ul class="rating_star ul_li_center">
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star-half-alt"></i></li>
                    </ul>
                    <p class="mb-0">
                      Average Star Rating: <span>4.3 out of 5</span> (2 vote)
                    </p>
                  </div>
                </div>

                <div class="col-md-7">
                  <div class="product_ratings_progressbar">
                    <ul class="five_star ul_li">
                      <li><span>5 Star</span></li>
                      <li>
                        <div class="progress_bar"></div>
                      </li>
                      <li>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </li>
                    </ul>
                    <ul class="four_star ul_li">
                      <li><span>4 Star</span></li>
                      <li>
                        <div class="progress_bar"></div>
                      </li>
                      <li>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                      </li>
                    </ul>
                    <ul class="three_star ul_li">
                      <li><span>3 Star</span></li>
                      <li>
                        <div class="progress_bar"></div>
                      </li>
                      <li>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                      </li>
                    </ul>
                    <ul class="two_star ul_li">
                      <li><span>2 Star</span></li>
                      <li>
                        <div class="progress_bar"></div>
                      </li>
                      <li>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                      </li>
                    </ul>
                    <ul class="one_star ul_li">
                      <li><span>1 Star</span></li>
                      <li>
                        <div class="progress_bar"></div>
                      </li>
                      <li>
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="customer_reviews">
              <h4 class="reviews_tab_title">2 reviews for this product</h4>
              <div class="customer_review_item clearfix">
                <div class="customer_image">
                  <img src="assets/images/team/team_1.jpg" alt="image_not_found">
                </div>
                <div class="customer_content">
                  <div class="customer_info">
                    <ul class="rating_star ul_li">
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star-half-alt"></i></li>
                    </ul>
                    <h4 class="customer_name">Aonathor troet</h4>
                    <span class="comment_date">JUNE 2, 2021</span>
                  </div>
                  <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                </div>
              </div>

              <div class="customer_review_item clearfix">
                <div class="customer_image">
                  <img src="assets/images/team/team_2.jpg" alt="image_not_found">
                </div>
                <div class="customer_content">
                  <div class="customer_info">
                    <ul class="rating_star ul_li">
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star-half-alt"></i></li>
                    </ul>
                    <h4 class="customer_name">Danial obrain</h4>
                    <span class="comment_date">JUNE 2, 2021</span>
                  </div>
                  <p class="mb-0">
                    Great product quality, Great Design and Great Service.
                  </p>
                </div>
              </div>
            </div>

            @if (Auth::check() && in_array($product->id,$user_order_check) )
              <div class="customer_review_form">
                <h4 class="reviews_tab_title">Add a review</h4>
                <p>
                  Your email address will not be published. Required fields are marked *
                </p>
                <div class="checkbox_item">
                  <input id="save_checkbox" type="checkbox">
                  <label for="save_checkbox">Save my name, email, and website in this browser for the next time I
                    comment.</label>
                </div>
                <form action="#" method="POST">
                  @csrf
                  <div class="your_ratings">
                    <h5>Your Ratings:</h5>


                    <div class='rating-widget'>
                      <!-- Rating Stars Box -->
                      <div class='rating-stars text-center'>
                        <ul id='stars'>
                          <li class='star' title='Poor' data-value='1'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                          <li class='star' title='Fair' data-value='2'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                          <li class='star' title='Good' data-value='3'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                          <li class='star' title='Excellent' data-value='4'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                          <li class='star' title='WOW!!!' data-value='5'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                        </ul>
                      </div>
                      <div class='success-box'>
                        <div class='clearfix'></div>
                        <div class='text-message'></div>
                      </div>
                    </div>
                  </div>
                  <div class="form_item">
                    <input type="hidden" name="rating_stars" id="rating_stars">
                    <textarea name="comment" placeholder="Your Review*"></textarea>
                  </div>
                  <button type="submit" class="btn btn_primary">Submit Now</button>
                </form>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- product_details - end -->

  <!-- related_products_section - start -->
  <section class="related_products_section section_space">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="best-selling-products related-product-area">
            <div class="sec-title-link">
              <h3>Related products</h3>
              <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
            </div>
            <div class="product-area clearfix">
              <div class="grid">
                <div class="product-pic">
                  <img src="assets/images/shop/product_img_12.png" alt>
                  <div class="actions">
                    <ul>
                      <li>
                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px"
                            height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1"
                            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6">
                            <title>Favourite</title>
                            <path
                              d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z" />
                          </svg></a>
                      </li>
                      <li>
                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px"
                            height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1"
                            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6">
                            <title>Shuffle</title>
                            <path
                              d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7" />
                            <path
                              d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17" />
                            <path d="M19 4L22 7L19 10" />
                            <path d="M19 13L22 16L19 19" />
                          </svg></a>
                      </li>
                      <li>
                        <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button"
                          tabindex="0"><svg width="48px" height="48px" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1"
                            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6">
                            <title>Visible (eye)</title>
                            <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                            <circle cx="12" cy="12" r="3" />
                          </svg></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="details">
                  <h4><a href="#">Macbook Pro</a></h4>
                  <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                  <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">$</span>471.48
                        </bdi>
                      </span>
                    </ins>
                  </span>
                  <div class="add-cart-area">
                    <button class="add-to-cart">Add to cart</button>
                  </div>
                </div>
              </div>
              <div class="grid">
                <div class="product-pic">
                  <img src="assets/images/shop/product-img-21.png" alt>
                  <span class="theme-badge">Sale</span>
                  <div class="actions">
                    <ul>
                      <li>
                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px"
                            height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1"
                            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6">
                            <title>Favourite</title>
                            <path
                              d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z" />
                          </svg></a>
                      </li>
                      <li>
                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px"
                            height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1"
                            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6">
                            <title>Shuffle</title>
                            <path
                              d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7" />
                            <path
                              d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17" />
                            <path d="M19 4L22 7L19 10" />
                            <path d="M19 13L22 16L19 19" />
                          </svg></a>
                      </li>
                      <li>
                        <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button"
                          tabindex="0"><svg width="48px" height="48px" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1"
                            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6">
                            <title>Visible (eye)</title>
                            <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                            <circle cx="12" cy="12" r="3" />
                          </svg></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="details">
                  <h4><a href="#">Apple Watch</a></h4>
                  <p><a href="#">Apple Watch Series 7 case Pair any band </a></p>
                  <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">$</span>471.48
                        </bdi>
                      </span>
                    </ins>
                  </span>
                  <div class="add-cart-area">
                    <button class="add-to-cart">Add to cart</button>
                  </div>
                </div>
              </div>
              <div class="grid">
                <div class="product-pic">
                  <img src="assets/images/shop/product-img-22.png" alt>
                  <span class="theme-badge-2">12% off</span>
                  <div class="actions">
                    <ul>
                      <li>
                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px"
                            height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1"
                            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6">
                            <title>Favourite</title>
                            <path
                              d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z" />
                          </svg></a>
                      </li>
                      <li>
                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px"
                            height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1"
                            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6">
                            <title>Shuffle</title>
                            <path
                              d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7" />
                            <path
                              d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17" />
                            <path d="M19 4L22 7L19 10" />
                            <path d="M19 13L22 16L19 19" />
                          </svg></a>
                      </li>
                      <li>
                        <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button"
                          tabindex="0"><svg width="48px" height="48px" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1"
                            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6">
                            <title>Visible (eye)</title>
                            <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                            <circle cx="12" cy="12" r="3" />
                          </svg></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="details">
                  <h4><a href="#">Mac Mini</a></h4>
                  <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                  <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">$</span>471.48
                        </bdi>
                      </span>
                    </ins>
                    <del aria-hidden="true">
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">$</span>904.21
                        </bdi>
                      </span>
                    </del>
                  </span>
                  <div class="add-cart-area">
                    <button class="add-to-cart">Add to cart</button>
                  </div>
                </div>
              </div>
              <div class="grid">
                <div class="product-pic">
                  <img src="assets/images/shop/product-img-23.png" alt>
                  <span class="theme-badge">Sale</span>
                  <div class="actions">
                    <ul>
                      <li>
                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px"
                            height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1"
                            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6">
                            <title>Favourite</title>
                            <path
                              d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z" />
                          </svg></a>
                      </li>
                      <li>
                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px"
                            height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1"
                            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6">
                            <title>Shuffle</title>
                            <path
                              d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7" />
                            <path
                              d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17" />
                            <path d="M19 4L22 7L19 10" />
                            <path d="M19 13L22 16L19 19" />
                          </svg></a>
                      </li>
                      <li>
                        <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button"
                          tabindex="0"><svg width="48px" height="48px" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1"
                            stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6">
                            <title>Visible (eye)</title>
                            <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                            <circle cx="12" cy="12" r="3" />
                          </svg></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="details">
                  <h4><a href="#">iPad mini</a></h4>
                  <p><a href="#">The ultimate iPad experience all over the world </a></p>
                  <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                  </div>
                  <span class="price">
                    <ins>
                      <span class="woocommerce-Price-amount amount">
                        <bdi>
                          <span class="woocommerce-Price-currencySymbol">$</span>471.48
                        </bdi>
                      </span>
                    </ins>
                  </span>
                  <div class="add-cart-area">
                    <button class="add-to-cart">Add to cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- related_products_section - end -->
@endsection
@section('style')
  <style>
    .success-box {
      border: 1px solid #eee;
      background: #f9f9f9;
      display: none;
    }

    .success-box>div {
      vertical-align: top;
      display: inline-block;
      color: #888;
    }



    /* Rating Star Widgets Style */
    .rating-stars ul {
      list-style-type: none;
      padding: 0;

      -moz-user-select: none;
      -webkit-user-select: none;
    }

    .rating-stars ul>li.star {
      display: inline-block;

    }

    /* Idle State of the stars */
    .rating-stars ul>li.star>i.fa {
      font-size: 2.5em;
      /* Change the size of the stars */
      color: #ccc;
      /* Color on idle state */
    }

    /* Hover state of the stars */
    .rating-stars ul>li.star.hover>i.fa {
      color: #cd1212;
    }

    /* Selected state of the stars */
    .rating-stars ul>li.star.selected>i.fa {
      color: #cd1212;
    }
  </style>
@endsection
@section('script')
  <script>
    //ajax
    $(function() {
      var stock_limit = $('#stock_p');
      var input_number = $('.input_number');
      var inc = parseInt(input_number.val());
      var sale_price = $('.item_price');
      var total_price = $('.total_price_in');
      var inventory_id = $('#inventory_id');
      var total = $('#total');
      var sub_total = $('#sub_total');

      var original_price = {{ $product->sale_price ?? $product->price }};

      $('.input_number_increment').on('click', function() {
        if (inc < parseInt(stock_limit.html())) {
          inc++;
        }
        input_number.val(inc);
        var floatNum = parseFloat(sale_price.html() * inc).toFixed(2);
        total_price.html(floatNum);
        sub_total.val(floatNum);
        total.val(floatNum);
      })
      $('.input_number_decrement').on('click', function() {
        if (inc > 1) {
          inc--;
        }
        input_number.val(inc);
        var floatNum = parseFloat(sale_price.html() * inc).toFixed(2);
        total_price.html(floatNum);
        sub_total.val(floatNum);
        total.val(floatNum);
      });


      $('.size_select').on('change', function() {

        var size_id = $('.size_select').val();
        var product_id = $('.product_id').val();
        $.ajax({
          url: "{{ route('frontend.shop.color') }}",
          type: 'POST',
          data: {
            size_id: size_id,
            product_id: product_id,
            _token: '{{ csrf_token() }}',
          },

          datatype: 'json',
          success: function(data) {
            $('.color_select').html(data);
          }
        });
        total_price.html(original_price);
      });
      $('.color_select').on('change', function() {

        var size_id = $('.size_select').val();
        var color_id = $('.color_select').val();
        var product_id = $('.product_id').val();
        $.ajax({
          url: "{{ route('frontend.shop.color.size.select') }}",
          type: 'POST',
          data: {
            size_id: size_id,
            color_id: color_id,
            product_id: product_id,
            _token: '{{ csrf_token() }}',
          },

          datatype: 'json',
          success: function(data) {
            //console.log(data);
            stock_limit.html(data['quantity']);
            sale_price.html(data['original_price']);
            total_price.html(data['original_price']);
            inventory_id.val(data['id']);
          }
        });
      });

      /* rating part */
      $(document).ready(function() {

        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function() {
          var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

          // Now highlight all the stars that's not after the current hovered star
          $(this).parent().children('li.star').each(function(e) {
            if (e < onStar) {
              $(this).addClass('hover');
            } else {
              $(this).removeClass('hover');
            }
          });

        }).on('mouseout', function() {
          $(this).parent().children('li.star').each(function(e) {
            $(this).removeClass('hover');
          });
        });


        /* 2. Action to perform on click */
        $('#stars li').on('click', function() {
          var onStar = parseInt($(this).data('value'), 10); // The star currently selected
          var stars = $(this).parent().children('li.star');

          for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
          }

          for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
          }

          // JUST RESPONSE (Not needed)
          var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
          $('#rating_stars').val(ratingValue);
          var msg = "";
          if (ratingValue > 1) {
            msg = "Thanks! You rated this " + ratingValue + " stars.";
          } else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " star.";
          }
          responseMessage(msg);

        });


      });


      function responseMessage(msg) {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
      }
    });
  </script>
@endsection
