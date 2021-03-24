@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')
    <div class="container">
    
        <h4>Kurir</h4>
        <form action="/adminkurir/update/proseskurir/{id_kurir}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
                    
                    <div class="form-group row">
                    
                    <div class="col-md-3">
                    <label for="exampleFormControlFile1">Kode Kurir </label>
						<input class="form-control" type="text" name="kode_kurir" value="{{$kurirs->kode_kurir}}">
                    </div>

                    <div class="col-md">
                    <label for="exampleFormControlFile1">Nama Kurir</label>
						<input class="form-control" type="text" name="nama" value="{{$kurirs->nama_kurir}}">
                    </div>
                    
					</div>
					<input type="submit" value="Ubah" class="btn btn-primary">
				</form>
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