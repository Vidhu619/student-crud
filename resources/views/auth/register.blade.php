<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   class="form-control @error('name') is-invalid @enderror"
                   required autofocus>

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror"
                   required>

            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password"
                   name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   required>

            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password"
                   name="password_confirmation"
                   class="form-control"
                   required>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Register
        </button>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}">Already registered? Login</a>
        </div>
    </form>
</x-guest-layout>
