@extends('main')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <h1>Welcome to my Blog</h1>
          <p class="lead">Thank you so much for visiting</p>
          <button class="btn btn-primary btn-lg" href="">Popular Posts</button>
      </div>
      </div>
    </div><!-- end of row -->
    <!-- Content -->
    <div class="row">
      @foreach($posts as $post)
        <div class="col-md-8">
          <h1>{{$post->title}}</h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
        </div>
      @endforeach

      <div class="col-md-3 col-md-offset-1">SideBar</div>
    </div><!-- end of row-->
@endsection



