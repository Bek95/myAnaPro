@extends('master.layout',['title' => 'Login'])

@section('content')
    @include('errors_messages.create_user_errors_message')
    <div class="d-flex justify-content-center mt-5" style="padding: 5%">
        <form class="col-6" method="post" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email_login" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="d-flex justify-content-end">
                <a class="text-decoration-none" href="{{ route('user.index')}}">Create an account</a>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
@endsection
