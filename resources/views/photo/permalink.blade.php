@extends('photo.layout.master')

@section('content')
	<table cellpadding="0" cellspacing="0" border="0"
	width="100percent">
		<tr>
			<td width="450" valign="top">
				<p>Title: {{ $image->title }}</p>
				<img src="{{ url(Config::get('image.upload_folder') .
					 '/' . $image->image) }}" alt="{{ $image->title }}">
			</td>
			<td valign="top">
				<p>Direct Image URL</p>
				<input onclick="this.select()" type="text"
				width="100percent" value=
				"{{ url(Config::get('image.upload_folder') .
					 '/' . $image->image) }}" />
				
				<p>Thumbnail Forum BBCode</p>
				<input onclick="this.select()" type="text"
				width="100percent" value=
				"url = {{ url('snatch') . '/' .
				$image->id }}" />

				<p>Thumbnail HTML Code</p>
				<input onclick="this.select()" type="text"
				width="100percent"
				value="<a href='{{ url('snatch') . '/' . $image->id }}'> </a>" />
			</td>
		</tr>
	</table>
@endsection