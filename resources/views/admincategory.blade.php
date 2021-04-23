@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')
<div class="container">
<h4>Supplier</h4>
                <form action="/admincategory/tambah" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                
                                    <div class="form-group row">
                    
                    <div class="col-md">
                        <div class="col-md">

                        <label for="exampleFormControlFile1">Nama Category</label>
						<input class="form-control" type="text" name="nama" >
                        </div>

                    </div>
                   
					</div>
					<input type="submit" value="Tambah" class="btn btn-primary">
				</form>
</div>
                
                
    <center><h4>Data Category</h4></center> 
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tabel Category</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                <div class="d-flex flex-row bd-highlight mb-3">
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
                                            <th>Id Category</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                
                                    <tbody>
                                    @foreach($category as $c)
                                        <tr>
                                            <td>{{$c->id}}</td>
                                            <td>{{$c->nama}}</td>
                                            
                                            
                                            <td>
                                                <div class="d-flex flex-row">    
                                                <div class="p-2"><a class="btn btn-danger fa fa-eraser"  aria-hidden="true" href="/admincategory/hapus/{{ $c->id}}"> HAPUS</a></div>    
                                                </div>                
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
    </script>
	@endpush