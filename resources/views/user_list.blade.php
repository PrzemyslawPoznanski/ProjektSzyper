@extends('adminLte.dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="create_user"> Create New user</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                        <a class="btn btn-secondary" href="{{ route('users.show',$user->id) }}">Show</a>

                        <a class="btn btn-secondary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-secondary">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $users->links() !!}



@endsection
