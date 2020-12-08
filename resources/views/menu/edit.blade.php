@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="card-title">
                                {{ __('Edit') }} {{ $menu->name }}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('menu.update', ['menu' => $menu]) }}">
                            @csrf
                            @method('PUT')
                            @include('menu.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
