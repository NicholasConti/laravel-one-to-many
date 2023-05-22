@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Edit Project') }}
        <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-success">Home</a>
    </h2>
    
    @include('partials.errors')

    <form action="{{ route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="project_name" class="form-label">Project Name</label>
            <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name" value="{{ old('project_name',$project->project_name) }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="2" name="description">{{ old('description',$project->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="programming_languages" class="form-label">Programmig Languages</label>
            <input type="text" class="form-control @error('programming_languages') is-invalid @enderror" id="programming_languages" name="programming_languages" value="{{ old('programming_languages',$project->programming_languages) }}">
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date',$project->start_date) }}">
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="set_image" name="set_image" value="1" @if($project->image) checked @endif>
            <label class="form-check-label" for="set_image">Upload Image?</label>
          </div>
        <div class="mb-3 @if(!$project->image) d-none @endif"  id="image-input-container">
            <!-- upload preview -->
            <div class="preview">
                <img id="file-image-preview" @if($project->image) src="{{ asset('storage/' . $project->image) }}" @endif>
            </div>
            <!-- /upload preview -->

            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
       </form>
</div>
@endsection
