@extends('layouts.superAdmin')
@section('title',$roles->exists ? 'Editer Roles' : 'Ajouter Roles')
@section('content')
<h1>@yield('title')</h1>
<div class="mb-3">
    <form action="{{ route($roles->exists ? 'super.roles.update' : 'super.roles.store',$roles) }}" method="post">
        @csrf
        @method( $roles->exists ? 'put' : 'post')
        <label for="roles" class="form-label">Role Name</label>
    <input type="text" class="form-control  @error('name') is-invalid @enderror " id="name" value="{{ old('name',$roles->name) }}" name="name" aria-describedby="textHelp">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <button type="submit" class="btn btn-secondary m-4">
            {{ $roles->exists ? 'update' : 'Create' }}
        </button>
    </form>
</div>
@endsection
