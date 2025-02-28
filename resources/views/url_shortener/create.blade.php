@extends('master.layout')

@section('content')
    <h1>Raccourcir une Url</h1>


    <div class="container">
        <form action method="post">
            @csrf
            <div class="mb-3">
                <label for="url" class="form-label">Saisir l'url à raccourcir</label>
                <input type="text" class="form-control" id="url" name="url">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
