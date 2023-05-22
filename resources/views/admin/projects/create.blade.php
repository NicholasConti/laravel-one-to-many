@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('New Project') }}
    </h2>

    @include('partials.errors')
    
   <form action="{{ route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="project_name" class="form-label">Project Name</label>
        <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name" value="{{ old('project_name') }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="2" name="description">{{ old('description') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="programming_languages" class="form-label">Programmig Languages</label>
        <input type="text" class="form-control @error('programming_languages') is-invalid @enderror" id="programming_languages" name="programming_languages" value="{{ old('programming_languages') }}">
    </div>
    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
         <!-- image preview -->
         <div class="preview">
            <img id="file-image-preview" class="img-thumbnail">
        </div>
        <!-- /image preview -->
    </div>
    <div class="mb-3">
        <label for="type_id" class="form-label">Type</label>
        <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
            <option value="">Select type</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   </form>
</div>
@endsection
