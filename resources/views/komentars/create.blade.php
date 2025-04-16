@extends("layout/public")

@section("title")
Komentari Create Stranica
@endsection

@section("content")

@if (session("error"))
    <div class="alert alert-danger">
        {{session("error")}}
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <!-- ispod taga za formu dodati sledeci tag / element -->
                    @csrf
                    <div class="mb-3">
                        <label for="">Izaberite za koji blog zelite da dodate komentar</label>
                        <select name="blog_id" class="form-control">
                            @foreach($blogovi as $blog) 
                                <option value="{{ $blog->id }}">{{ $blog->naslov }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Dodaj sadrzaj komentara</label>
                        <textarea name="komentar" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj komentar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection