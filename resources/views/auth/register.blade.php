@extends("layout.public")

@section("title")
Registracija korisnika
@endsection

@section("content")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-6 text-center">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Registracija</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeRegister') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Naziv</label>
                            <input type="text" class="form-control" name="name" placeholder="Unesite svoj naziv">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Unesite svoj email">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Sifra</label>
                            <input type="password" class="form-control" name="password" placeholder="Unesite svoju sifru">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Registracija</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection