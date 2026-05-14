@extends('_layout')
@section('title', "Create record")

@section('body')
    <h1>Create record</h1>
    <hr>
    <form action="{{ url('save') }}" method="post" onsubmit="return confirm('Desea realizar la operacion?')">
        @csrf
        <label class="form-label" for="description">Description</label>
        <br>
        <input class="form-control" type="text" name="description" placeholder="item-description" required>
        <br>
        <button class="btn btn-success" type="submit">Save</button>
        <a href="{{ url('records') }}" class="btn btn-secondary">Cancel</a>
        @error('Description')
            <h2>{{ $message }}</h2>
        @enderror
    </form>
@endsection
