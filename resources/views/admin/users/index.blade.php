@extends('layouts.app')

@section('content')
<div class="container col-md-8">
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all User</h2>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($users ?? '' as $user)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
            <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}"><button type="submit" class="btn btn-primary float-left" >Edit</button></a>
                    <form method="post" action="{{ route('admin.users.destroy', $user->id) }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger float-left">Delete</button>
                    </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
