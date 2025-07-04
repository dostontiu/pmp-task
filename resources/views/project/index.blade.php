@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Projects
                        <button type="button" class="btn btn-success" style="margin-left: 10px;" data-toggle="modal" data-target="#createModal">Add</button>
                    </div>

                    <div class="card-body">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $key => $project)
                                <tr>
                                    <td>{{ $projects->firstItem() + $key }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->user?->name }}</td>
                                    <td>{{ $project->created_at?->format('d.m.Y H:i:s') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-primary btn-sm edit-btn" type="button" data-id="{{ $project->id }}">Edit</button>
                                            <form action="{{ route('project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Do you really want to submit the form?');">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm delete-btn" type="submit" data-id="{{ $project->id }}">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            {{ $projects->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add new project</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('project.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Description</label>
                                <textarea class="form-control" name="description" placeholder="Description"></textarea>
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

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit project</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" class="edit-modal-form">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Description</label>
                                <textarea class="form-control" name="description" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('pageScript')
    <script>
        $('document').ready(function() {
            $('.edit-btn').on('click',function (){
                let id = $(this).data('id')
                $.ajax({
                    method: 'GET',
                    url: `{{ url(route('project.edit', ":id" )) }}`.replace(':id', id),
                    success:function(data){
                        let action = `{{ url(route('project.update', ":id" )) }}`.replace(':id', id);
                        $('#editModal').modal('show')
                        $(".edit-modal-form input[name='name']").val(data.name)
                        $(".edit-modal-form textarea[name='description']").val(data.description)
                        $('.edit-modal-form').attr('action', action);
                    },
                    error: function (jqXHR, exception) {
                        alert('Error ' + jqXHR.status);
                    },
                });
            });
        });
    </script>
@endpush
