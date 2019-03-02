@extends('../layouts.app')

@section('content')
<div class="wrapper">
    <div class="post">
        <h1 class="title">My Posts</h1>
            @foreach ($myposts as $post)
            <div class="post-wrapper">
                <h2><b>Title</b> - <?= $post->title ?></h2>
                <ul>
                    <li><b>Description</b> - <?= $post->description ?></li>
                    <li><b>Content</b> - <?= $post->content ?></li>
                    <div class="img-wrapper">
                        <p><b>Image</b> - </p>
                        <img id="img" src="{{ asset('/uploads/files') . '/' .$post->picture }}" alt="photo" width="200" height="200" />
                    </div>
                    <div class="flex">
                        <a href="/my-posts/show/{{ $post->id }}" class="show-post link_push_left">View Post</a>
                        <form method="POST" action="/post/{{ $post->id }}" class="link_push_left">

                            @method('DELETE')
                            @csrf
                            
                            <div class="field">
                    
                                <div class="control">
                                    <button type="submit" class="btn btn-danger delete-post">Delete Post</button>
                                </div>
                            
                            
                            </div>
                        </form>
                        <a href="/my-posts/edit/{{ $post->id }}" class="update-post link_push_left">Update Post</a>
                    </div>
                </ul>
            </div>
            @endforeach
    </div>
</div>
@endsection