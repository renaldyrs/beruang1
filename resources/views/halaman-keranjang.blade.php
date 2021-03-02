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
    <div class="card">
            <!-- isi1 -->
        <div class="container-fluid">
                <div class="row">
                
                @foreach($barangs as $g)
                    <div class="col-11 mt-3">
                        
                        <div class="card-body">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper">
                                    <img class="" src="{{ url('/data_file/'.$g->file) }}" width="170PX" height="100%" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <a href=""><i class="fa fa-trash mr-3 ml-4 float-right"></i></a>
                                    <h4 class="card-title">{{$g->nama}}</h4>

                                    <p class="card-text"><small class="text-muted">{{$g->keterangan}}</small></p>
                                    <p class="card-text"><small class="text-muted">{{$g->harga}}</small></p>
                                    <label for="catatan">Catatan</label>
                                <input type="text">
                                </div>
                                
                            </div>                        
                    </div>
                </div>
                @endforeach
                </div>
        </div>    
    </div>
    </div>
@endsection
@push('scripts')
	@include('layouts.partial.script')
	@endpush