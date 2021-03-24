@extends('layouts.admin')
@push('style')
    <style>
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
        <!-- Modal -->
        <div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="editdata" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editD">Edit Data diri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-8">
                    <input type="text" class="form-control" id="nama" placeholder="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tglahir" class="col-4 col-form-label">Tanggal Lahir</label>
                    <div class="col-8">
                        <input class="form-control" type="date" value="2011-08-19" id="tglahir">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="jk">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                        <option>Lainnya</option>
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success">Simpan Perubahan</button>
            </form>
            </div>
            </div>
        </div>
        </div>
        
        
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
                                <img class="image-profil" src="{{asset('New/assets/img/avatars/avatar1.jpg')}}" height="100%" width="100% " alt="Foto Profil">
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
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pembayaran</a>
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
                                        <p>Pembayaran</p>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <br>
                                    <div class="container">   
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="New/assets/img/avatars/avatar1.jpg" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-outline-secondary btn-block">Ganti Foto</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card">
                                                <div class="card-body">
                                                <button type="button" class="btn btn-outline-info float-right" data-toggle="modal" data-target="#editdata"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                
                                                <center><h5>Data Diri</h5></center>
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="staticNama" class="col-sm-3 col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" readonly class="form-control-plaintext" id="staticNama" value="David">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticNama" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" readonly class="form-control-plaintext" id="staticLahir" value="21 Januari 2020">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticNama" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" readonly class="form-control-plaintext" id="staticJenis" value="Laki-laki">
                                                        </div>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                    <br>
                                        <div class="card">
                                        <div class="card-body">
                                        <i class="fa fa-pencil-square-o float-right" aria-hidden="true"></i>
                                            <center><h5>Alamat</h5></center><hr>
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Email</label>
                                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Password</label>
                                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAddress">Address</label>
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAddress2">Address 2</label>
                                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                    <label for="inputCity">City</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <label for="inputState">State</label>
                                                    <select id="inputState" class="form-control">
                                                        <option selected>Choose...</option>
                                                        <option>...</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    <label for="inputZip">Zip</label>
                                                    <input type="text" class="form-control" id="inputZip">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Check me out
                                                    </label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Sign in</button>
                                            </form>
                                        </div>
                                        </div>
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
    </div>
@endsection
@push('scripts')
	@include('layouts.partial.script')
	@endpush