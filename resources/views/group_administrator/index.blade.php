@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">
                    <a href="" class="btn btn-primary">Add</a>
                </div> -->

                <div class="card-body">
                    @if(session('success_remove'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success_remove') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Customer Group</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user_group as $userGroupList)
                            <tr>
                                <td>{{ $userGroupList->users->name }}</td>
                                <td>{{ $userGroupList->groups->name }}</td>
                                <td style="width: 200px;">
                                    <a href="{{ route('group-administrator.show', $userGroupList->users->id) }}" class="btn btn-warning">View</a>
                                    <form method="post" action="{{ route('group-administrator.destroy', $userGroupList->users->id) }}" style="float: right;">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
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