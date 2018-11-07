  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<table class="table table-responsive">
    <tr>
        <th>id</th><th>name</th><th>img</th><th>company</th><th>color</th><th>price</th><th>quantity</th><th>edit</th><th>delete</th>
    </tr>
    @foreach($prods as $prod)
        <form method="post" action="{{route('edit_prod',$prod->id)}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <tr>
                <td>{{$prod->id}}</td>
                <td><input name="name" value="{{$prod->prod_name}}" ></td>
                <td><img src="{{asset('images/'.$prod->prod_img)}}" style="width:100px;height: 100px;border-radius: 12px;" /></td>
                <td><input name="company" value="{{$prod->Prod_company}}" ></td>
                <td><input name="color" value="{{$prod->prod_color}}" ></td>
                <td><input name="price" value="{{$prod->prod_price}}" ></td>
                <td><input name="quantity" value="{{$prod->prod_quantity}}" ></td>
                <td><button type="submit" class="btn btn-primary">edit</button></td>
                <td><a href="{{route('delete_prod',$prod->id)}}" class="btn btn-danger">delete</a></td>
                <input type="hidden" name="id" value="{{$prod->id}}" />
            </tr>
        </form>
    @endforeach

</table>


<br/><h2>Add new Product</h2>
<table class="table">
<form method="post" action="{{route('add_prod')}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <tr><td>name:</td><td> <input name="name" placeholder="product name" /></td></tr>
    <tr><td>img: </td><td><input type="file" name="img" /></td></tr>
    


    <tr><td>company:  </td><td><input name="company" placeholder="product company" /></td></tr>

    <tr><td>color:  </td><td><input name="color" placeholder="product color" /></td></tr>

    


    <tr><td>price:  </td><td><input name="price" placeholder="product price" /></td></tr>
    <tr><td>quantity:  </td><td><input name="quantity" placeholder="product quantity" /></td></tr>
    <tr><td colspan="2"><button type="submit" class="btn btn-success btn-lg">Add</button></td></tr>

</form>
</table>
<a class="btn btn-primary" href="{{route('user')}}"> go to home page</a>
<center >{!! $prods->render() !!}</center>
