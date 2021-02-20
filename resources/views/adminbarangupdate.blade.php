@extends('layouts.admin')

@section('content')
@include('layouts.partial.navbar')
	<div class="row">
		<div class="container">

			<h2 class="text-center my-5">Admin Barang</h2>
			
			<div class="col-lg-8 mx-auto my-5">	

				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif

				<form action="/adminbarang/update" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
        			@method('PUT')
					<div class="form-group">
						<b>File Gambar</b><br/>
						<input type="file" name="file">
					</div>

                    <div class="form-group">
						<b>Nama Barang</b><br/>
						<input type="text" name="nama">
					</div>


                    <div class="form-group">
						<b>Harga</b><br/>
						<input type="number" name="harga">
					</div>

					<div class="form-group">
						<b>Stock</b><br/>
						<input type="number" name="stock">
					</div>

					<div class="form-group">
						<b>Keterangan</b>
						<textarea class="form-control" name="keterangan"></textarea>
					</div>

					<input type="submit" value="Upload" class="btn btn-primary">
				</form>
				
				<h4 class="my-5">Data</h4>

                
                

			</div>
				
						@foreach($barangs as $g)
						<tr>
							
							<td>{{$g->nama}}</td>
							<td>{{$g->harga}}</td>
							<td>{{$g->stock}}</td>
							<td>{{$g->keterangan}}</td>
							<td>
							<a class="btn btn-danger" href="/adminbarang/hapus/{{ $g->id }}">HAPUS</a>
						
							<a class="btn btn-success" href="/adminbarang/edit/{{ $g->id }}">EDIT</a>
							</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>
		</div>
	</div>
    @endsection
	@push('scripts')
	@include('layouts.partial.navbar')
	@endpush