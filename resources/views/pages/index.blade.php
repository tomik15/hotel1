@extends('layouts.app')

@section('content')

	<div class="jumbotron text-center">

		<h1>welcome</h1>
		<p>dadsa </p>
		<p><a class="btn btn-primary btn-lg"  role="button>Login" href="{{ route('login') }}">{{ __('Login') }}</a> 
			<a class="btn btn-success btn-lg" role="button>Register" href="{{ route('register') }}">{{ __('Register') }} </a> </p>
	</div>
@endsection
