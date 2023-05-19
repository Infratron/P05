<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form class="p-5 border shadow" action="{{route('login')}}" method="POST">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf

                    <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">password</label>
                      <input type="password" name="password" class="form-control" id="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Accedi</button><br>
                    <a href="{{route('register')}}" class="small fst italic">Nuovo Utente?</a>
                  </form>
            </div>
        </div>
    </div>
</x-layout>