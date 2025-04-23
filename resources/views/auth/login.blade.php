@extends("layout.public")

@section("title")
Login stranica
@endsection

@section("content")

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session("success"))
                    <div class="alert alert-success text-center">
                        {{ session("success") }}
                    </div>
                @endif
                @if (session("error"))
                    <div class="alert alert-danger">
                        {{ session("error") }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('storeLogin') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Unesite email adresu">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Unesite svoju sifru">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  

@endsection