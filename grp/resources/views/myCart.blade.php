@extends('layouts.app')
@section('content')
<script>
    function cal(){
        var names=document.getElementsByName('subtotal[]');
        var subtotal=0;
        var cboxes=document.getElementsByName('cid[]');
        var len=cboxes.length; //get number  of cid[] checkbox inside the page
        for(var i=0;i<len;i++){
            if(cboxes[i].checked){  //calculate if checked
                subtotal=parseFloat(names[i].value)+parseFloat(subtotal);
            }
        }
        document.getElementById('sub').value=subtotal.toFixed(2); //convert 2 decimal place      
    }
   // var checkbox =document.getElementsByName('cid[]');
    
     
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form action="{{route('add.new.order')}}" method="POST" enctype="multipart/form-data">
@CSRF
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
       <br><br>
       <table class="table table-bordered">
            <thead>
                <tr>                   
                    <td>Image</td>
                    <td>Club Id</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                @foreach($clubProducts as $clubProduct)
                <tr>
                   
                    <td>
                    <input type="checkbox" name="cid[]" id="cid[]" value="{{ $clubProduct->cid}}" onclick="cal()">
                    <input type="hidden" name="subtotal[]" id="subtotal[]" value="{{ $clubProduct->price*$clubProduct->cartQty}}">
                    <input type="hidden" name="productID" id="productID" value="{{ $clubProduct->id}}">
                    <img src="{{asset('images/product/')}}/{{  $clubProduct->image }}" alt="" width="100" class="img-fluid">
                    </td>
                    <td>{{  $clubProduct->clubid }}</td>
                    <td>{{  $clubProduct->name }}</td>    
                    <td>{{  $clubProduct->price }}</td>
                    <td>{{  $clubProduct->cartQty }}</td>
                    <td>{{  $clubProduct->price*$clubProduct->cartQty}}</td>

                </tr>  
                @endforeach
                <tr align="right">
                        <td colspan="5">&nbsp;</td>         
                        <td>RM<i> </i> <input type="text" value="0" name="sub" id="sub" size="7" readonly /></td>

                </tr>

                <tr align="right">
                        <td colspan="5">&nbsp;</td>
                        <td><button type="submit" class="btn btn-primary">Check Out</button></td>

                </tr>
            <tbody>
       </table>
       
    </div>
    <div class="col-sm-3"></div>
    
</div>
</form>

@endsection