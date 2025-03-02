@extends('master.layout', ['title' => 'liste des URL raccourccies'])

@section('content')
    <div class="container">
        <h1>liste des URLs raccourcies</h1>

        <div>
            <a href="{{ route('url_shortener.create') }}"><button type="button" class="btn btn-primary">raccourcir une url</button></a>
        </div>

        <div>
            @if(isset($urls))
                @if($urls->isNotEmpty())
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Shortcut Url</th>
                            <th scope="col">créé par</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($urls as $url)
                            <tr>
                                <td><a href="{{ $url->url }}" target="_blank" >{{ $url->url_shortcut }}</a><button data-url="{{ $url }}" id="clip_board" class="clip-board ms-5">Copier l'Url</button></td>
                                <td>{{ $url->user->name }}</td>
                                <td class="d-flex ">
                                    <a href="{{ route('url_shortener.edit', $url->id) }}" method="get">
                                        <button type="button" class="btn btn-success me-3">Editer</button>
                                    </a>
                                    <form action="{{ route('url_shortener.destroy', $url->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $urls->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            @else
                <div class="d-flex justify-content-center">
                    <h2>Il n'y a pas de données</h2>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#clip_board').on('click', function () {
            var url = $(this).data('url');
            navigator.clipboard.writeText(url.url_shortcut);
            alert("le shortcut a été copié: " + url.url_shortcut);
        });
    </script>
@endpush
