@extends('master.layout', ['title' => 'liste des URL raccourccies'])

@section('content')
    <div class="container">
        <h1>liste des urls</h1>

       <div>
           <a href="{{ route('url_shortener.create') }}"><button type="button" class="btn btn-primary">raccourcir une url</button></a>
       </div>

        <div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Urls</th>
                    <th scope="col">créé par</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
