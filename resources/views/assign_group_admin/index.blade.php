@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success_add'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success_add') }}
                    </div>
                    @elseif(session('success_update'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success_update') }}
                    </div>
                    @endif
                  
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Group Administrator Name</th>
                                <th scope="col">Group Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @foreach($user->groups as $group)
                                        {{ $group->name }}@if (!$loop->last),@endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('assign-group-admin.edit', $user->id) }}" class="btn btn-warning">Update</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection