@extends('main')


@section('title', "| $post->title")


@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1>{{ $post->title }}</h1>
			<p>{{ $post->body }}</p>
			<br>
			<p>Posted in: {{ $post->category->name }}</p>
		</div>
	</div>

@endsection