@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="card-title">
                            {{ __('Menu') }}
                        </div>
                        @can('menu.export')
                            <div class="col-md-2 pull-right">
                                <a href="{{ route('menu.export') }}"><i class="fa fa-file-excel"></i></a>
                            </div>
                        @endcan
                        @can('menu.create')
                            <div class="col-md-2 pull-right">
                                <a href="{{ route('menu.create') }}"><i class="fa fa-plus"></i></a>
                            </div>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Order') }}</th>
                            @can('menu.edit')
                                <th>{{ __('Edit') }}</th>
                            @endcan
                            @can('menu.delete')
                                <th>{{ __('Delete') }}</th>
                            @endcan
                        </tr>
                        @foreach($menus as $menu)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><a href="{{ route('menu.show', ['menu' => $menu]) }}">{{ $menu->name }}</a></td>
                            <td><a href="{{ route('menu.order', ['menu' => $menu]) }}"><i class="fa fa-shopping-cart"></i></a></td>
                            @can('menu.edit')
                                <td><a href="{{ route('menu.edit', ['menu' => $menu]) }}"><i class="fa fa-pen"></i></a></td>
                            @endcan
                            @can('menu.delete')
                                <td>
                                    <a href="{{ route('menu.delete', ['menu' => $menu]) }}" onclick="event.preventDefault();document.getElementById('delete-form-{{ $menu->id }}').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-form-{{ $menu->id }}" action="{{ route('menu.delete', ['menu' => $menu]) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            @endcan
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
