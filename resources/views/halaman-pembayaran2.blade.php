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
.judul{
  opacity: 50%;
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
        <div class="card-body">
              <div class="card text-center">
                <div class="card-header">
                  <h4 class="judul">Kode Bank / No Rekening</h4>
                </div>
                <div class="card-block">
                  <br>
                  @foreach($bank as $b)
                  <h3 class="card-text">{{$b->no_rekening}}</h3>
                  @endforeach
                  <br><br>
                </div>
                <div class="card-body">
                  
                </div>
              </div>
              <br>
                <form method="post"  action="/bayar/upload" enctype="multipart/form-data">
                @csrf
                  <input type="hidden"  name="id_pesanan" value="{{$id_pesanan}}">
                  <div class="form-group">
                  
                    <label for="exampleFormControlFile1">Bukti Pembayaran</label>
                    <input type="file" class="form-control-file" name="bukti">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              <br>
              <p>Peraturan :</p>
        </div>
      </div>
    </div>
@endsection
@push('scripts')
	@include('layouts.partial.script')
	@endpush