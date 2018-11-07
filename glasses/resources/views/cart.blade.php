  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<table class="table table-responsive">
    <tr>
        <th>product</th><th>price</th><th>quantity</th><th>total</th><th>edit</th><th>delete</th>
    </tr>
     <?php $total = 0; ?>
    @foreach($carts as $cart)
        <form method="post" action="{{route('edit_quantity',$cart->id)}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <tr>
                <td>                    
                    <br>
                    <img src="{{asset('images/'.$cart->product->prod_img)}}" style="width:100px;height: 100px;border-radius: 12px;"alt="">
                    <br>
                    {{$cart->product->Prod_company}}
                    <br>
                    {{$cart->product->prod_color}}
                    <br> 
                </td>
                <td>{{$cart->product->prod_price}}</td>

                <td><input name="quantity" value="{{$cart->quantity}}" ></td>

                <td> <p name="price"> {{$cart->product->prod_price * $cart->quantity}} $</p></td>
                <?php $total += $cart->product->prod_price * $cart->quantity; ?>
                <td><button type="submit" class="btn btn-primary">edit</button></td>
                <td><a href="{{route('delete_cart_prod',$cart->id)}}" class="btn btn-danger">delete</a></td>
                <input type="hidden" name="id" value="{{$cart->id}}" />
            </tr>
        </form>
    @endforeach


    <tr>
        <th></th><th></th><th></th><th>Total</th><th></th><th></th>
    </tr>
    <tr>
        <th></th><th></th><th></th>
        <th>{{$total}}$</th><th></th><th></th>
    </tr>
</table>


<a class="btn btn-primary" href="{{route('user')}}"> go to home page</a>


<script type="text/javascript">
function findTotal(){
    var arr = document.getElementsByName('price');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = tot;
}

    </script>

