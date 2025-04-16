@extends("layout/public")

@section("title")
Provera za brisanje bloga
@endsection

<div class="row justify-content-center">
    <div class="col-md-6 text-center">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Delete <b>{{ $blog->naslov }}</b> blog post</h5>
            </div>
            <div class="card-body">
                <p>Da li ste sigurni da zelite da obrisete blog?</p>
                <form action="{{ route('blog.delete', $id) }}" method="post">
                    @csrf 
                    <button type="submit" class="btn btn-danger">Obrisi blog</button>
                    <a href="{{ route('blog.list') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>