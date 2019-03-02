@extends('../layouts.app')

@section('content')
<div class="wrapper">
    <div class="post">
        <h1 class="title">All Posts</h1>
            @foreach ($allposts as $post)
            <div class="post-wrapper">
                <h2><b>Title</b> - <?= $post->title ?></h2>
                <ul>
                    <li><b>Description</b> - <?= $post->description ?></li>
                    <li><b>Content</b> - <?= $post->content ?></li>
                    <div class="img-wrapper">
                        <p><b>Image</b> </p>
                        <img id="img" src="{{ asset('/uploads/files') . '/' .$post->picture }}" alt="photo" width="200" height="200" />
                    </div>
                </ul>
            </div>
            @endforeach
    </div>
</div>
@endsection