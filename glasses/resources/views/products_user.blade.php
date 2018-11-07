<html>

<head>
  <title>My Cart</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <style>
  .badge-notify{
    background:red;
    position:relative;
    top: -20px;
    right: 10px;
  }
  .my-cart-icon-affix {
    position: fixed;
    z-index: 999;
  }
  </style>
</head>

<body class="container">

<ul class="nav navbar-nav navbar-right">
    <!-- Authentication Links -->
    @if (Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    @endif
</ul>

  <div class="page-header">
    <h1>Products
      <div style="float: right; cursor: pointer;">
        <a href="{{ route('cart.show') }}" class="glyphicon glyphicon-shopping-cart my-cart-icon" ></a>


       

      </div>
    </h1>
  </div>


    
  <div class="row">

  	@foreach($prods as $prod)
    
    <div class="col-md-3 text-center">
	      <img src="{{asset('images/'.$prod->prod_img)}}" style="width:100px;height: 100px;border-radius: 12px;" />
	      <br>
	      <strong>name: </strong>{{$prod->prod_name}}
	      <br>
	      <strong>price: </strong>{{$prod->prod_price}} $
	      <br>
         <a href="{{route('details',$prod->id)}}" class="btn btn-info " style="background-color: #a94442"> Details</a>
        @if (Auth::guest())
        <a href="{{route('user')}}" class="btn btn-info " >Add to cart</a>
        @else
        <a href="{{route('cart.store',$prod->id,Auth::user()->id)}}" class="btn btn-info my-cart-btn" data-image="{{asset('images/'.$prod->prod_img)}}">Add to cart</a>
        @endif

	      
       

	      <br>
	      <br>
	      
	      
    </div>

    @endforeach

  </div>


<script src="{{asset('js/jquery-2.2.3.min.js')}}"></script>
<script src="{{asset('js/bootstrap3.min.js')}}"></script>
<script src="{{asset('js/jquery.mycart.js')}}"></script>
  


  <script type="text/javascript">
  
  $(function () 
   {

	    var goToCartIcon = function($addTocartBtn)
	    {
	      var $cartIcon = $(".my-cart-icon");
	      var $image = $('<img width="50px" height="50px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
	      $addTocartBtn.prepend($image);
	      var position = $cartIcon.position();
	      $image.animate({
	        top: position.top,
	        left: position.left
	      }, 500 , "linear", function() {
	        $image.remove();
	      });


	    }

    
      $('.my-cart-btn').myCart
      ({
	      currencySymbol: '$',
	      classCartIcon: 'my-cart-icon',
	      classCartBadge: 'my-cart-badge',
	      classProductQuantity: 'my-product-quantity',
	      classProductRemove: 'my-product-remove',
	      classCheckoutCart: 'my-cart-checkout',
	      affixCartIcon: true,
	      showCheckoutModal: true,
	      numberOfDecimals: 2,
	      cartItems: 
	      [
	      ],
      
	      clickOnAddToCart: function($addTocart)
	      {
	        goToCartIcon($addTocart);
	      },
	      
	      afterAddOnCart: function(products, totalPrice, totalQuantity) 
	      {
	        console.log("afterAddOnCart", products, totalPrice, totalQuantity);
	      },
	      
	      clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) 
	      {
	        console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
	      },
	      
	      checkoutCart: function(products, totalPrice, totalQuantity) 
	      {
	        var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
	        checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
	        $.each(products, function(){
	          checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image);});
		    alert(checkoutString)
		    console.log("checking out", products, totalPrice, totalQuantity);
		  }

    });


  });
  </script>


</body>

</html>
