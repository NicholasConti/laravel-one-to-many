@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
        <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-success">Create New Project</a>
    </h2>
    
    @include('partials.message')

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Project Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">Action</th>
              </tr>
        </thead>
        <tbody>
          @foreach ($projects as $project)
              <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->project_name}} @if ($project->image) <span class="badge text-bg-info">Image</span> @endif</td>
                <td>{{$project->start_date}}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-primary">Show</a>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#post-{{ $project->id }}">Delete</a>
                    {{-- <form action="{{ route('admin.projects.destroy', $project)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form> --}}
                </td>
              </tr>
              <div class="modal fade" id="post-{{ $project->id }}" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Attention</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you really want to delete this project?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      <form action="{{ route('admin.projects.destroy', $project)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach
        </tbody>
      </table>
</div>
@endsection