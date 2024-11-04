@extends('layouts.frontend')
@section('title', 'Checkout')
@section('content')
  <!-- breadcrumb_section - start
                                          ================================================== -->
  <div class="breadcrumb_section">
    <div class="container">
      <ul class="breadcrumb_nav ul_li">
        <li><a href="index-2.html">Home</a></li>
        <li>Check Out</li>
      </ul>
    </div>
  </div>
  <!-- breadcrumb_section - end
                                          ================================================== -->


  <!-- checkout-section - start
                                          ================================================== -->
  <section class="checkout-section section_space">
    <div class="container">
      <div class="row">
        <div class="col col-xs-12">
          <div class="woocommerce">
            <div class="woocommerce-info">Have a coupon? <a href="#" class="showcoupon">Click here to enter your
                code</a></div>
            <form action="{{ url('/pay') }}" method="POST" class="checkout woocommerce-checkout needs-validation"
              enctype="multipart/form-data">
              @csrf
              <div class="col2-set" id="customer_details">
                <div class="coll-1">
                  <div class="woocommerce-billing-fields">
                    <h3>Billing Details</h3>
                    <p class="form-row form-row form-row-wide validate-required" id="billing_first_name_field">
                      <label for="billing_name" class="">Name <abbr class="required"
                          title="required">*</abbr></label>
                      <input type="text" class="input-text " name="billing_name" id="billing_name"
                        placeholder="Full Name" autocomplete="given-name" value="{{ auth()->user()->name }}" />
                    </p>
                    <div class="clear"></div>
                    <p class="form-row form-row form-row-first validate-required validate-email" id="billing_email_field">
                      <label for="billing_email" class="">Email<abbr class="required"
                          title="required">*</abbr></label>
                      <input type="email" class="input-text " name="billing_email" id="billing_email" placeholder=""
                        autocomplete="email" value="{{ auth()->user()->email }}" />
                    </p>
                    <p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone">
                      <label for="billing_phone" class="">Phone <abbr class="required"
                          title="required">*</abbr></label>
                      <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder=""
                        autocomplete="tel" value="{{ auth()->user()->user_info->phone ?? '' }}" />
                    </p>
                    <div class="clear"></div>
                    <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1">
                      <label for="billing_address_1" class="">Address <abbr class="required"
                          title="required">*</abbr></label>
                      <input type="text" class="input-text " name="billing_address_1" id="billing_address_1"
                        placeholder="Apartment,Street,Colony,Region" autocomplete="address-line1"
                        value="{{ auth()->user()->user_info->address ?? '' }}" />
                    </p>
                    <p class="form-row form-row address-field validate-postcode validate-required form-row-first  woocommerce-invalid-required-field"
                      id="billing_city">
                      <label for="billing_city" class="">City <abbr class="required"
                          title="required">*</abbr></label>
                      <input type="text" class="input-text " name="billing_city" id="billing_city"
                        placeholder="Enter Your City" autocomplete="address-level2"
                        value="{{ auth()->user()->user_info->city ?? '' }}" />
                    </p>
                    <p class="form-row form-row form-row-last address-field validate-required validate-postcode"
                      id="billing_postcode">
                      <label for="billing_postcode" class="">Postcode / ZIP <abbr class="required"
                          title="required">*</abbr></label>
                      <input type="text" class="input-text " name="billing_postcode" id="billing_postcode"
                        placeholder="" autocomplete="postal-code" value="{{ auth()->user()->user_info->zip ?? '' }}" />
                    </p>

                    <p class="form-row form-row notes" id="billing_notes">
                      <label for="billing_notes" class="">Order Notes</label>
                      <textarea class="input-text" name="billing_notes" id="billing_notes"
                        placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5">{{ auth()->user()->user_info->notes ?? '' }}</textarea>
                    </p>
                  </div>
                </div>
                <div class="coll-2">
                  <div class="woocommerce-shipping-fields">
                    <h3 id="ship-to-different-address">
                      <label class="checkbox" data-bs-toggle="collapse" data-bs-target="#display_shipping_address">Ship
                        to a different
                        address?
                        <input id="ship-to-different-address-checkbox" class="input-checkbox" type="checkbox"
                          name="ship_to_different_address" value="1" />
                      </label>
                    </h3>
                    <div class="shipping_address collapse" id="display_shipping_address">

                      <div class="clear"></div>
                      <p class="form-row form-row form-row-wide validate-required" id="shipping_first_name_field">
                        <label for="shipping_first_name" class="">Name <abbr class="required"
                            title="required">*</abbr></label>
                        <input type="text" class="input-text " name="shipping_name" id="shipping_first_name"
                          placeholder="Full Name" autocomplete="given-name" value="" />
                      </p>
                      <p class="form-row form-row form-row-last validate-required validate-phone"
                        id="shipping_phone_field">
                        <label for="shipping_phone" class="">Phone <abbr class="required"
                            title="required">*</abbr></label>
                        <input type="tel" class="input-text " name="shipping_phone" id="shipping_phone"
                          placeholder="Phone" autocomplete="tel" value="" />
                      </p>
                      <div class="clear"></div>
                      <p class="form-row form-row form-row-wide address-field validate-required"
                        id="shipping_address_1_field">
                        <label for="shipping_address_1" class="">Address <abbr class="required"
                            title="required">*</abbr></label>
                        <input type="text" class="input-text " name="shipping_address" id="shipping_address_1"
                          placeholder="Apartment,Street,Colony,Region" autocomplete="address-line1" value="" />
                      </p>
                      <p class="form-row form-row address-field validate-postcode validate-required form-row-first  woocommerce-invalid-required-field"
                        id="shipping_city_field2">
                        <label for="shipping_city" class="">Town / City <abbr class="required"
                            title="required">*</abbr></label>
                        <input type="text" class="input-text " name="shipping_city" id="shipping_city"
                          placeholder="" autocomplete="address-level2" value="" />
                      </p>
                      <p class="form-row form-row form-row-last address-field validate-required validate-postcode"
                        id="shipping_postcode">
                        <label for="shipping_postcode" class="">Postcode / ZIP <abbr class="required"
                            title="required">*</abbr></label>
                        <input type="text" class="input-text " name="shipping_postcode" id="shipping_postcode"
                          placeholder="" autocomplete="postal-code" value="" />
                      </p>
                      <div class="clear"></div>
                      <p class="form-row form-row notes" id="order_comments_field">
                        <label for="order_comments" class="">Order Notes</label>
                        <textarea name="order_comments" class="input-text " id="order_comments"
                          placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <h3 id="order_review_heading">Your order</h3>
              <div id="order_review" class="woocommerce-checkout-review-order">
                <table class="shop_table woocommerce-checkout-review-order-table">
                  <thead>
                    <tr>
                      <th class="product-name">Product</th>
                      <th class="product-total">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach (auth()->user()->carts as $cart)
                      <tr class="cart_item">
                        <td class="product-name">
                          {{ $cart->inventory->product->title }} <strong class="product-quantity">*
                            {{ $cart->cart_quantity }}</strong>
                        </td>
                        <td class="product-total">
                          <span class="woocommerce-Price-amount amount"><span
                              class="woocommerce-Price-currencySymbol">$</span>{{ $cart->sub_total }}</span>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr class="cart-subtotal">
                      <th>Subtotal</th>
                      <td><span class="woocommerce-Price-amount amount"><span
                            class="woocommerce-Price-currencySymbol">$</span>{{auth()->user()->carts->sum('sub_total') }}</span>
                      </td>
                    </tr>
                    @if (Session::has('shipping_charge'))
                      <tr class="shipping">
                        <th>Shipping Charge</th>
                        <td data-title="Shipping">
                          @if (Session::get('shipping_charge') > 0)
                            +${{ Session::get('shipping_charge') }}
                          @else
                            Free Shipping
                          @endif
                        </td>
                      </tr>
                    @endif
                    @if (Session::has('coupon'))
                      <tr class="shipping">
                        <th>Coupon({{ Session::get('coupon')['name'] }})</th>
                        <td data-title="Shipping">
                          -${{ Session::get('coupon')['amount'] ? Session::get('coupon')['amount'] : '' }}
                        </td>
                      </tr>
                    @endif
                    <tr class="order-total">
                      <th>Total</th>
                      <td><strong><span class="woocommerce-Price-amount amount"><span
                              class="woocommerce-Price-currencySymbol">$</span>
                            @if (Session::has('shipping_charge') && Session::has('coupon'))
                              {{auth()->user()->carts->sum('sub_total') + Session::get('shipping_charge') - Session::get('coupon')['amount'] }}
                            @else
                              {{ auth()->user()->carts->sum('sub_total') + Session::get('shipping_charge') }}
                            @endif

                          </span></strong> </td>
                    </tr>
                  </tfoot>
                </table>
                <div id="payment" class="woocommerce-checkout-payment">
                  <ul class="wc_payment_methods payment_methods methods">
                    <li class="wc_payment_method payment_method_cheque">
                      <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method"
                        value="cheque" checked='checked' data-order_button_text="" />
                      <!--grop add span for radio button style-->
                      <span class='grop-woo-radio-style'></span>
                      <!--custom change-->
                      <label for="payment_method_cheque">
                        Check Payments </label>
                      <div class="payment_box payment_method_cheque">
                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store
                          Postcode.</p>
                      </div>
                    </li>
                  </ul>
                  <div class="form-row place-order">





                    <button type="submit" class="button alt">Place order</button>


                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- checkout-section - end
                                          ================================================== -->
@endsection

@section('script')
  <script>
    (function(window, document) {
      var loader = function() {
        var script = document.createElement("script"),
          tag = document.getElementsByTagName("script")[0];
        script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
        tag.parentNode.insertBefore(script, tag);
      };

      window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
  </script>
@endsection
