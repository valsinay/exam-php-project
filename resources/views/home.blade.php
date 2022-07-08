@extends('students.layout')
@include("inc.navbar")
@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

<div>Welcome to Student System 2022 designed by Rositsa Markova</div>
<p>Here you can find the following functionalities:</p>
<ul>
<li>CREATE</li>
<li>READ</li>
<li>UPDATE</li>
<li>DELETE</li>
</ul>

<p>You can also register your own user and login with it! Isn't that cool? </p>

<div>You can click <a href=''>here</a> to create your user and start exploring!</div>
@endsection
