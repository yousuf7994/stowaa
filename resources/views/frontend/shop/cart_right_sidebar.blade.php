
  <div class="sidebar-menu-wrapper">
      <div class="cart_sidebar">
        <button type="button" class="close_btn"><i class="fal fa-times"></i></button>
        <ul class="cart_items_list ul_li_block mb_30 clearfix">
          <li>
            <div class="item_image">
              <img src="assets/images/cart/cart_img_1.jpg" alt="image_not_found">
            </div>
            <div class="item_content">
              <h4 class="item_title">Yellow Blouse</h4> 
              <span class="item_price">$30.00</span>
            </div>
            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
          </li>
          <li>
            <div class="item_image">
              <img src="assets/images/cart/cart_img_2.jpg" alt="image_not_found">
            </div>
            <div class="item_content">
              <h4 class="item_title">Yellow Blouse</h4>
              <span class="item_price">$30.00</span>
            </div>
            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
          </li>
          <li>
            <div class="item_image">
              <img src="assets/images/cart/cart_img_3.jpg" alt="image_not_found">
            </div>
            <div class="item_content">
              <h4 class="item_title">Yellow Blouse</h4>
              <span class="item_price">$30.00</span>
            </div>
            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
          </li>
        </ul>

        <ul class="total_price ul_li_block mb_30 clearfix">
          <li>
            <span>Subtotal:</span>
            <span>$90</span>
          </li>
          <li>
            <span>Vat 5%:</span>
            <span>$4.5</span>
          </li>
          <li>
            <span>Discount 20%:</span>
            <span>- $18.9</span>
          </li>
          <li>
            <span>Total:</span>
            <span>$75.6</span>
          </li>
        </ul>
        <ul class="btns_group ul_li_block clearfix">
          <li><a class="btn btn_primary" href="{{ route('frontend.cart.index') }}">View Cart</a></li>
          <li><a class="btn btn_secondary" href="{{ route('frontend.cart.checkout.view') }}">Checkout</a></li>
        </ul>
      </div>
      <div class="cart_overlay"></div>
    </div>
