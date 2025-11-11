@extends('layouts.app')

@section('title', 'Sample Page')

@section('content')

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-header">
                    <h5>Hello card</h5>
                </div>
                <div class="card-body">
                    {{-- Di sini Anda bisa menambahkan konten halaman sampel Anda --}}
                    <p>Ini adalah konten dari Sample Page.</p>
                </div>
            </div>
        </div>
        </div>
    @endsection

@push('scripts')
    @endpush