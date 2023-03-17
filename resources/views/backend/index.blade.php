@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Command List</h1>
        <a href="{{ url('admin/commands/0') }}">
            <button class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                </svg></button> </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>command_id</th>
                    <th>parent_id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commands as $command)
                    <tr>
                        <td scope="row"> <a href="{{ url('admin/commands/' . $command['command_id']) }}">
                            <button type="button" class="btn btn-default">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z" />
                                </svg>
                            </button>
                        </a>
                        </td>
                        <form action="{{ url('admin/commands/update/' . $command['command_id']) }}" method="POST">
                            {{ csrf_field() }}
                            <td><input type="text" name="command_id" placeholder="command_id"
                                    value="{{ $command['command_id'] }}"></td>
                            <td><input type="text" name="parent_id" placeholder="parent_id"
                                    value="{{ $command['parent_id'] }}"></td>
                            <td><input type="text" name="name" placeholder="name" value="{{ $command['name'] }}"></td>
                            <td><textarea name="description" id="description" cols="20"
                                    rows="1">{{ $command['description'] }}</textarea></td>
                            <td><input type="submit" class="btn btn-warning" value="Edit"></td>

                        </form>

                        <td>
                            <form action="{{ url('admin/commands/delete/' . $command['command_id']) }}" method="POST">
                                <input name="" id="" class="btn btn-danger" type="submit" value="delete">
                                {!! method_field('delete') !!}
                                {!! csrf_field() !!}
                            </form>
                        </td>
                    </tr>


                @endforeach
                <tr>
                    <form action="{{ route('admin.commands.store') }}" method="POST">
                        {{ csrf_field() }}
                        <td></td>
                        <td><input type="text" name="command_id" placeholder="Enter command id"
                                value="{{ $newCommand_id + 1 }}"></td>
                        <td><input type="text" name="parent id" placeholder="Enter parent id"
                                value="{{ $command['parent_id'] ?? array_slice(explode('/', $_SERVER['REQUEST_URI']), -1)[0] }}">
                        </td>
                        <td><input type="text" name="name" placeholder="name"></td>
                        <td><textarea name="description" id="description" cols="20" rows="5"></textarea></td>
                        <td></td>
                        <td><input name="" id="" class="btn btn-primary" type="submit" value=" ADD "></td>
                    </form>
                </tr>

            </tbody>
        </table>

    </div>
@endsection
