@extends('../layouts.app')

@section('content')
<div class="wrapper">
    <h1 class="title">Create Post</h1>   
    <?php
    //    dd( $user); 
    ?>
    <form method="POST" action="/post/" enctype="multipart/form-data">

        @csrf

        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="" autofocus>

                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="" autofocus>

                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

            <div class="col-md-6">
                <input id="content" type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" value="" autofocus>

                @if ($errors->has('content'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Post Picture') }}</label>

            <div class="col-md-6 picture_upload" class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                <input id="picture" type="file" class="form-control" name="picture" value="">
                <img id="img" src="#" alt="photo" width="100" height="100" />
        
                @if ($errors->has('picture'))
                    <span class="help-block">
                        <strong>{{ $errors->first('picture') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('POST') }}
                </button>
            </div>
        </div>
        
    </form>
</div>
@endsection