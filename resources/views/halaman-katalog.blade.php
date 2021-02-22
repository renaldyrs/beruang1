@extends('layouts.admin')
@push('style')
    <style>
body {
  background-color: #f7ebd3;
}
</style>
@endpush

@section('content')
@include('layouts.partial.navbar')
    <header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <br>
        <br>
        
    </header>
	<br>
  <br>
			
		
	<section>
  <div class="container">
  <div class="row">
  @foreach($barangs as $g)
          
           
           
           <div class="col-md-3">
              <div class="card" style="height: 98%;">
                  <img src="{{ url('/data_file/'.$g->file) }}" class="card-img-top" width="150px" height="150px" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><b>{{$g->nama}}</b></h5>
                      <p class="card-text" >{{$g->keterangan}}</p>
                      <p class="card-text"><small class="text-muted">{{$g->harga}}</small></p>
                      <p class="card-text"><small class="text-muted float-left">Stock Tersedia {{$g->stock}}</small></p>
                      <button type="button"  class="btn btn-outline-primary float-right"><a href="halaman-beli">Beli</a></button>
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
<<<<<<< HEAD
	@endpush 
           
=======
@endpush 
           
>>>>>>> pr/6
