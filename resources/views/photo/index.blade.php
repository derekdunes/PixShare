@extends('photo.layout.master')

@section('content')
	
	<form method="POST" action="/" enctype="multipart/form-data">
		
		{{ csrf_field() }}

		<div class="form-group">
			
			<label for="title">Title:</label>
			
			<input type="text" class="form-control" id="title" name="title" placeholder="Please insert your title here">

		</div>

		<div class="form-group">
			
			<label for="image">Image:</label>
			
			<input type="file" class="form-control" id="image" name="image" accept="image/*">

		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Save!</button>	
		</div>

		@if (count($errors))
			<div class="form-group">
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>
								{{ $error }}
							</li>
						@endforeach
						
					</ul>
				</div>	
			</div>
		@endif
		
	</form>

@endsection