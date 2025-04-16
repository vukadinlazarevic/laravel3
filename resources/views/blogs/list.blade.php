@extends("layout/public")

@section("title")
Blog list page
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
        <h1 class="fw-bold">Blog list stranica</h1>
        <a href="{{ route('blog.create') }}" class="btn btn-primary">Novi blog</a>
    </div>
</header>
<div class="row">
    <div class="col-md-12">
        @if (count($blogovi) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Naslov</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Opcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogovi as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->naslov }}</td>
                        <td>{{ $blog->created_at }}</td>
                        <td>{{ $blog->updated_at }}</td>
                        <td><a href="{{ route('blog.delete', $blog->id) }}" class="btn btn-danger">Obrisi</a></td>
                        <td><a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary">Izmeni</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection