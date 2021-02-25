@extends('layouts.admin')
@push('style')
    <style>
body {
  background-color: #f7ebd3;
  .card-horizontal {
    display: flex;
    flex: 1 1 auto;
}
}
</style>
@endpush
@section('content')
@include('layouts.partial.navbar')
        <!-- isi keranjang -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="http://via.placeholder.com/300x180" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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