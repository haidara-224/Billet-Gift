@extends('layouts.superAdmin')
@section('content')
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
<h1>Gestion des Permissions</h1>
<a href="{{ route('super.permission.create') }}" class="btn btn-info m-2">Ajouter</a>
<form action="" method="get">
    <input type="search" name="name" value="{{ $input['name'] ?? '' }}" id="" class="form-control m-3" placeholder="Rechercher Une Permission">

</form>
<div
    class="table-responsive-sm"
>
    <table
        class="table table-striped-columns table-hover table-borderless table-primary align-middle"
    >
        <thead class="table-light">
            <caption>
                Billet Gift Permissions
            </caption>
            <tr>
                <th class="text-secondary">ID</th>
                <th class="text-secondary">Permissions</th>
                <th class="text-secondary">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($permissions as $permission)
            <tr
            class="table-primary"
        >
            <td scope="row">{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td class="d-flex">
                <a href="{{ route('super.permission.show',$permission) }}" class="btn btn-success mr-3">Roles</a>
                <a href="{{ route('super.permission.edit',$permission) }}" class="btn btn-success mr-3">Editer</a>
                <form action="{{ route('super.permission.destroy',$permission) }}" method="POST">
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
    {{ $permissions->links() }}
</div>


@endsection
