@extends('layouts.app')

@section('content')
    @include('admin.adverts.categories._nav')

    <form method="POST" action="{{ route('admin.adverts.categories.attributes.store', $category) }}">
        @csrf

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
            @if($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="name" class="col-form-label">Sort</label>
            <input type="text" id="name" class="form-control{{ $errors->has('sort') ? ' is-invalid' : '' }}" name="name" value="{{ old('sort') }}" required>
            @if($errors->has('sort'))
                <span class="invalid-feedback"><strong>{{ $errors->first('sort') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="name" class="col-form-label">Type</label>
            <select name="type" id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}">
                @foreach($types as $type => $label)
                    <option value="{{ $type }}"{{ $type == old('type') ? ' selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            @if($errors->has('type'))
                <span class="invalid-feedback"><strong>{{ $errors->first('type') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="name" class="col-form-label">Variants</label>
            <input type="text" id="name" class="form-control{{ $errors->has('sort') ? ' is-invalid' : '' }}" name="name" value="{{ old('variants') }}" required>
            @if($errors->has('variants'))
                <span class="invalid-feedback"><strong>{{ $errors->first('variants') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <input type="hidden" name="required" value="0">
            <div class="checkbox">
                <label for="">
                    <input type="checkbox" name="required" {{ old('required') ? 'checked' : '' }}>Required
                </label>
            </div>
            @if($errros->has('required'))
                <span class="invalid-feedback"><strong>{{ $errors->first('required') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection