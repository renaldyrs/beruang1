@extends('layouts.admin')
@push('style')
    <style>
body {
  background-color: #f7ebd3;
}
.card-horizontal {
    display: flex;
    flex: 1 1 auto;
    box-shadow: 1px 1px 3px grey;
}
.fa.fa-trash {
  color: red;
}
.card {
    box-shadow: 1px 1px 3px grey;
}

</style>
@endpush
@section('content')
@include('layouts.partial.navbar')
        <br>
        <br>
        <br>
        <br>
        <!-- isi keranjang -->
    <div class="container" >
    <div class="card">
            <!-- isi1 -->
        <div class="container-fluid">
                <div class="row">
                @if($cartItems)
                    <div class="col-11 mt-3">        
                        <!-- <div class="card-body"> -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach ($cartItems as $item)

                                    <tr>
                                        <td class="row">
                                        <div class="col-md-6 ">
                                            <img class="" src="{{ url('/data_file/'.$item['product_image']) }}" width="170PX" height="100%" alt="Card image cap">
                                        </div>
                                        <div class="col-md-5">
                                            {{ $item['product_name'] }}
                                        </div>
                                        
                                        </td>
                                        <td >
                                            <span id="price{{ $item['product_id'] }}">{{ $item['product_price'] }}</span>
                                        </td>
                                        <td>
                                            <div class="input-group row">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-danger btn-number " data-quantity="minus" data-field="{{$item['product_id']}}">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="{{$item['product_id']}}" class="form-control col-md-4" min="1" onkeypress="return hanyaAngka(event,this)"  onchange="a(this,{{$item['product_id']}})" id="qty" value="{{ $item['qty'] }}" aria-label="Input group example" aria-describedby="btnGroupAddon">
                                                <button type="button" class="btn btn-success btn-number " data-quantity="plus" data-field="{{$item['product_id']}}">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            
                                        </td>
                                        <td>
                                            <span id="sub{{ $item['product_id'] }}">{{ $item['qty']* $item['product_price'] }}</span> 
                                        </td>
                                        <td >
                                            <a href="{{route('delete',$item['product_id'])}}"><i class="fa fa-trash  mr-4 float-right fa-2x"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                
                            </tbody>
                        </table>                       
                    <!-- </div> -->
                    
                </div>
                <div class="col-md-11">
                    <div class="d-flex flex-row-reverse mt-2 mb-4">

                        <div class="d-flex flex-column">
                            <div class=" form-goup p-2">
                                <h3 id = "total">
                                    {{ $subtotal}}
                                </h3>
                            </div>
                            
                            <div class=" form-goup p-2">
                                <a  class="btn btn-primary" href="#" role="button">Proceed to checkout</a>   
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>  
                @endif
            </div>

        </div> 

    </div>
    
    </div>
@endsection
@push('scripts')
	@include('layouts.partial.script')
    <script type="text/javascript"> 
  function hanyaAngka(evt,a) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    
    var currentVal = parseInt($(a).val());
    // console.log(currentVal); 
    if (!isNaN(currentVal)) {
            // Increment
            // console.log("a");
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            
            return false;
            return true;
        } else {
            if (charCode > 31 && (charCode < 49 || charCode > 57))
            
            return false;
            return true;
        }
   
}
  function a(nilai,id){
           
            // 
            var n = $(nilai).val();
           
                tambah(id,n);
        }
            
            
        
        
        function tambah(id,n){
            $.get({
                    url:"{{url('/keranjang/change')}}"+"/"+id+"/"+n,
                    type:'GET',
                    // dataType: 'json',
                    data: 
                        {
                            // "id_calon_karyawan": kar, 
                            "_token": "{{ csrf_token() }}",
                        },
                    success:function(response){
                        price = document.getElementById("price"+id).innerHTML;
                        sub = document.getElementById("sub"+id).innerHTML;
                        sub1= document.getElementById("sub"+id).innerHTML = price*n;
                        var total=document.getElementById("total").innerHTML  ;
                        if(parseInt(sub1)-parseInt(sub)<0){
                            cek = parseInt(sub)-parseInt(sub1);
                            // console.log(cek);
                            document.getElementById("total").innerHTML  =parseInt( total)-parseInt(cek) ;
                        }else{
                            cek = parseInt(sub1)-parseInt(sub);
                            console.log(cek);
                            document.getElementById("total").innerHTML  =parseInt( total)+parseInt(cek) ;
                        }
                    }    
                });
        }

        jQuery(document).ready(function(){
    // This button will increment the value
    $('[data-quantity="plus"]').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        // console.log(fieldName);
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
            tambah(fieldName,currentVal+1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
    // This button will decrement the value till 0
    $('[data-quantity="minus"]').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            if(currentVal - 1>0){
                $('input[name='+fieldName+']').val(currentVal - 1);
                tambah(fieldName,currentVal-1);
            }else{
                $('input[name='+fieldName+']').val(1);
                // tambah(fieldName,currentVal-1);
            }
           
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
});
  
    </script> 
	@endpush