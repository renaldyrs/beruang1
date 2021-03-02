@extends('layouts.admin')
@push('style')


@endpush
@section('content')
@include('layouts.partial.navbar')
    <main class="page-pay">
    <div class="card">
  <div class="card-body">
    <center><h5>Pembayaran</h5></center>
    
  </div>
</div>
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