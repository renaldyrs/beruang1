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
            
            <form action="{{route('editprofile')}}" method="GET">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-8">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tglahir" class="col-4 col-form-label">Tanggal Lahir</label>
                        <div class="col-8">
                            <input class="form-control" type="date" name="tgl" value="2000-08-19" id="tglahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tglahir" class="col-4 col-form-label">No Hp</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="no_hp" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jk" class="col-4 col-form-label" name>Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="jk" name="jk">
                            <option value="Laki-Laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button  class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
            
            </div>
        </div>
        </div>
       
        

        <div class="modal fade" id="editfoto" tabindex="-1" role="dialog" aria-labelledby="editdata" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editD">Edit Avatar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="{{route('editfoto')}}" method="post"  enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="exampleFormControlFile1" class="col-md-3">Input Foto</label>
                        <input type="file" name="file" class="form-control-file col-md-8" >
                    </div>
                </div>
           
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button  class="btn btn-success" id="submit">Simpan Perubahan</button>
                </div>
            </form>
            
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
                    <div class="col-3 mt-3">
                        <div class="card">
                        <div class="card-body">
                            <div class="img-bullet-wrapper">
                            @if( is_null(Auth::user()->foto))
                                                <img src="New/assets/img/avatars/avatar1.jpg" class="card-img-top" alt="...">
                                            @else
                                                <img src="{{asset('data_file/'.Auth::user()->foto)}}" class="card-img-top" alt="...">
                                            @endif
                                <br><hr>
                                <p>{{Auth::user()->name}}</p>
                                <p>{{Auth::user()->email}}</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-9 mt-3">  
                        <div class="card">
                        <div class="card-body">
                        <div class=profil-tabs>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pesanan</a>
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
                                    
                                        

                                    </div>



                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <br>
                                        <div class="container">   
                                        <div class="row">

                                        <div class="col-md-3">
                                            <div class="card">
                                            @if( is_null(Auth::user()->foto))
                                                <img src="New/assets/img/avatars/avatar1.jpg" class="card-img-top" alt="...">
                                            @else
                                                <img src="{{asset('data_file/'.Auth::user()->foto)}}" class="card-img-top" alt="...">
                                            @endif
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#editfoto" >Ganti Foto</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card">
                                                <div class="card-body">
                                                <button type="button" class="btn btn-outline-info float-right" data-toggle="modal" data-target="#editdata"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                
                                                <center><h5>Data Diri</h5></center>
                                                @if(count($user) == 0)
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="staticNama" class="col-sm-4 col-form-label">Nama</label>
                                                        <div class="col-sm-8">
                                                            <span>-</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticNama" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-sm-8">
                                                        <span>-</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticNama" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                                        <div class="col-sm-8">
                                                        <span>lainnya</span>
                                                        </div>
                                                    </div>
                                                </form>
                                                @else
                                                @foreach($user as $u)
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="staticNama" class="col-sm-4 col-form-label">Nama</label>
                                                        <div class="col-sm-8">
                                                            <span>{{$u->nama_lengkap}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticNama" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-sm-8">
                                                        <span>{{$u->tanggal_lahir}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticNama" class="col-sm-4 col-form-label">No HP</label>
                                                        <div class="col-sm-8">
                                                        <span>{{$u->no_hp}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticNama" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                                        <div class="col-sm-8">
                                                        <span>{{$u->jenis_kelamin}}</span>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                                @endforeach
                                                @endif
                                                </div>
                                            </div>
                                        </div>

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
    <script type="text/javascript">

    </script>
	@endpush