@extends('layouts.superAdmin')
@section('title',$permissions->exists ? 'Editer Permission' : 'Creer Une Permission')
@section('content')
@yield('title')
<form action="{{ route($permissions->exists ? 'super.permission.update' : 'super.permission.store',$permissions) }}" method="post">
    @csrf
    @method($permissions->exists ? 'put' : 'post')
    <div class="mb-3">
        <label for="name" class="form-label">Permissions Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$permissions->name) }}" aria-describedby="textHelp">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-secondary">
        {{ $permissions->exists ? 'Update' : 'Create' }}
    </button>
</form>

@endsection
