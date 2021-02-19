@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">

            <div class="card">
                <section class="container mt-5">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ">
				<h2 class="mb-4">Harga</h2>
				<p></p>
			</div>

			<div class="row mb-5">
            @foreach($user as $us)
            <div class="card-deck">
			
            <div class="col-md-3 text-center">
			<div class="card-body">
			
		            <div class="menu-wrap">
		              	<a href="#" class="menu-img img mb-4" style="background-image: url(img/vespasprint.png);"></a>
		              	<div class="text">
		              	<h3><a href="#">{{ $us -> name }}</a></h3>
		              	<p> {{ $us->email }}</p>
		              	<br>
						<p class="price"><span>{{ $us->name }}</span></p>
		              	<br>
						<p><a href="beli.php" class="btn btn-primary btn-outline-primary">BELI</a></p>
		              	</div>
		            </div>
		        </div>
				</div>
				</div>
        @endforeach
		        
				
			</div>

		</div>
	</section>
	
            </div>
        </div>
    </div>
</div>
@endsection
