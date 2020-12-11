@extends('layouts.master')
@section('styles')
    @include('layouts.partials.admin._styles')
@endsection

@section('body')
    <div class="flex h-screen">
        <!-- sidebar -->
        <x-admin.sidebar></x-admin.sidebar>
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="main-header">
                <div class="flex items-center">
                    <!-- hamburger -->
                </div>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto ">
                <div class="mx-auto px-6 py-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
@endsection
