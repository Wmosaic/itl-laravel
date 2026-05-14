@extends('_layout')
@section('title', "Records")

@section('body')

    <h1>Records</h1>
    <hr>

    @if ($message = Session::get('message'))
        <h2>{{ $message }}</h2>
        <hr>
    @endif

    <table class="table table-sm w-auto table-striped table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>description</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr>
                    <td >{{$record->id}}</td>
                    <td>{{$record->description}}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ url('view/' . $record->id) }}" class="btn btn-secondary">Update</a>

                            <form action="{{ url('delete/' . $record->id) }}" method="POST" class="m-0">
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-success" href="{{ url('create') }}">Create</a>
@endsection
