@extends("layouts.master")

@section("content")
<title>Login</title>
    <div class="login-container">
        <h1>Inloggen</h1>

        <!-- Errors weergeven -->
        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login formulier -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</body>

@endsection