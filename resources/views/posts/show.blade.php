@extends('main')


@section('title', '| Show')


@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{  $post->title }}</h1>
			<p>{{  $post->body }}</p>
			<p><i>Posted in: </i>{{ $post->category['name'] }}</p>
			@foreach ($post->tags as $tag)
				<span class="label label-default">{{ $tag->name }}</span>
			@endforeach
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Url:</dt>
					<dd><a href="{{ route('posts.show', $post->id) }}">{{ route('posts.show', $post->id) }}</a></dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y H:ia', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y H:ia', strtotime($post->updated_at)) }}</dd>
				</dl>

				<div class="row">
					<div class="col-sm-6"><a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-block">Edit</a></div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
							{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
						{!! Form::close() !!}
					</div>
				</div>

				<div class="row" style="margin-top: 20px;">
					<div class="col-sm-12"><a href="{{  route('posts.index') }}" class="btn btn-default btn-block"> See all Posts </a></div>
				</div>
			</div>
		</div>
	</div>

@endsection