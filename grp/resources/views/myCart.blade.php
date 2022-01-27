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
    function submit(){

        
    }   
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="row cart-container">
        <div class="row cart-title"> <!-- Title -->
            <br>
            <h4 class="page-title">My Cart</h4>
            <br>
        </div> 

        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <br><br>
          
            <table class="cart-table">
                <thead>
                    <tr>
                        <th></th>               
                        <th>Image</th>
                        <th>Club Name</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('add.new.order')}}" method="POST" enctype="multipart/form-data">
                    @CSRF
                        @foreach($clubProducts as $clubProduct)
                        <tr class="item-data">
                            <td> <!-- checkbox -->
                            
                                <input type="checkbox" name="cid[]" id="cid[]" value="{{ $clubProduct->cid}}" onclick="cal()">
                                <input type="hidden" name="subtotal[]" id="subtotal[]" value="{{ $clubProduct->price*$clubProduct->cartQty}}">
                                <input type="hidden" name="productID" id="productID" value="{{ $clubProduct->id}}">
                            </td>
                            <td>
                                <img src="{{asset('images/product/')}}/{{  $clubProduct->image }}" alt="" width="100" class="img-fluid">
                            </td>
                            <td>{{  $clubProduct->clubName }}</td>
                            <td>{{  $clubProduct->name }}</td>    
                            <td>RM {{  $clubProduct->price }}</td>
                            <!-- Manage quantity, each adjustment will update the subtotal --> 
                            <td>
                            {{$clubProduct->cartQty}}
                           
                
                            </td> 

                            <!-- Subtotal -->      
                            <td>RM {{  $clubProduct->price*$clubProduct->cartQty}}</td>
                            <!-- Delete button -->
                            <td><a href="{{route('deleteCart',['id'=>$clubProduct->cid])}}" style="text-decoration: none;" class="delete-btn" onClick="return confirm('Are you sure to delete?')">Delete</a>
                        </tr>  
                        @endforeach
                        <!-- Total amount & Check out button -->
                        <tr align="right" style="background-color:white;">
                            <td colspan="6">&nbsp;</td>         
                            <td>RM<i> </i> <input style="width:55px;" type="text" value="0" name="sub" id="sub" size="7" readonly /></td>
                            <td class="text-center"><button type="submit" class="submit-btn">Check Out</button></td>
                        </tr>
                    </form>
                <tbody>
            </table>
        </div>
        <div class="col-sm-2"></div>
    </div>
@endsection