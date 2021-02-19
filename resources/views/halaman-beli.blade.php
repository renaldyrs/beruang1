@extends('layouts.user')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
            <br>
                    <br>
                    <br>
                    <div class="form-group">
						<b>Nama Barang</b><br/>
						<input type="text" name="nama">
					</div>

                    <div class="form-group">
						<b>Harga</b><br/>
						<input type="number" name="harga">
					</div>

					<div class="form-group">
						<b>Keterangan</b>
						<textarea class="form-control" name="keterangan"></textarea>
					</div>

					<input type="submit" value="Upload" class="btn btn-primary">
            </div>

        </div>
    
    </div>

@endsection