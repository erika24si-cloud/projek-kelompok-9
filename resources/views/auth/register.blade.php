@extends('layouts.auth')

@section('title', 'Sign Up')

@section('content')
<div class="auth-main relative">
    <div class="auth-wrapper v1 flex items-center w-full h-full min-h-screen">
        <div class="auth-form flex items-center justify-center grow flex-col min-h-screen relative p-6">
            <div class="w-full max-w-[350px] relative">
                
                <div class="auth-bg">
                    <span class="absolute top-[-100px] right-[-100px] w-[300px] h-[300px] block rounded-full bg-theme-bg-1 animate-[floating_7s_infinite]"></span>
                    <span class="absolute top-[150px] right-[-150px] w-5 h-5 block rounded-full bg-primary-500 animate-[floating_9s_infinite]"></span>
                    <span class="absolute left-[-150px] bottom-[150px] w-5 h-5 block rounded-full bg-theme-bg-1 animate-[floating_7s_infinite]"></span>
                    <span class="absolute left-[-100px] bottom-[-100px] w-[300px] h-[300px] block rounded-full bg-theme-bg-2 animate-[floating_9s_infinite]"></span>
                </div>

                <div class="card sm:my-12 w-full shadow-none border">
                    <div class="card-body !p-10">
                        <div class="text-center mb-8">
                            <a href="{{ route('user.index') }}">
                                <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="img" class="mx-auto auth-logo"/>
                            </a>
                        </div>
                        <h4 class="text-center font-medium mb-4">Sign up</h4>
                        
                        <form method="POST" action="{{ route('auth.register.process') }}">
                            @csrf
                            
                            <div class="mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required>
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted">Register as:</label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="guest" {{ old('role') == 'guest' ? 'selected' : '' }}>Guest</option>
                                </select>
                                @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required>
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-4">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                            </div>
                            
                            <div class="flex mt-1 justify-between items-center flex-wrap">
                                <div class="form-check">
                                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" name="terms" required checked />
                                    <label class="form-check-label text-muted" for="customCheckc1">I agree to all the Terms & Condition</label>
                                </div>
                            </div>
                            
                            <div class="mt-4 text-center">
                                <button type="submit" class="btn btn-primary w-full shadow-2xl">Sign up</button>
                            </div>
                        </form>

                        <div class="flex justify-between items-center mt-4">
                            <h6 class="font-medium mb-0">Already have an Account?</h6>
                            <a href="{{ route('login') }}" class="text-primary-500 font-bold">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection