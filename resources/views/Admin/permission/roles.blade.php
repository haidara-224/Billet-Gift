@extends('layouts.superAdmin')
@section('title','roles')
@section('content')
<h1>Assigner des Roles A la Permission:  {{ $permission->name }}</h1>
<form action="{{ route('super.permission.role',$permission) }}" method="Post" class="row g-3">
    @csrf
  <div class="col-md-6">
    <label for="validationCustom04" class="form-label">Role</label>
    <select name="role" id="role" class="form-select" id="validationCustom04" required>
        @foreach ($role as $roles)
      <option selected value="{{ $roles->name }}">{{ $roles->name }}</option>
        @endforeach

    </select>

  </div>
  <div class="col-md-3 mt-5">
    <button type="submit" class="btn btn-secondary">Assigner des roles</button>
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
@if ($permission->roles)

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Role Assigner A la Permission</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permission->roles as $roles)
        <tr>
            <th scope="row">{{ $roles->id }}</th>
            <td>{{ $roles->name }}</td>
            <td>
                <form action="{{ route('super.role.revoke',[$roles,$permission]) }}" method="Post">
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
