@extends('layouts.app')

@section('content')

    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Добавить продукт</h5>
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="article" class="form-label">Артикул</label>
                    <input type="text" class="form-control" id="article" value="{{ old('article') }}">
                    @if ($errors->has('article'))
                        <span class="text-danger">{{ $errors->first('article') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" class="form-control" id="name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Статус</label>
                    <select class="form-select" id="status">
                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Доступен</option>
                        <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Не доступен</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Атрибуты</label>
                    <div class="form-group">
                        <label for="color">Цвет</label>
                        <input type="text" name="color" id="color" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="size">Размер</label>
                        <input type="text" name="size" id="size" class="form-control">
                    </div>
                    <div class="add-attribute">+ Добавить атрибут(в доработке)</div>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>











@endsection
