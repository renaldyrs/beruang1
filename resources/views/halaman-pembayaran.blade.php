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
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Daftar Alamat
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="Alamat">
                                        <button class="dropdown-item btn-block" type="button">Action</button>
                                        <button class="dropdown-item btn-block" type="button">Another action</button>
                                        <button class="dropdown-item btn-block" type="button">Something else here</button>
                                        <button class="dropdown-item btn-block" type="button">
                                            <center><i class="fa fa-plus" aria-hidden="true"></i></center>
                                        </button>
                                    </div>
                                </div>
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
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>Gambar dan nama</td>
                                        <td>Rp 100.000</td>
                                        <td>1</td>
                                        <td>Rp 100.000</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                        <br>  
                        <div class="card">
                            <div class="card-body">
                            <h5><i class="fa fa-money" aria-hidden="true"></i>  Metode Pembayaran</h5>
                                
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