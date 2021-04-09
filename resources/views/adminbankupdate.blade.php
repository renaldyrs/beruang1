@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')
<div class="container">
<h4>Bank</h4>
                <form action="/adminbank/update/prosesbank/{id_bank}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}            
                    <div class="form-group row">
                    
                    <div class="col-md">
                    <label for="exampleFormControlFile1">Nama Bank</label>
						<input class="form-control" type="text" name="nama" value="{{$banks->nama_bank}}">
                    </div>

                    <div class="col-md-3">
                    <label for="exampleFormControlFile1">No Rekening</label>
						<input class="form-control" type="text" name="no_rekening" value="{{$banks->no_rekening}}">
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