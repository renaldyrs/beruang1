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
                                        <div class="row form-goup">
                                            <input name="quantity" class="form-control col-md-8" id="qty" type="number" value="{{ $item['qty'] }}" onchange="a(this,{{$item['product_id']}})"> 
                                        </div>
                                    </td>
                                    <td>
                                        <span id="sub{{ $item['product_id'] }}">{{ $item['qty']* $item['product_price'] }}</span> 
                                    </td>
                                    <td >
                                        <a href=""><i class="fa fa-trash  mr-4 float-right fa-2x"></i></a>
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
            </div>

        </div> 

    </div>
    
    </div>
@endsection
@push('scripts')
	@include('layouts.partial.script')
    <script type="text/javascript"> 
  
  function a(nilai,id){
           
            var jum = "{{count(json_decode(app('request')->cookie('dw-carts'), true))}}";
            var n = $(nilai).val();
            if(n==0){
                var konfir = confirm("Anda yakin menghapus produk ini?")
                if(konfir ==true){
                    
                }else{
                    $(nilai).val(1);
                }
            }else{
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
                        
                        // console.log('a');
                        price = document.getElementById("price"+id).innerHTML;
                        sub = document.getElementById("sub"+id).innerHTML;
                        sub1= document.getElementById("sub"+id).innerHTML = price*n;
                        var total=document.getElementById("total").innerHTML  ;
                        if(parseInt( sub1)-parseInt(sub)<0){
                            document.getElementById("total").innerHTML  =parseInt( total)-parseInt(price) ;
                        }else{
                            document.getElementById("total").innerHTML  =parseInt( total)+parseInt(price) ;
                        }
                        // console.log(parseInt( sub1)-parseInt(sub));
                        // console.log(document.getElementById("sub"+id).innerHTML);
                        // var total=document.getElementById("total").innerHTML  ;

                        // document.getElementById("total").innerHTML  =parseInt( total)+parseInt(price) ;
                        // var sub = 0;
                        // for(var x = 1; x<=jum; x++){
                        //     // sub = document.getElementById("sub"+x).innerHTML 
                        //     // total =parseInt( total)+parseInt(sub)
                            
                        // }
                        
                        // alert('data telah diperbarui ! 😍😍😍😍😍');
                    }    
                });
        }
            
            
        }
        
  
    </script> 
	@endpush