@extends('master.layout')

@section('content')

@include('errors_messages.create_user_errors_message')


<div class="d-flex justify-content-center mt-5" style="padding: 5%">
    <form class="col-6" id="subscribtion_form" action="{{ route('user.create')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_name" class="form-label">User name</label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" class="form-control" id="email" name="email" {{ old('email') }} required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            {{-- <div class="text-danger" id="error_password">Passwords not equals</div> --}}
        </div>
        <button type="submit" id="submit_subscribtion" class="btn btn-primary">Submit</button>
    </form>
</div> 

@endsection

@push('scripts')
<script>
    $( document ).ready(function() {
        let divErrorPassword = $('#error_password');
        divErrorPassword.attr('hidden', true);
        // au moment du submit, on check si les password sont identiques
        $('#submit_subscribtion').on('click', function() {
            let password = $('#password').val();
            let confirmPassword = $('#confirm_password').val();
            if(password !== confirmPassword) {
                divErrorPassword.attr('hidden', false);
                $('#password').addClass('border border-danger');
                $('#confirm_password').addClass('border border-danger');
                // si les passwords ne sont pas identiques, et qu'on ressaisit le mdp, on retire le les message d'erreur.
                initErrorInput($('#password'));
                initErrorInput($('#confirm_password'));
            }
        });


        function initErrorInput(element){
            element.on('click', function() {
                divErrorPassword.attr('hidden', true);
                $('#password').removeClass('border border-danger');
                $('#confirm_password').removeClass('border border-danger');
            });
        }
    });
</script>
    
@endpush