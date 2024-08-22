<x-layout>
    <h1>Авторизация</h1>
    <div class="row">
        <div class="col-6">
            <form method="post" action="{{ route('auth.login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    @error('email')
                        {{ $message }}
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                        {{ $message }}
                    @endif
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberme">
                    <label class="form-check-label" for="rememberme" name="rememberme">Запомнить меня</label>
                </div>
                <button type="submit" class="btn btn-primary">Авторизация</button>
            </form>
        </div>
        <div class="col-6"></div>
    </div>

</x-layout>
