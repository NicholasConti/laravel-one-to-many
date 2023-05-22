@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Type') }}
        <a href="{{ route('admin.types.index') }}" class="btn btn-sm btn-success">Types Home</a>
    </h2>
    
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Type Name:{{ $type->name}}</h5>
        <p class="card-text">Slug: {{ $type->slug}}</p>
      </div>
      <div class="card-footer">
        <ul>
        @foreach ($type->projects as $project)
            <li>{{$project->project_name}}<a href="{{ route('admin.projects.edit', $project) }}" class="badge text-bg-warning">Edit Project</a></li> 
        @endforeach
        </ul>
      </div>
    </div>
    <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-sm btn-warning">Edit Type</a>
    
</div>
@endsection