@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Projects</div>

                    <div class="card-body">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>User</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $key => $project)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->user?->name }}</td>
                                    <td>{{ $project->created_at?->format('d.m.Y H:i:s') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            {{ $projects->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
