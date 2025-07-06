@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="text-center">{{ $project->name }}</h1>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Add new Task</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @foreach($project->tasks as $key => $task)
                    <div class="card border-info mb-3">
                        <h5 class="card-header">{{ $task->name }}</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="card-title">{{ $task->description }}</h5>
                                </div>
                                <div class="col-1">
                                    @if($task->status == \Modules\Task\Enums\TaskStatus::ASSIGNED)
                                        <a href="#" class="btn btn-primary">Accept</a>
                                    @elseif($task->status == \Modules\Task\Enums\TaskStatus::ACCEPTED)
                                        <a href="#" class="btn btn-warning">Done</a>
                                    @elseif($task->status == \Modules\Task\Enums\TaskStatus::DONE)
                                        <a href="#" class="btn btn-success">Done!</a>
                                    @elseif($task->status == \Modules\Task\Enums\TaskStatus::REJECTED)
                                        <a href="#" class="btn btn-danger">Rejected</a>
                                    @endif
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-warning">{{ $task->status?->name }}</button>
                                </div>
                                <div class="col-12">
                                    <h4 class="text-primary">{{ $task->assignedUser?->name }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $task->user?->name }} |
                            {{ $task->created_at?->format('d.m.Y H:i:s') }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add new task for {{ $project->name }}</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('task.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <input type="hidden" name="status" value="{{ \Modules\Task\Enums\TaskStatus::ASSIGNED->value }}">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="col-md-12">
                                <label>Description</label>
                                <textarea class="form-control" name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label>Assigned user</label>
                                <select class="form-control" name="assigned_user_id">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('pageScript')
    <script>
        $('document').ready(function () {

        });
    </script>
@endpush
