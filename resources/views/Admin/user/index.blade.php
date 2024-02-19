@extends('layouts.superAdmin')
@section('content')
<h1>Gestion des Utilisateurs</h1>
@if (session('danger'))
<div class="alert alert-danger">
    {{ session('danger') }}
</div>

@endif
<form action="" method="get">
    <input type="search" name="" id="" class="form-control m-3" placeholder="Rechercher Un Utilisateur">
</form>
<div
    class="table-responsive-sm"
>
    <table
        class="table table-striped-columns table-hover table-borderless table-primary align-middle"
    >
        <thead class="table-light">
            <caption>
                Billet Gift Utilisateurs
            </caption>
            <tr>
                <th class="text-secondary">ID</th>
                <th class="text-secondary">Names</th>
                <th class="text-secondary">Email</th>
                <th class="text-secondary">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($users as $user)
            <tr
            class="table-primary"
        >
            <td scope="row">{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td class="d-flex">
                <a href="{{ route('super.users.show',$user) }}" class="btn btn-success mr-3">Roles</a>
                <a href="{{ route('super.user.permission.show',$user) }}" class="btn btn-success mr-3">Permissions</a>
                <form action="{{ route('super.users.destroy',$user) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>

            </td>
        </tr>

            @endforeach

        </tbody>
        <tfoot>

        </tfoot>
    </table>
    {{ $users->links() }}
</div>


@endsection
