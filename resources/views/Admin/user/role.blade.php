@extends('layouts.superAdmin')
@section('title','User-Role')
@section('content')
<h1>Donner un role a l'utilisateur {{ $user->name }}</h1>
<form action="{{ route('super.user.role',$user) }}" method="Post" class="row g-3">
    @csrf
  <div class="col-md-6">
    <label for="role" class="form-label">Role</label>
    <select name="role" id="role" class="form-select" id="role" required>
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
@if ($user->roles)

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Role Assigner A l'utilisateur</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->roles as $roles)
        <tr>
            <th scope="row">{{ $roles->id }}</th>
            <td>{{ $roles->name }}</td>
            <td>
                <form action="{{ route('super.role.user.revoke',[$user,$roles]) }}" method="Post">
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
