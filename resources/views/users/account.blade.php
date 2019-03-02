@extends('../layouts.app')

@section('content')
    <div class="wrapper">
        <h1 class="title">Edit Profile</h1>   
        <?php
        //    dd( $user); 
        ?>
        <form method="POST" action="/profile/" enctype="multipart/form-data">

            @method('PATCH')
            @csrf

            <div class="form-group row">
                    <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                    <div class="col-md-6 picture_upload" class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                        <input id="picture" type="file" class="form-control" name="picture" value="">
                        <img id="img" src="{{ asset('/uploads/files') . '/' .$user->picture }}" alt="photo" width="100" height="100" />
                
                        @if ($errors->has('picture'))
                            <span class="help-block">
                                <strong>{{ $errors->first('picture') }}</strong>
                            </span>
                        @endif
                    </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                <div class="col-md-6">
                    <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ $user->age }}" autofocus>

                    @if ($errors->has('age'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('age') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                <div class="col-md-6">
                    <select name="gender" class="col-md-4 control-label small-select">
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" >

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                <div class="col-md-6">
                    <input id="current_password" type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password" placeholder="Enter your current password" >

                    @if ($errors->has('current_password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('current_password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter your new password" >

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="confirm_password" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                <div class="col-md-6">
                    <input id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="Confirm your new password" >
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
            
        </form>
    </div>



@endsection