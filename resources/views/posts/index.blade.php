@extends('main')


@section('title', '| All Posts')


@section('content')

	<div class="row">
		<div class="col-md-10"><h1>All posts</h1></div>
		<div class="col-md-2"><a href="{{ route('posts.create') }}" class="btn btn-primary btn-margin-top">Create New Post</a></div>
		<div class="col-md-12"><hr></div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th><strong>#</strong></th>
					<th>Title</th>
					<th>Body</th>
					<th>Category</th>
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ $post->body }}</td>
							<td>{{ $post->category['name'] }}</td>
							<td>{{ $post->created_at }}</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">view</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection