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
    <br>
    <br>
  <br>
			
		
	<section>
  <div class="card-body" align="right">
  
  </div>
                <!-- </nav> -->
  <div class="conatiner">
  <div class="row">
  @foreach($barangs as $g)
           
           <div class="col-md-3 col-sm-5 col-xs-11">
              <div class="card" style="height: 98%;">
                  <img src="{{ url('/data_file/'.$g->file) }}" class="card-img-top" width="150px" height="150px" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><b>{{$g->nama}}</b></h5>
                      <p class="card-text" >{{$g->keterangan}}</p>
                      <p class="card-text"><small class="text-muted">{{$g->harga}}</small></p>
                      <p class="card-text"><small class="text-muted float-left">Stock Tersedia {{$g->stock}}</small></p>
                      
                    </div>
              </div>
           </div>
           
  @endforeach
 
	</div>		
  </div>
	
		
	</section>
@endsection
@push('scripts')
	@include('layouts.partial.script')
	@endpush 
           
