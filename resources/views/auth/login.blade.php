@push('styles')
    <style>
        /* Page-specific: shared auth chrome lives in css/auth.css */
        :root {
            --input-border: rgba(255, 255, 255, 0.45);
            --input-focus-border: #ffffff;
        }

        body {
            justify-content: space-between;
        }

        /* Main Login */
        .login-container {
            width: 100%;
            max-width: 440px;
            margin: auto;
            padding: 1.5rem;
        }

        .login-header h1 {
            font-size: 1.65rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
            letter-spacing: -0.01em;
        }

        .login-header p {
            font-size: 0.9rem;
            color: var(--text-light-subtle);
            font-weight: 400;
            margin-bottom: 2.25rem;
        }

        .form-label {
            font-size: 0.825rem;
            font-weight: 500;
            color: var(--text-light-subtle);
            margin-bottom: 0.5rem;
        }

        /* Input */
        .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            color: #ffffff;
            font-size: 1.1rem;
            pointer-events: none;
            z-index: 5;
        }

        .form-control-custom {
            width: 100%;
            background-color: transparent;
            border: 1px solid var(--input-border);
            border-radius: 8px;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 400;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-control-custom::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-control-custom:focus {
            background-color: transparent;
            border-color: var(--input-focus-border);
            color: #ffffff;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
        }

        /* Validation Errors */
        .input-error {
            margin-top: 0.5rem;
            font-size: 0.75rem;
            color: #ffffff;
            font-weight: 500;
        }

        /* Session Status */
        .session-status {
            margin-bottom: 1rem;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff;
            font-size: 0.825rem;
        }

        /* Primary Button */
        .btn-submit {
            background-color: #ffffff;
            color: var(--royal-blue);
            font-weight: 700;
            font-size: 0.95rem;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            border: none;
            width: 100%;
            margin-top: 1.5rem;
            transition: background-color 0.2s ease, transform 0.1s ease, box-shadow 0.2s ease;
        }

        .btn-submit:hover {
            background-color: #f8fafc;
            color: var(--royal-blue-hover);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-submit:active {
            transform: scale(0.99);
        }

        @media (max-width: 576px) {
            .login-header h1 {
                font-size: 1.45rem;
            }
        }
    </style>
@endpush

<x-public.auth-layout
    title="Masuk Admin - Narra"
    majors-label="Major"
    :majors-href="url('/#progrms')"
>
    <main class="container d-flex flex-column justify-content-center flex-grow-1 my-4">
        <div class="login-container">

            <div class="login-header text-center">
                <h1>Masuk Admin</h1>
                <p>Sistem Administrasi Narra</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="session-status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">
                        Email
                    </label>

                    <div class="input-group-custom">
                        <i class="bi bi-envelope input-icon"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control-custom"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email anda"
                            required
                            autofocus
                            autocomplete="username"
                        >
                    </div>

                    @if ($errors->get('email'))
                        @foreach ($errors->get('email') as $message)
                            <div class="input-error">
                                {{ $message }}
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">
                        Kata Sandi
                    </label>

                    <div class="input-group-custom">
                        <i class="bi bi-lock input-icon"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control-custom"
                            placeholder="Masukkan kata sandi"
                            required
                            autocomplete="current-password"
                        >
                    </div>

                    @if ($errors->get('password'))
                        @foreach ($errors->get('password') as $message)
                            <div class="input-error">
                                {{ $message }}
                            </div>
                        @endforeach
                    @endif
                </div>


                <!-- Submit -->
                <button type="submit" class="btn btn-submit">
                    Masuk
                </button>
            </form>


        </div>
    </main>
</x-public.auth-layout>
