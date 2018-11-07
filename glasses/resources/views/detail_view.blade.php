<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<script src="{{asset('js/bootstrap.min.js')}}"></script>


     <img src="{{asset('images/'.$prod->prod_img)}}" style="width:100px;height: 100px;border-radius: 12px" />
     <br>
       <i>Name : {{$prod->prod_name}}</i>
       <br>
        <i>Price : {{$prod->prod_price}} $</i>
       <br>
     <i>Color : {{$prod->Prod_color}}</i>
     <br>
     <i>Company : {{$prod->Prod_company}}</i>
 
<br>
<br>

<a class="btn btn-success" href="{{route('all')}}"> go to home page</a>
