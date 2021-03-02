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
    
            <!-- isi1 -->
        <div class="container-fluid">
                <div class="row">
                    <div class="col-11 mt-3">
                        <div class="card">
                        <div class="card-body">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper">
                                    <img class="imageproduct" src="http://via.placeholder.com/300x180" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <a href=""><i class="fa fa-trash mr-3 ml-4 float-right"></i></a>
                                    <h4 class="card-title">Card title</h4>
                                    
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                
                                </div>
                            </div>
                            <br>
                            <div class="card-horizontal">
                                <div class="img-square-wrapper">
                                    <img class="" src="http://via.placeholder.com/300x180" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <a href=""><i class="fa fa-trash mr-3 ml-4 float-right"></i></a>
                                    <h4 class="card-title">Card title</h4>
                                    
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                
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
	@endpush