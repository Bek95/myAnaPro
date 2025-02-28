@extends('master.layout')

@section('content')

<div class="d-flex justify-content-center mt-5" style="padding: 5%">
    <form class="col-6">
        <div class="mb-3">
            <label for="email_login" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email_login" name="email_login" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="d-flex justify-content-end">
            <a class="text-decoration-none" href="{{ route('user.index')}}">Create an account</a>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div> 

@endsection