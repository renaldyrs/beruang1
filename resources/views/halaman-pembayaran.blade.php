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
.card {
    box-shadow: 1px 1px 3px grey;
}
.btn-block{
    float: right;
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
    
            <!-- isi1 -->
        <div class="container-fluid">
                <div class="row">
                    <div class="col-11 mt-3">
                        <div class="card">
                            <div class="card-body">
                            <h5><i class="fa fa-map-marker" aria-hidden="true"></i>  Alamat pengiriman</h5>
                               @foreach($alamat as $a)
                               <input type="text" value="Provinsi {{$a->nama_provinsi}}, Kota {{$a->nama_kota}}, {{$a->alamat}}" id="alamat" name="alamat" class="form-control " readonly required>
                               @endforeach
                            </div>
                            <br>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-body">
                            <h5><i class="fa fa-archive" aria-hidden="true"></i>  Produk yang terpilih</h5>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($produk as $b)
                                        <tr>
                                        <th scope="row">1</th>
                                        <td class="row">
                                        <div class="col-md-6 ">
                                            <img class="" src="{{ url('/data_file/'.$b->file) }}" width="170PX" height="100%" alt="Card image cap">
                                        </div>
                                        <div class="col-md-5">
                                            {{ $b->nama}}
                                        </div>
                                        
                                        </td>
                                        <td>{{ $b->harga}}</td>
                                        <td>{{$b->qty}}</td>
                                        <td>{{ $b->qty * $b->harga}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                        <br>  
                        <div class="card">
                            <div class="card-body">
                            <h5><i class="fa fa-money" aria-hidden="true"></i>  Metode Pembayaran</h5>
                               <!-- <label for="inputState">State</label> -->
                               <form action="/bayar" method="get">
                               @csrf
                               <input type="hidden"  name="id_pesanan" value="{{$id_pesanan}}"> 
                               <div class="form-group">
                                
                                <select id="inputState" name="bank" class="form-control">
                                    @foreach($bank as $b)
                                        <option value="{{$b->id_bank}}">{{$b->nama_bank}} </option>

                                        
                                    @endforeach
                                </select>
                               </div>
                                <button type="submit" class="btn btn-primary">Bayar</button>
                                </form>
                            </div>
                            <br>
                        </div>

                    </div>
                        

                </div>

        </div>    
    </div>
    </div>
@endsection
@push('scripts')
	@include('layouts.partial.script')
	@endpush