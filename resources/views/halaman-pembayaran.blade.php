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
<<<<<<< HEAD
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#pilih_pembayaran">pilih metode pembayaran</button>
                                <!-- Modal -->
                                <div class="modal fade" id="pilih_pembayaran" tabindex="-1" role="dialog" aria-labelledby="pilih_metode_pembayaran" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pilih_metode_pembayaran">Pilih Metode Pembayaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <b>Transaksi melalui Virtual Account</b> 
                                                <hr>
                                                <div class="row">
                                                <div class="col-3 col-sm-3">
                                                    Foto
                                                </div>
                                                <div class="col-12 col-sm-9">
                                                <button type="button" class="btn btn-link" btn-block>Bank Central Asia (BCA)</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12"> 
                                                <div class="row">
                                                <div class="col-3 col-sm-3">
                                                    Foto
                                                </div>
                                                <div class="col-12 col-sm-9">
                                                <button type="button" class="btn btn-link" btn-block>Bank Rakyat Indonesia (BRI)</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>

=======
                               <!-- <label for="inputState">State</label> -->
                               <form action="/bayar" method="get">
                               <div class="form-group">
                                <select id="inputState" name="bank" class="form-control">
                                    @foreach($bank as $b)
                                        <option value="{{$b->id_bank}}">{{$b->nama_bank}} </option>

                                        
                                    @endforeach
                                </select>
                               </div>
                                <button type="submit" class="btn btn-primary">Bayar</button>
                                </form>
>>>>>>> rey
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