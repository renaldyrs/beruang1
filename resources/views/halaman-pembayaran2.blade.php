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
                  <h4 class="judul">Kode Pembayaran</h4>
                </div>
                <div class="card-block">
                  <br>
                  <h3 class="card-text">7892378272892843</h3>
                  <br><br>
                </div>
              </div>
              <br>
              <p>Peraturan :</p>
        </div>
      </div>
    </div>
@endsection
@push('scripts')
	@include('layouts.partial.script')
	@endpush