@extends('layouts.superAdmin')
@section('title','roles')
@section('content')
<h1>Attribuer des Permissions a {{ $role->name }}</h1>
<form action="{{ route('super.role.permission',$role) }}" method="Post" class="row g-3">
    @csrf
  <div class="col-md-6">
    <label for="validationCustom04" class="form-label">Permissions</label>
    <select name="permission" id="permission" class="form-select" id="validationCustom04" required>
        @foreach ($permission as $permissions)
      <option selected value="{{ $permissions->name }}">{{ $permissions->name }}</option>
        @endforeach

    </select>

  </div>
  <div class="col-md-3 mt-5">
    <button type="submit" class="btn btn-secondary">Donner Une Permission</button>
  </div>


</form>
@if (session('info'))
<div class="alert alert-info">
    {{ session('info') }}
</div>

@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif
@if ($role->permissions)

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Permissions Attribuer au role</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($role->permissions as $permission)
        <tr>
            <th scope="row">{{ $permission->id }}</th>
            <td>{{ $permission->name }}</td>
            <td>
                <form action="{{ route('super.permission.revoke',[$role,$permission]) }}" method="Post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">Revoquer</button>
                </form>
            </td>

        </tr>
        @endforeach

    </tbody>
</table>



@else
<h1>Pas de permission accorder a ce role ....</h1>

@endif

@endsection
