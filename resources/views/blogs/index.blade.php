@extends('main')


@section('title', '| All Blogs')


@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1>All Blogs</h1>
		</div>
	</div>

	<div class="row">
		@foreach($posts as $post)
			<div class="col-md-8 col-md-offset-2">
				<h2>{{ $post->title }}</h2>
				<h5 >Published at: {{ date('M j, Y H:ia', strtotime($post->created_at)) }}</h5>
				<p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body)>300 ? "..." : "" }}</p>
				<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read more</a>
				<hr>
			</div>
		@endforeach
	</div>

@endsection