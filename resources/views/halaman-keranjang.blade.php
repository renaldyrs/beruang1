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
    .swal-button--confirm{
        /* padding: 7px 19px; */
        /* border-radius: 2px; */
        background-color: #007bff;
        /* font-size: 18px; */
        /* border: 1px solid #007bff; */
        /* text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3); */
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
        <section class="clean-block clean-cart">
            <div class="container">
                <div class="content">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                            @if($cartItems)
                                @foreach ($cartItems as $item)
                                <div class="product">

                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div><img class="img-fluid" src="{{ url('/data_file/'.$item['product_image']) }}"></div>
                                        </div>
                                        <div class="col-md-3 product-info">
                                            <p class="product-name" >{{ $item['product_name'] }}</p>
                                        </div>
                                        <!-- <div class="col-md-3 product-info">
                                            <span id="price{{ $item['product_id'] }}">{{ $item['product_price'] }}</span>
                                        </div> -->
                                        <div class=" col-md-3 quantity">
                                            
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
                                        </div>
                                        <div class=" col-md-1 price">
                                            <span id="price{{ $item['product_id'] }}">{{ $item['product_price'] }}</span>
                                            <input type="text" hidden id="sub{{ $item['product_id'] }}" value="{{ $item['qty']* $item['product_price'] }}">
                                            <!-- <span id="sub{{ $item['product_id'] }}">{{ $item['qty']* $item['product_price'] }}</span>  -->
                                        </div>
                                        <div class=" col-md-2 ">
                                        <a href="{{route('delete',$item['product_id'])}}"><i class="fa fa-trash  mr-4 float-right fa-2x"></i></a>
                                        </div>
                                    </div>
                                  </div>
                                @endforeach
                            @endif    
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Summary</h3>
                                <h4><span class="text">Subtotal</span><span class="price" id="totall">{{ $subtotal}}</span></h4>
                                <h4><span class="text">Total</span><span class="price" id="total">{{ $subtotal}}</span></h4>
                                <a  class="btn btn-primary btn-block btn-lg" href="{{route('checkout')}}" id="check" role="button">Proceed to checkout</a>   
                                <!-- <button class="btn btn-primary btn-block btn-lg" type="button">Checkout</button> -->
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                        sub = document.getElementById("sub"+id).value;
                        console.log(sub);
                        sub1= document.getElementById("sub"+id).setAttribute('value', price*n);
                        sub1 = document.getElementById("sub"+id).value;
                        var total=document.getElementById("total").innerHTML  ;
                        console.log(sub1);
                        if(parseInt(sub1)-parseInt(sub)<0){
                            cek = parseInt(sub)-parseInt(sub1);
                            console.log(cek);
                            document.getElementById("total").innerHTML  =parseInt( total)-parseInt(cek) ;
                            document.getElementById("totall").innerHTML  =parseInt( total)-parseInt(cek) ;
                        }else{
                            cek = parseInt(sub1)-parseInt(sub);
                            console.log(cek);
                            document.getElementById("total").innerHTML  =parseInt( total)+parseInt(cek) ;
                            document.getElementById("totall").innerHTML  =parseInt( total)+parseInt(cek) ;
                        }
                    }    
                });
        }

        function deleted(id){
            // console.log("a");
            $.get({
                    url:"{{url('/keranjang/delete')}}"+"/"+id,
                    type:'GET',
                    // dataType: 'json',
                    data: 
                        {
                            // "id_calon_karyawan": kar, 
                            "_token": "{{ csrf_token() }}",
                        },
                    success:function(response){
                        x = document.getElementById("table"+fieldName).rowIndex;
                        // alert( x);
                        document.getElementById("check").remove();
                        $("#total").remove();
                        
                        $(".badge-danger").html("0");
                        document.getElementById("table").deleteRow(x);
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
                // $('input[name='+fieldName+']').val(1);
                // // tambah(fieldName,currentVal-1);
                // x = document.getElementById("table"+fieldName).rowIndex;
                // // alert( x);
                // document.getElementById("table").deleteRow(x);
                swal({
                    title: 'Apakah Kamu Yakin?',
                    text: 'Produk ini akan terhapus dari keranjang!',
                    icon: 'warning',
                    buttons: ["Cancel", "Delete!"],
                }).then(function(value) {
                    if (value) {
                        // console.log("a");
                        deleted(fieldName);
                    }
                });
            }
           
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
});
  
    </script> 
	@endpush