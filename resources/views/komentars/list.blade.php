@extends("layout/public")

@section("title")
Komentar List stranica
@endsection

@section("content")

@if (session("info"))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>  
@endif

@if (session("success"))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>  
@endif

<header class="pb-3 mb-4 border-bottom">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="fw-bold">Komentar list stranica</h1>
        <a href="{{ route('komentari.create') }}" class="btn btn-primary">Novi komentar</a>
    </div>
</header>
<div class="row">
    <div class="col-md-12">
        @if (count($komentari) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Komentar</th>
                    <th>Blog</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Opcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach($komentari as $komentar)
                    <tr>
                        <td>{{ $komentar->id }}</td>
                        <td>{{ $komentar->komentar }}</td>
                        <td>{{ $komentar->blog->naslov }}</td>
                        <td>{{ $komentar->created_at }}</td>
                        <td><a href="{{ route('blog.delete', $komentar->id) }}" class="btn btn-danger">Obrisi</a></td>
                        <td><a href="{{ route('blog.edit', $komentar->id) }}" class="btn btn-primary">Izmeni</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div> 

@endsection