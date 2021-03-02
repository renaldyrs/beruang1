@extends('layouts.admin')
@push('style')


@endpush
@section('content')
@include('layouts.partial.navbar')
    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="heading">
                    <br>
                </div>
                <div class="block-content">
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="gallery">
                                    <div class="sp-wrap"><a href="assets/img/tech/image1.jpg"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image1.jpg"></a><a href="assets/img/tech/image1.jpg"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image1.jpg"></a><a href="assets/img/tech/image1.jpg"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image1.jpg"></a></div>
                                </div>
                            </div>
                            @foreach($barangs as $g)
                            <div class="col-md-6">
                                <div class="info">
                                    <h3>NAMA</h3>
                                    <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                    <br>
                                    <div class="kategori-product">
                                        <h3>Kategori Produk</h3><br>
                                        <button class="btn btn-lg" type="button" id="kategori-button">kategori 1</button>
                                        <button class="btn btn-lg" type="button" id="kategori-button">kategori 2</button>
                                        <button class="btn btn-lg" type="button" id="kategori-button">kategori 3</button>
                                        <button class="btn btn-lg" type="button" id="kategori-button">kategori 4</button>
                                        <button class="btn btn-lg" type="button" id="kategori-button">kategori 3</button>
                                        <button class="btn btn-lg" type="button" id="kategori-button">kategori 4</button>
                                        <hr>
                                    </div>
                                    <div class="price">
                                        <h4>Harga</h4>
                                        <br>
                                    </div>
                                    <button class="btn btn-primary" type="button"><i class="icon-basket"></i>Masukkan Keranjang</button>
                                    <button class="btn btn-primary" type="button"><i class="icon-basket"></i>Beli Sekarang</button>
                                </div>
                            </div>
                            $endforeach
                        </div>
                    </div>
                    <div class="product-info">
                    <div class=profil-tabs>
                        <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Spesifikasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Review</a>
                                </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <p>Deskripsi</p>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <p>Spesifikasi</p>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <p>Review</p>
                                </div>
                                </div>
                        </div>
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