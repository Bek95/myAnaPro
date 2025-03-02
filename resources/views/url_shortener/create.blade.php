@extends('master.layout')

@section('content')
    <section class="section-url-shortcut">
        <div class="form-shortercut">
            <div style="margin-top: 10%;">
                <h1 class="h1-white">une url longue ? raccourcissez-la</h1>
                <h2 class="h2-white">Largement meilleurs et plus court que les autres.</h2>
            </div>
            <div class="d-flex justify-content-center">
                <form class="form-inline" action="{{ route('url_shortener.store') }}" method="post">
                    @csrf
                    <div class="form-group mx-sm-3 mb-2 col-12 mt-4">
                        <input type="url"  id="url" name="url" placeholder="Coller un lien à raccourcir" class="input-form-url-shortcut">
                        <input type="submit" value="raccourcir" class="input-submit">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="brands">
        <div class="container mt-2">
            <h3 class="title-brands">Ces marques nous font confiance</h3>
            <img src="{{ asset('images/logos/my-ana-pro-logo.png') }}" alt="1" class="picture-brands">
        </div>
    </section>
@endsection

