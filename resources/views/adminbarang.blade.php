@extends('layouts.admin')

@section('content')
@include('layouts.partial.sidebar_admin')
	<div class="row">
		<div class="container">
		<div class="card">
        <div class="card-body">
			<h2 class="text-center my-5">Admin Produk</h2>
			
			<div class="col-lg-8 mx-auto my-5">	

				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif

				<form action="/adminbarang/proses" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="exampleFormControlFile1"> File Gambar</label>
						<input class="form-control-file" type="file" name="file">
					</div>

                    <div class="form-group">
						<label for="exampleFormControlFile1">Nama Barang </label>
						<input class="form-control" type="text" name="nama">
					</div>
					<div class="form-group">
					<label for="exampleFormControlFile1">Category Barang </label>
						<select class="form-control" id="exampleFormControlSelect1" name="category">
						@foreach($category as $a)
							<option value="{{$a->id}}">{{$a->nama}}</option>
						@endforeach
					</select>
					</div>
					

                    <div class="form-group">
					<label for="exampleFormControlFile1">Harga </label>
						<input class="form-control" type="number" name="harga">
					</div>

					<div class="form-group">
					<label for="exampleFormControlFile1">Stock </label>
						<input class="form-control" type="number" name="stock">
					</div>

					<div class="form-group">
					<label for="exampleFormControlFile1">Keterangan </label>
						<textarea class="form-control" class="form-control" name="keterangan"></textarea>
					</div>

					<input type="submit" value="Upload" class="btn btn-primary">
				</form>
			</div>
			</div>
			</div>
				<h4 class="my-5">Data</h4>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="1%">File</th>
							<th width="1%">Nama</th>
							<th width="1%">Harga</th>
							<th width="1%">Stock</th>
							<th>Keterangan</th>
							<th width="17%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($barangs as $g)
						<tr>
							<td><img width="150px" src="{{ url('/data_file/'.$g->file) }}"></td>
							<td>{{$g->nama}}</td>
							<td>{{$g->harga}}</td>
							<td>{{$g->stock}}</td>
							<td>{{$g->keterangan}}</td>
							<td>
							<a class="btn btn-danger" href="/adminbarang/hapus/{{ $g->id }}">HAPUS</a>
						
							<a class="btn btn-success" href="/adminbarang/update/{{ $g->id }}">EDIT</a>
							</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>
		
		</div>
	</div>
    @endsection
	@push('scripts')
	@include('layouts.partial.script')
	@endpush