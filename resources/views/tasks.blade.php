@extends('layouts.app')
@section('content')
    {{-- Bootstrap Boilerplate --}}
    <div class=" panel-body">
        {{-- Display Validation Errors --}}
        @include('common.errors')
        {{-- New Task Form --}}
        <form action="/task" method="POST" class=" form-horizontal">
            {{ csrf_field() }}

            {{-- Task Name --}}
            <div class=" form-group">
                <label for="task" class=" col-sm-3 control-label">Task</label>

                <div class=" col-sm-6">
                    <input type="text" name="name" id="task-name" class=" form-control">
                </div>
            </div>

            {{-- Add Task Button --}}
            <div class=" from-group">
                <div class=" col-sm-offest-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class=" fa fa-plus">Add Task</i>
                    </button>
                </div>
            </div>
        </form>

    </div>
    @if (count($tasks) > 0)
        <div class=" panel panel-default">
            <div class="panel-heading">
                Current Tasks {{ count($tasks) }}
            </div>
            <div class=" panel-body">
                <table class=" table table-striped task-table">
                    {{-- Table Heading  --}}
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>
                    {{-- Table Body --}}
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                {{-- Todo: Update Button --}}
                                <form action="/task/{{ $task->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    {{-- Task Name --}}
                                    <td class=" table-text">
                                        <input type="text" value={{ $task->name }} name="name" id="task-name"
                                            class=" form-control">
                                    </td>

                                    <td>
                                    <td>
                                        <button type="submit">Update</button>
                                    </td>
                                </form>
                                {{-- Todo: Delete Button --}}
                                <td>
                                    <form action="/task/{{ $task->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button>Delete</button>
                                    </form>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
