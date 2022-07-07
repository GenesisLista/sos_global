@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('group.index') }}" class="btn btn-primary">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('group.update', $group->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="group_name" class="form-label">Group name</label>
                            <input type="text" class="form-control" id="group_name" name="group_name" value="{{ $group->name }}">
                            @if($errors->has('group_name'))
                            <span class="text-danger">{{ $errors->first('group_name') }}</span>
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection