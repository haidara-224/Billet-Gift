@extends('layouts.superAdmin')
@section('title','Roles')
@section('content')
<h1>Gestion des Roles</h1>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}

</div>

@endif
@if (session('danger'))
<div class="alert alert-danger">
    {{ session('danger') }}
</div>

@endif
<a href="{{ route('super.roles.create') }}" class="btn btn-info m-3">Ajouter</a>
<div
    class="table-responsive-sm"
>
    <table
        class="table table-striped-columns table-hover table-borderless table-primary align-middle"
    >
        <thead class="table-light">
            <caption>
                Billet Gift Roles
            </caption>
            <tr>
                <th class="text-secondary">ID</th>
                <th class="text-secondary">Roles</th>
                <th class="text-secondary">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($roles as $role)
            <tr
            class="table-primary"
        >
            <td scope="row">{{ $role->id }}</td>
            <td>{{ $role->name}}</td>
            <td class="d-flex">
                <a href="{{ route('super.roles.show',$role) }}" class="btn btn-success mr-3">Permissions</a>
                <a href="{{ route('super.roles.edit',$role) }}" class="btn btn-primary">Editer</a>
                <form action="{{ route('super.roles.destroy',$role) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>

            </td>
        </tr>

            @endforeach

        </tbody>
        <tfoot>

        </tfoot>
    </table>
    {{ $roles->links() }}
</div>


@endsection
