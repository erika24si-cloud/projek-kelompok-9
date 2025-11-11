@extends('layouts.auth')

@section('title', 'Sign Up')

@section('content')
    
    <div class="auth-main relative">
        <div class="auth-wrapper v1 flex items-center w-full h-full min-h-screen">
            <div class="auth-form flex items-center justify-center grow flex-col min-h-screen relative p-6 ">
                <div class="w-full max-w-[350px] relative">
                    <div class="auth-bg ">
                        <span class="absolute top-[-100px] right-[-100px] w-[300px] h-[300px] block rounded-full bg-theme-bg-1 animate-[floating_7s_infinite]"></span>
                        <span class="absolute top-[150px] right-[-150px] w-5 h-5 block rounded-full bg-primary-500 animate-[floating_9s_infinite]"></span>
                        <span class="absolute left-[-150px] bottom-[150px] w-5 h-5 block rounded-full bg-theme-bg-1 animate-[floating_7s_infinite]"></span>
                        <span class="absolute left-[-100px] bottom-[-100px] w-[300px] h-[300px] block rounded-full bg-theme-bg-2 animate-[floating_9s_infinite]"></span>
                    </div>
                    <div class="card sm:my-12 w-full shadow-none">
                        <div class="card-body !p-10">
                            <div class="text-center mb-8">
                                <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/logo-dark.svg') }}" alt="img" class="mx-auto auth-logo"/></a>
                            </div>
                            <h4 class="text-center font-medium mb-4">Sign up</h4>
                            
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                
                                <div class="grid grid-cols-12 gap-3 mb-3">
                                    <div class="col-span-12 sm:col-span-6">
                                        {{-- Field Name (Contoh: First Name) --}}
                                        <input type="text" class="form-control" placeholder="First Name" name="first_name" required autofocus>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6">
                                        {{-- Field Name (Contoh: Last Name) --}}
                                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    {{-- Field Email --}}
                                    <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                                </div>
                                <div class="mb-3">
                                    {{-- Field Password --}}
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                                <div class="mb-4">
                                    {{-- Field Confirm Password --}}
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                                </div>
                                
                                <div class="flex mt-1 justify-between items-center flex-wrap">
                                    <div class="form-check">
                                        <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" />
                                        <label class="form-check-label text-muted" for="customCheckc1">I agree to all the Terms &amp; Condition</label>
                                    </div>
                                </div>
                                
                                <div class="mt-4 text-center">
                                    <button type="submit" class="btn btn-primary mx-auto shadow-2xl">Sign up</button>
                                </div>
                            </form>

                            <div class="flex justify-between items-end flex-wrap mt-4">
                                <h6 class="font-medium mb-0">Already have an Account?</h6>
                                <a href="{{ route('login') }}" class="text-primary-500">Login</a>
                            </div>
                            <div class="mt-4 text-center">
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm mx-auto">
                                    <i data-feather="arrow-left"></i> Back
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('scripts')
    @endpush