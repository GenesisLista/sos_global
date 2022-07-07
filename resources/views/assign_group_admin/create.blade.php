@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('assign-group-admin.index') }}" class="btn btn-primary">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('assign-group-admin.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="group_name" class="form-label">Group Admin Name</label>
                            <select class="form-select form-select-lg mb-3" name="group_admin" aria-label=".form-select-lg example">
                                <option value="">Open this select menu</option>
                                @foreach($group_admin as $groupAdmin)
                                <option value="{{ $groupAdmin->id }}">{{ $groupAdmin->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="group_name" class="form-label">Group Name</label>
                            <select class="form-select" name="assign_group[]" multiple aria-label="multiple select example">
                                @foreach($group as $groupList)
                                <option value="{{ $groupList->id }}">{{ $groupList->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection