@extends('layouts.admin')
@push('style')
    <style>
body {
  background-color: #FFFAFA;
}
</style>
@endpush
@section('content')
@include('layouts.partial.navbar')
<br>
<br>
<div class="container" style="heigth=100px">
<header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <br>
        <br>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <center>
            <img class="d-block" width="100%" height="400px" src="{{asset('New\assets\img\avatars\avatar1.jpg')}}"  alt="First slide">
            </center>
            </div>

            <div class="carousel-item"><center>
            <img class="d-block " width="100%" height="400px" src="{{asset('new\assets\img\avatars\avatar2.jpg')}}"  alt="Second slide"></center>
            </div>
            <div class="carousel-item"><center>
            <img class="d-block" width="100%" height="400px" src="{{asset('new\assets\img\avatars\avatar2.jpg')}}"  alt="Third slide"></center>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </header>
</div>
    
	<br>
  
	
            @foreach($category as $c)
                      
            @endforeach
       
 	<section>
  <div class="container">
  
  
  <div class="row">
  @foreach($barangs as $g)
    
    
    <div id="{{ url('category/'.$c->id) }}" class="col-md-3 col-sm-3 col-xs-11" >
              <div class="card" style="height: 98%;" href="/produk">
                  <img src="{{ url('/data_file/'.$g->file) }}" class="card-img-top" width="150px" height="150px" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><b>{{$g->nama}}</b></h5>
                      <p class="card-text" >{{$g->keterangan}}</p>
                      <p class="card-text"><small class="text-muted">{{$g->harga}}</small></p>
                      <p class="card-text"><small class="text-muted float-left">Stock Tersedia {{$g->stock}}</small></p>
                      <br>   
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                       <a href="/produk/{{$g->id}}" class="btn btn-outline-primary ">Cek</a>
                     
                   </div>
              </div>
           </div> 
    
      
      
                    
  @endforeach
  
  <br>
	</div>		
  </div> 
		
	</section>
@endsection
@push('scripts')
	@include('layouts.partial.script')
	@endpush