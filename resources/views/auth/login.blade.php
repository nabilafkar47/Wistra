@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <!-- Flash Message -->
    @include('partials.flash')

    <h4 class="mb-1">Login</h4>
    <p class="mb-4">Use the Admin account to manage data.</p>

    <form id="formAuthentication" class="mb-2" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" autofocus required />
        </div>
        <div class="mb-6 form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
        </div>
        <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
    </form>

    {{-- <div class="text-center">
        <a href="{{ route('register') }}">
            <span>Buat akun</span>
        </a>
    </div> --}}
@endsection
