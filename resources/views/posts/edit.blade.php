@extends('main')


@section('title', '| Edit Blog Post')


@section('content')

		<div class="row">
			{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
				<div class="col-md-8">
					{{ Form::label('title', 'Title:') }}
					{{ Form::text('title', null, ['class' => 'form-control']) }}

					{{ Form::label('slug', 'Slug:') }}
					{{ Form::text('slug', null, ['class' => 'form-control']) }}


					<label for="category" name="category_id">Category:</label>
					{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

					{{Form::label('tags', 'tags:')}}
					<select name="tags[]" class="form-control select2-multi" multiple="multiple">
						@foreach($tags as $tag)
							<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
					</select>

					{{ Form::label('body', 'Body') }}
					{{ Form::textarea('body', null, ['class' => 'form-control']) }}
				</div>

				<div class="col-md-4">
					<div class="well" style="margin-top: 25px;">
						<dl class="dl-horizontal">
							<dt>Created At:</dt>
							<dd>{{ date('M j, Y H:ia', strtotime($post->created_at)) }}</dd>
						</dl>
						<dl class="dl-horizontal">
							<dt>Last Updated:</dt>
							<dd>{{ date('M j, Y H:ia', strtotime($post->updated_at)) }}</dd>
						</dl>
						<div class="row">
							<div class="col-sm-6">
								<a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-block">Cancel</a>
							</div>
							<div class="col-sm-6">
								{{ Form::submit('Save changes', ['class' => 'btn btn-success btn-block']) }}
							</div>
						</div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>

@endsection

@section('scripts')
	{!! Html::script('js/select2.min.js') !!}

	<script>
			$(".select2-multi").select2();
			$('.select2-multi').select2().val({!! json_encode($post->tags()->AllRelatedIds()) !!}).trigger('change');
	</script>
@endsection