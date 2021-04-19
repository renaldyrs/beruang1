@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')
        
    <center><h4>Pesanan</h4></center> 
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Info Pesanan</h6>
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
                                            <th>Aksi</th>
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
                                            <td>{{$p->alamat}}</td>
                                            <td>{{$p->tanggal_pesanan}}</td>
                                            <td>{{$p->status}}</td>
                                            
                                            <td>
            
                                            <form action="" method="post">
                                                <div class="d-flex flex-row">
                                                <div class="p-1"><a class="btn btn-info "  aria-hidden="true" href="/adminpesanan/update/{{$p->id_pesanan}}"> Sudah Bayar</a></div>
                                                
                                                <div class="p-1"><a class="btn btn-danger "  aria-hidden="true" href="/adminpesanan/batal/{{$p->id_pesanan}}"> Batal</a></div>
                                                </div>  
                                            </form>
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