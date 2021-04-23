
@extends('layouts.admin')
@push('style')

@endpush
@section('content')
@include('layouts.partial.navbar')
<style type="text/css">
   .satu {
   font-size: 20px;
   color : black;
   }
   .dua {
   font-size: 20px;
   }
   .tiga {
   font-size: 8px;
   }
</style>

    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="heading">
                    <br>
                </div>
                
                <div class="block-content">
                    <div class="product-info">
                    <br>
                    <br>
                        <div class="row">
                            <div class="col-md-6">

                                    <div class="sp-wrap"><center><img class="img-fluid d-block rounded" src="{{ url('/data_file/'.$barang->file) }}"></a></center></div>
                                
                                
                            </div>
                           
                            <div class="col-md-6">
                                <div class="info">
                                    <h3>{{$barang->nama}}</h3>
                                   <hr>
                                    <div class="kategori-product">
                                        <h3><p class="satu mr-3">Harga <b>Rp. {{$barang->harga}}</b></p></h3>
                                        <div class=profil-tabs>
                                        <div class="card">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
                                                </li>
                                            
                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <p>{{$barang->keterangan}}</p>
                                                </div>
                                                
                                                </div>
                                        </div>
                                    </div>

                                    

                                    <div class="price">
                                    <div class="input-group">
                                   
                                    <h3> </h3></div>    
                                        
                                        <br>
                                    </div>
                                    
                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                    
                                    <input type="hidden" name="product_id" value="{{ $barang->id }}" class="form-control">
                                    <button class="btn btn-primary" ><i class="icon-basket"></i>Masukkan Keranjang</button>
                                </form>
                      
                                <form action="{{ route('beli') }}" method="get">
                                    @csrf
                                    
                                    <input type="hidden" name="product_id" value="{{ $barang->id }}" class="form-control">
                                    <button class="btn btn-primary" ><i class="icon-basket"></i>Beli Sekarang</button>
                                </form>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
               
                    <div class="product-info">
                    
                        </div>
                        </div>
                    
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
                 <div class="footer-copyright">
                     <center> <p>© 2021 Copyright Text</p></center>
                </div>
        </div>
    </footer>

    @endsection
@push('scripts')
	@include('layouts.partial.script')
	@endpush