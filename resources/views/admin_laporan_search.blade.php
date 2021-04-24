@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')
        
    <center><h4>Data Laporan</h4></center> 
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tabel Laporan</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <!-- <div class="d-flex flex-row bd-highlight mb-3">
                                    <div class="p-2 bd-highlight"><label>Show </label></div>
                                    <div class="p-2 bd-highlight">
                                        <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                        </select>
                                    </div>
                                    <div class="p-2 bd-highlight">   
                                         <label>entries</label></div>
                                    </div> -->
                                    <div class="p-2 bd-highlight">
                                    <form action="/laporan/cetak/search/proses" method="get">
                                        <input type="text" hidden value="{{$dateform}}" name="dateform">
                                        <input type="text" hidden value="{{$dateto}}" name="dateto">
                                        <div ><button class="btn btn-success btn-sm fa fa-download"  aria-hidden="true" > Download Laporan</button></div>
                                    </form>
                                        
                                     </div>
                                    
                                </div>     
                                <div class="col-sm-6 col-md-6">
                                <form action="/laporan/search" method="GET">
                                    <div class="d-flex flex-row-reverse bd-highlight">

                                            <div class="p-2 bd-highlight">
                                                <div ><button type="submit" class="btn btn-primary">Search</button></div>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <div ><input type="date" class="form-control" id="exampleInputEmail1" value="{{$dateto}}" name="dateto" aria-describedby="emailHelp"></div>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <div >_ </div>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <input type="date" class="form-control" name="dateform" value="{{$dateform}}" placeholder="" aria-controls="dataTable">
                                            </div>
                                           
                                            
                                            
                                            
                                       
                                        <!-- <div class="p-2 bd-highlight">
                                            <div ><a class="btn btn-success btn-sm fa fa-download"  aria-hidden="true" href="/laporan/cetak" > Download Laporan</a></div>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <label>Search:</label>
                                        </div> -->
                                    </div>
                                </form>
                                </div>    
                        </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Pesanan</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Harga Barang</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                    <tbody>
                                    @php $i=1 @endphp   
                                    @foreach($laporan as $l)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$l->id_pesanan}}</td>
                                            <td>{{$l->nama}}</td>
                                            <td>{{$l->jumlah_barang}}</td>
                                            <td>{{$l->harga_barang}}</td>
                                            <td>{{$l->tanggal_pesanan}}</td>
                                            
                                            <td>{{$l->total}}</td>
                                            <td>{{$l->status}}</td>
                                            
                                            
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
    </script>
	@endpush