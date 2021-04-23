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
                                                <img src="{{asset('data_file/foto_users/'.Auth::user()->foto)}}" class="card-img-top" alt="...">
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
                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Pesanan</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Pesanan Batal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="diterima-tab" data-toggle="tab" href="#diterima" role="tab" aria-controls="diterima" aria-selected="false">Pesanan Diterima</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    @foreach($produk as $p)
                                    <div class="card mt-4">
                                            <div class="card mb-3" style="max-width: 100%;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                    <img src="{{asset('data_file/'.$p->file)}}" class="card-img" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <table class="table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                    <th scope="col">Nama</th>
                                                                    <th scope="col">Harga</th>
                                                                    <th scope="col">Jumlah</th>
                                                                    <th scope="col">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                
                                                                    <tr>
                                                                    <td>{{$p->nama}}</td>
                                                                    <td>{{$p->harga}}</td>
                                                                    <td>{{$p->qty}}</td>
                                                                    <td>{{$p->harga * $p->qty}}</td>
                                                                    </tr>
                                                                
                                                                </tbody>
                                                                </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="/bayar" method="get">
                                                @csrf
                                                <input type="hidden"  name="id_pesanan" value="{{$p->id_pesanan}}"> 
                                                <input type="hidden"  name="bank" value="{{$p->id_bank}}"> 
                                                
                                                    <button type="submit" class="btn btn-primary">Bayar</button>
                                            </form>
                                    </div>
                                    @endforeach

                                </div>

                                <div class="tab-pane fade  show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <br>
                                        <div class="container">   
                                        <div class="row">

                                        <div class="col-md-3">
                                            <div class="card">
                                            @if( is_null(Auth::user()->foto))
                                                <img src="New/assets/img/avatars/avatar1.jpg" class="card-img-top" alt="...">
                                            @else
                                                <img src="{{asset('data_file/foto_users/'.Auth::user()->foto)}}" class="card-img-top" alt="...">
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
                                    @foreach($batal as $p)
                                    <div class="card mt-4">
                                            <div class="card mb-3" style="max-width: 100%;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                    <img src="{{asset('data_file/'.$p->file)}}" class="card-img" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <table class="table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                    <th scope="col">Nama</th>
                                                                    <th scope="col">Harga</th>
                                                                    <th scope="col">Jumlah</th>
                                                                    <th scope="col">Total</th>
                                                                    <th scope="col">Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                
                                                                    <tr>
                                                                    <td>{{$p->nama}}</td>
                                                                    <td>{{$p->harga}}</td>
                                                                    <td>{{$p->qty}}</td>
                                                                    <td>{{$p->harga * $p->qty}}</td>
                                                                    <td>{{$p->status}}</td>
                                                                    </tr>
                                                                
                                                                </tbody>
                                                                </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                    </div>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="diterima" role="tabpanel" aria-labelledby="deterima-tab">
                                    @foreach($diterima as $p)
                                    <div class="card mt-4">
                                            <div class="card mb-3" style="max-width: 100%;">
                                                <div class="row no-gutters">
                                                   
                                                    <div class="col-md-12">
                                                        <div class="card-body">
                                                            <table class="table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                    <th></th>
                                                                    <th scope="col">Nama</th>
                                                                    <th scope="col">Harga</th>
                                                                    <th scope="col">Jumlah</th>
                                                                    <th scope="col">Total</th>
                                                                    <th>Pengiriman</th>
                                                                    <th>No Resi</th>
                                                                    <th scope="col">Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                
                                                                    <tr>
                                                                    <td><img src="{{asset('data_file/'.$p->file)}}" class="card-img" alt="..."></td>
                                                                    <td>{{$p->nama}}</td>
                                                                    <td>{{$p->harga}}</td>
                                                                    <td>{{$p->qty}}</td>
                                                                    <td>{{$p->harga * $p->qty}}</td>
                                                                    <td>
                                                                        @if(is_null($p->tanggal_pengiriman))
                                                                            -
                                                                        @else
                                                                            {{$p->tanggal_pengiriman}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if(is_null($p->no_resi))
                                                                            -
                                                                        @else
                                                                            {{$p->no_resi}}
                                                                        @endif
                                                                    </td>
                                                                    <td>{{$p->status}}</td>
                                                                    </tr>
                                                                
                                                                </tbody>
                                                                </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                    </div>
                                    @endforeach
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