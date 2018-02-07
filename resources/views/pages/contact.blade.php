@extends('main')

@section('title', '| Contact Page')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="text-center">Contact Me</h1>
			<hr>
			<form action="{{ url('contact') }}"	method="POST">
				{{ csrf_field() }}
				<label for='email'>Email:</label>
				<input name='email' type="email" class="form-control">

				<label for='subject' class="label-top-spacing">Subject:</label>
				<input name='subject' class="form-control">

				<label for="body" name="body" class="label-top-spacing">Body:</label>
				<textarea name="body" class="form-control"></textarea>
				
				<input type="submit" name="submit" value="Send message" class="btn btn-success btn-block" style="margin-top:30px;">
			</form>
		</div>
	</div>

@endsection