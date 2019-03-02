@extends('../layouts.app')

@section('content')
<div class="wrapper">
    <h1 class="title">Edit Post</h1>   

    <form method="POST" action="/post/{{ $post->id }}">

        @method('PATCH')
        @csrf

        <div class="field">
        
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" name="title" placeholder="Title" class="input" value="{{ $post->title }}">
            </div>
            @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
        
        </div>
    
        <div class="field">
        
            <label class="label" for="description">Description</label>
            
            <div class="control">
                <textarea name="description" class="textarea">{{ $post->description }}</textarea>
            </div>
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>

        <div class="field">
        
            <label class="label" for="content">Content</label>
            
            <div class="control">
                <textarea name="content" class="textarea">{{ $post->content }}</textarea>
            </div>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        
        </div>

        <div class="field">
            <label class="label">Category</label>
            
            <select name="category_list[]" multiple="multiple">
                @foreach ($selected_categories as $selected)
                    <option value="<?= $selected->id ?>" selected><?= $selected->title ?></option>
                @endforeach
                @foreach ($not_selected_categories as $not_selected)
                    <option value="<?= $not_selected->id ?>"><?= $not_selected->title ?></option>
                @endforeach
            </select>
        </div>


        <div class="field">
        
            <div class="control">
                <button type="submit" class="button is-link">Update Post</button>
            </div>
        
        </div>

        

    </form>

</div>

@endsection