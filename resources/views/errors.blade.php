@extends('layouts/app')

@if ($errors->any())
@foreach ($errors->all() as $error)
            <div class="notification is-danger">
                <ul>
                    
                        <li>{{ $error }}</li>
                    
                </ul>
            </div>
            @endforeach
        @endif