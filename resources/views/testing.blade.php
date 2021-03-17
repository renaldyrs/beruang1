@extends('layouts.admin')
@push('style')
    <style>
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
    .no-gutter > [class*='col-'] {
    padding-right:0;
    padding-left:0;
}
</style>
@endpush
@section('content')
@include('layouts.partial.navbar')
        <br>
        <br>
        <br>
        <br>
        <section class="clean-block clean-cart">
            <div class="container">
                <div class="content">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div><img class="img-fluid" src="New/assets/img/avatars/avatar1.jpg"></div>
                                        </div>
                                        <div class="col-md-4 product-info"><a class="product-name" href="#">Nama Produk</a>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1"></div>
                                        <div class="col-6 col-md-2 price"><span>Harga</span></div>
                                    </div>
                                </div>
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image2.jpg"></div>
                                        </div>
                                        <div class="col-md-4 product-info"><a class="product-name" href="#">Lorem Ipsum dolor</a>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1"></div>
                                        <div class="col-6 col-md-2 price"><span>Harga</span></div>
                                    </div>
                                </div>
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image2.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Lorem Ipsum dolor</a>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1"></div>
                                        <div class="col-6 col-md-2 price"><span>Harga</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Summary</h3>
                                <h4><span class="text">Subtotal</span><span class="price">$360</span></h4>
                                <h4><span class="text">Total</span><span class="price">$360</span></h4><button class="btn btn-primary btn-block btn-lg" type="button">Checkout</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <script src="New/assets/js/jquery.min.js"></script>
    <script src="New/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="New/assets/js/smoothproducts.min.js"></script>
    <script src="New/assets/js/theme.js"></script>
</body>

</html>