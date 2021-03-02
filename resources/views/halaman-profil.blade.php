@extends('layouts.admin')
@push('style')
    <style>
body {
  background-color: #f7ebd3;
}
.card-horizontal {
    display: flex;
    flex: 1 1 auto;
}
.card {
    box-shadow: 1px 1px 3px grey;
}
.profil-gambar{
    height: 150px;
    width: 200px;
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
                    <div class="col-2 mt-3">
                        <div class="card">
                        <div class="card-body">
                            <div class="img-bullet-wrapper">
                                <img class="image-profil" src="New/assets/img/avatars/avatar1.jpg" height="100%" width="100% " alt="Foto Profil">
                                <br><hr>
                                <p>Nama</p>
                                <p>DLL</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-10 mt-3">  
                        <div class="card">
                        <div class="card-body">
                        <div class=profil-tabs>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <p>Pengaturan Profil</p>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <p>Daftar Alamat</p>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <p>Keamanan</p>
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