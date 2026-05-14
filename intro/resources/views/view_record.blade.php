@extends('_layout')
@section('title', "Update record")

@section('body')
    <h1>Update record</h1>
    <hr>
    <form action="{{ url('update/' . $record->id) }}" method="post" onsubmit="return confirm('Desea realizar la operacion?')">
        @csrf
        <label class="form-label" for="new-description">Description</label>
        <br>
        <input class="form-control" type="text" name="new-description" placeholder="item-description" required value="{{ $record->description }}">
        <br>
        <button class="btn btn-success"" type="submit">Save</button>
        <a href="{{ url('records') }}" class="btn btn-secondary">Cancel</a>
        @error('Description')
            <h2>{{ $message }}</h2>
        @enderror
    </form>
@endsection
