@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login.phone') }}">
        @csrf
        <div class="form-group">
            <label for="token" class="col-form-label">SMS Code</label>
            <input type="text" id="token" class="form-control{{ $errors->has('token') ? ' is-invalid' : '' }}" name="token" value="{{ old('token') }}" required>
            @if($errors->has('token'))
                <span class="invalid-feedback"><strong>{{ $errors->first('token') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Verify</button>
        </div>
    </form>
@endsection