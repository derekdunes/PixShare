@extends('photo.layout.master')

@section('content')
	
	@if(count($images))
	
		<ul>
	
			@foreach($images as $image)
	
				<li>
	
					<a href="{{ url('/snatch' .'/'. $image->id) }}">

						<img src="{{ url(Config::get('image.upload_folder') .
					 '/' . $image->image) }}" alt="{{ $image->title }}">					
					
					</a>
	
				</li>
	
			@endforeach
	
		</ul>
	
		<p>{{$images->links()}}</p>
	
	@else
	
		{{--If no images are found on the database, we will show
		a no image found error message--}}
		<p>No images uploaded yet,
		<a href="/">Care to upload one photo?</a>
	</p>
	
	@endif

@endsection
