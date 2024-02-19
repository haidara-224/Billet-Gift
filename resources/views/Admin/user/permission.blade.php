@extends('layouts.superAdmin')
@section('title','User-permission')
@section('content')
<h1>Donner une Permission a l'utilisateur {{ $user->name }}</h1>
<form action="{{ route('super.user.permission',$user) }}" method="Post" class="row g-3">
    @csrf
  <div class="col-md-6">
    <label for="permission" class="form-label">Permission</label>
    <select name="permission" id="permission" class="form-select" id="permission" required>
        @foreach ($permission as $permissions)
      <option selected value="{{ $permissions->name }}">{{ $permissions->name }}</option>
        @endforeach

    </select>

  </div>
  <div class="col-md-3 mt-5">
    <button type="submit" class="btn btn-secondary">Donner des Permissions</button>
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
@if ($user->permissions)

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Permission Donner A l'utilisateur</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->permissions as $permissions)
        <tr>
            <th scope="row">{{ $permissions->id }}</th>
            <td>{{ $permissions->name }}</td>
            <td>
                <form action="{{ route('super.user.revoke.permission',[$user,$permissions]) }}" method="Post">
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
