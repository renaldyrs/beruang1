@extends('layouts.admin')
@push('style')
    <!-- {{-- aditional style --}} -->
@endpush
@section('content')

@include('layouts.partial.navbar') 
<br>
        <br>
        <br>
        <br>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <div class="p-4 bg-white rounded">
                <h3 class="mt-0 text-black">Data pengiriman</h3>
                <form action="{{route('pengiriman')}}" method="get">
                    @csrf
                        <input type="hidden" name="id_pesanan" value="">
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Nama Lengkap<span class="text-danger">*</span>:</label>
                            <input type="text" class="form-control col-sm-9" name="nama_pelanggan" value="">
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Tanggal Lahir <span class="text-danger">*</span>:</label>
                            <input type="date" class="form-control col-sm-9" name="tanggal_lahir"  value="">
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">No Hp <span class="text-danger">*</span>:</label>
                            <input type="text" class="form-control col-sm-9" name="no_hp" value="">
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Provinsi</label>
                            <select name="provinsi" id="prov" class="form-control col-sm-9">
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Kota</label>
                            <select name="kota" id="city" class="form-control col-sm-9">

                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Alamat Lengkap <span class="text-danger">*</span> :</label>
                            <input type="text" class="form-control col-sm-9" name="alamat_lengkap" value="">
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Kode Pos <span class="text-danger">*</span> :</label>
                            <input type="text" class="form-control col-sm-9" name="kode_pos" value="">
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Kurir <spant class="text-danger">*</spant>:</label>
                            <select name="kurir" id="courier" class="form-control col-sm-9">
                            <option value="" disabled selected>--Pilih Kurir--</option>
                                @foreach($courier as $row)
                                    <option value="{{$row->kode_kurir}}">{{$row->nama_kurir}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Jenis Layanan <spant class="text-danger">*</spant>:</label>
                            <select name="jenis_pengiriman" id="service" class="form-control col-sm-5">
                               
                            </select>

                            <label class="control-label col-sm-1">Harga :</label>
                            <input type="text" value="" id="cost" name="biaya_pengiriman" class="form-control col-sm-3" readonly required>
                        </div>
                        
                        <div class="card mt-4">
                     <!-- isi1 -->
                            <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-11 mt-3">        
                                            <table class="table" id="table">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                    @foreach ($cartItems as $item)

                                                    <tr id="table{{$item['product_id']}}">
                                                        <td >
                                                            <div class="row">
                                                                <div class="col-md-6 ">
                                                                    <img class="" src="{{ url('/data_file/'.$item['product_image']) }}" width="170PX" height="100%" alt="Card image cap">
                                                                </div>
                                                                <div class="col-md-5">
                                                                    {{ $item['product_name'] }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td >
                                                            <span id="price{{ $item['product_id'] }}">{{ $item['product_price'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $item['qty'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span id="sub{{ $item['product_id'] }}">{{ $item['qty']* $item['product_price'] }}</span> 
                                                        </td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3">
                            
                                    <div class="col-md-8 " >
                                        <p  class="text-right">Total:</p>
                                    </div>
                                    <div class="col-md-2 " >
                                        <p class="text-right">Rp. {{$subtotal}} </p>
                                        <input type="hidden" value = "{{ $subtotal}}" id="total">
                                    </div>
                                </div>
                                <div class="row mb-3">

                                        <div class="col-md-8 " >
                                            <p  class="text-right" >Grand Total:</p>
                                        </div>
                                        <div class="col-md-2 " >
                                            <p class="text-right" id="grand"></p>
                                            <input type="hidden" name="grand_total" value = "" id="grandTotal">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-11">
                                        <div class="d-flex flex-row-reverse mt-2 mb-4">

                                            <div class="d-flex flex-column">
                                                <div class=" form-goup p-2">
                                                    <h3 id = "total">
                                                        {{ $subtotal}}
                                                    </h3>
                                                </div>
                                                
                                                
                                            </div>
                                            
                                            
                                        </div>
                                    </div> -->
                                    
                            </div> 
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">Lanjut ke Pembayaran <i class="fa fa-arrow-right ml-1"></i></button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container" >
    
    
    </div>
@endsection

@push('scripts')
@include('layouts.partial.script')
<script type="text/javascript">
  
function convertToRupiah(angka)
{
    var rupiah = '';		
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
    return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}

$(document).ready(function(){
    $.get({
        url:"{{url('/getProvince')}}",
                type:'get',
                dataType: 'json',
                data: {
                        "_token": "{{ csrf_token() }}",
                    },
                success:function(response){
                    var len = 0;
                    len = response.length;
                    for(var i=0; i<len; i++){

                        var id = response[i]['id_provinsi'];
                        var name = response[i]['nama_provinsi'];

                        var option = "<option value='"+id+"'>"+name+"</option>"; 

                        $("#prov").append(option);
                    }
                }
        });
var prov  =  $(this).val();
    $.get({
        url:"{{url('/getkota')}}/"+1,
        type:"get",
        dataType:"json",
        data:{
            "_token":"{{csrf_token() }}",
        },
        success:function(response){
            var data = response.length;
            for(var i=0;i<data;i++){
                var id =response[i]['id_kota'];
                var name = response[i]['nama_kota'];
                $("#city").append("<option value='"+id+"'>"+name+"</option>");
            }
        }
    });
    
    $("#prov").on('change',function(){
    var prov = $(this).val();
    $("#prov option[value='']").each(function(){
            $(this).remove();
        });
        $.get({
                url:"{{url('/getkota')}}/"+prov,
                type:'get',
                dataType: 'json',
                data: {
                        "_token": "{{ csrf_token() }}",
                    },
                success:function(response){
                    $("#city option").each(function(){
                            $(this).remove();
                        });
                    var len = 0;
                    len = response.length;
                    for(var i=0; i<len; i++){
                        var id = response[i]['id_kota'];
                        var name = response[i]['nama_kota'];

                        var option = "<option value='"+id+"'>"+name+"</option>"; 
                        $("#city").append(option);
                    }
                }
        });
    });

    var courier = $(this).val();
       var cityId = $('#city').val();
    //    console.log(cityId);
       $.ajax({
            url:"{{route('rajaongkir.service')}}",
            type:'POST',
            // dataType: 'json',
            data: 
                {
                    // "kota": cityId, 
                    // "kurir": courier,
                    "_token": "{{ csrf_token() }}",
                    
                },
            success:function(response){
                $("#service").empty().append(
                        '<option value="" selected disabled> Select Service </option>');
                        // console.log("a");
                var services = response.costs;
                // for(var i=0; i<len; i++){
                console.log(services);
                services.forEach(function (courier) {
                    var id_layanan = courier.service;
                    var cost = courier.cost[0].value;
                    var desc = courier.description;


                    var option = "<option value='"+id_layanan+"'>"+id_layanan+" ("+desc+")</option>"; 
                    $("#service").append(option);
                    
                });
            }    
        });

    $("#courier").on("change",function(){
        // console.log("a");
       var courier = $(this).val();
       var cityId = $('#city').val();
       console.log(cityId);
       $.ajax({
           
            url:"{{route('rajaongkir.service')}}",
            type:'POST',
            // dataType: 'json',
            data: 
                {
                    "kota": cityId, 
                    "kurir": courier,
                    "_token": "{{ csrf_token() }}",
                    
                },
            success:function(response){
                
                $("#service").empty().append(
                        '<option value="" selected disabled> Select Service </option>');

                var services = response.costs;
                // for(var i=0; i<len; i++){
                services.forEach(function (courier) {
                    var id_layanan = courier.service;
                    var cost = courier.cost[0].value;
                    var desc = courier.description;

                    var option = "<option value='"+id_layanan+"'>"+id_layanan+ "("+desc+")</option>"; 
                    $("#service").append(option);
                    
                });
            }    
        });
    });

    $("#service").on("change",function(){
       var courier = $("#courier").val();
       var cityId = $('#city').val();
       var layanan = $(this).val();
       var berat = $("#berat").val();
       $.ajax({
            url:"{{route('rajaongkir.cost')}}",
            type:'POST',
            // dataType: 'json',
            data: 
                {
                    "kota": cityId, 
                    "kurir": courier,
                    "berat": berat,
                    "_token": "{{ csrf_token() }}",
                    
                },
            success:function(response){
               
                var services = response.costs;
                // for(var i=0; i<len; i++){
                services.forEach(function (courier) {
                    // var id_layanan = courier.service;
                   if(courier.service == layanan){
                    var cost = parseInt(courier.cost[0].value);
                    var total = parseInt($("#total").val());
                    var grand = 0;
                    grand = cost+total;
                    // console.log(cost);
                    $("#cost").val(cost);
                    $("#grand").text(convertToRupiah(grand));
                    $("#grandTotal").val(grand);

                   }
                });
            }    
        });
    });
    function convertToRupiah(angka)
{
    var rupiah = '';		
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
    return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}
});
        
</script>

@endpush