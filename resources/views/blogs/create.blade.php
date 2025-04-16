@extends("layout/public")

@section("title")
Blog Create Stranica
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
                        <label for="">Naslov</label>
                        <input type="text" class="form-control" name="naslov">
                    </div>
                    <div class="mb-3">
                        <label for="">Sadrzaj</label>
                        <textarea name="sadrzaj" class="form-control" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj blog</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection