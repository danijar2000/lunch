@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="card-title">
                                {{ __('Show item') }}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <span>{{ $menu->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
