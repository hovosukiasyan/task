@extends('../layouts.app')

@section('content')
<div class="wrapper">
    <h1 class="title">Post Details</h1>   

    <h2><b>Title</b> - {{ $post->title }}</h2>

    <div class="description">
        <p><b>Description<b> - {{ $post->description }}</p>
    </div>

    <div class="content">
        <p><b>Content</b> - {{ $post->content }}</p>
    </div>

    <div class="field">
            <label class="label">Category(ies)</label>
            
            <ul>
                @foreach ($selected_categories as $category)
                    <li><i><?= $category->title ?><i></li>
                @endforeach
            </ul>
    </div>
    <a href="/my-posts/edit/{{ $post->id }}" class="update-post link_push_left">Update Post</a>
        
</div>

@endsection