@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')
    <div class="modal fade" id="inputresi" tabindex="-1" role="dialog" aria-labelledby="inputresi" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editD">No Resi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="{{route('editfoto')}}" method="post"  enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">No Resi</label>
                            <div class="col-8">
                            <input type="text" class="form-control" id="nama" name="no_resi" placeholder="no resi">
                            </div>
                        </div>
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button  class="btn btn-success" id="submit">Kirim</button>
                    </div>
                </div>    
            </form>
            
            </div>
        </div>
    </div>
    <center><h4>Pesanan Diterima</h4></center> 
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pesanan Diterima</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                <div class="d-flex flex-row bd-highlight mb-3">
                                    <div class="p-2 bd-highlight"><label>Show </label></div>
                                    <div class="p-2 bd-highlight">
                                        <select name="dataTable" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="#example">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                        </select>
                                    </div>
                                    <div class="p-2 bd-highlight">   
                                         <label>entries</label></div>
                                    </div>
                                </div>     
                                <div class="col-sm-6 col-md-6">
                                    <div class="d-flex flex-row-reverse bd-highlight">
                                        
                                        <div class="p-2 bd-highlight">
                                            <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <label>Search:</label>
                                        </div>
                                    </div>
                                    
                                </div>    
                        </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Pesanan</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                    <tbody>
                                    @foreach($pesanan as $p)
                                        <tr>
                                            <td>{{$p->id_pesanan}}</td>
                                            <td>{{$p->nama}}</td>
                                            <td>{{$p->jumlah_barang}}</td>
                                            <td>{{$p->harga_barang}}</td>
                                            <td>{{$p->total}}</td>
                                            <td>{{'Provinsi '.$p->nama_provinsi.', Kota '.$p->nama_kota.', '. $p->alamat}}</td>
                                            <td>{{$p->tanggal_pesanan}}</td>
                                            <td>{{$p->status}}</td>
                                            <td>
                                                <div class="modal fade" id="inputresi{{$p->id_pesanan}}" tabindex="-1" role="dialog" aria-labelledby="inputresi" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editD">No Resi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        
                                                        <form action="{{route('kirim')}}" method="post" >
                                                        @csrf
                                                            <input type="hidden" value="{{$p->id_pesanan}}" name="id_pesanan"> 
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                        <label for="nama" class="col-sm-4 col-form-label">No Resi</label>
                                                                        <div class="col-8">
                                                                        <input type="text" class="form-control" id="nama" name="no_resi" placeholder="no resi">
                                                                        </div>
                                                                </div>
                                                        
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                                    <button  class="btn btn-success" id="submit">Kirim</button>
                                                                </div>
                                                            </div>    
                                                        </form>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputresi{{$p->id_pesanan}}" >Kirim</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            </div>

    @endsection
	@push('scripts')
	@include('layouts.partial.script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
        $('#example').dataTable( {
            "pageLength": 10
        } );
    </script>
	@endpush