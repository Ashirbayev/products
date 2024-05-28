@extends('layouts.app')

@section('content')

    <div class="content flex-grow-1">
        <div class="header">
            <h1>
                ПРОДУКТЫ
            </h1>
            <div class="user-info">
                Пользователь: {{ Auth::user()->name }}
            </div>
        </div>
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                        АРТИКУЛ
                    </th>
                    <th>
                        НАЗВАНИЕ
                    </th>
                    <th>
                        СТАТУС
                    </th>
                    <th>
                        АТРИБУТЫ
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>
                        {{ $product->article }}
                    </td>
                    <td>
                        {{ $product->name }}
                    </td>
                    <td>
                        {{ $product->status }}
                    </td>
                    <td>
                        {{ $product->color }}
                        <br/>
                        Размер: L
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <button onclick="window.location='{{ route('products.create') }}'" class="btn-add">
            Добавить
        </button>

    </div>
@endsection
{{--    <div class="container">--}}
{{--        <h1>Products</h1>--}}
{{--        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>--}}
{{--        <table class="table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>ID</th>--}}
{{--                <th>Article</th>--}}
{{--                <th>Name</th>--}}
{{--                <th>Status</th>--}}
{{--                <th>Actions</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach ($products as $product)--}}
{{--                <tr>--}}
{{--                    <td>{{ $product->id }}</td>--}}
{{--                    <td>{{ $product->article }}</td>--}}
{{--                    <td>{{ $product->name }}</td>--}}
{{--                    <td>{{ $product->status }}</td>--}}
{{--                    <td>--}}
{{--                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View</a>--}}
{{--                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>--}}
{{--                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}

