@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('group.create') }}" class="btn btn-primary">Add</a>
                </div>

                <div class="card-body">
                    @if(session('success_add'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success_add') }}
                    </div>
                    @elseif(session('success_update'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success_update') }}
                    </div>
                    @elseif(session('success_deleted'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success_deleted') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($group as $groupList)
                            <tr>
                                <td>{{ $groupList->name }}</td>
                                <td style="width: 200px;">
                                    <a href="{{ route('group.edit', $groupList->id) }}" class="btn btn-warning">Update</a>
                                    @if($groupList->customers == null && count($groupList->users) == 0)
                                    <form method="post" action="{{ route('group.destroy', $groupList->id) }}" style="float: right;">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                    @endif
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