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
                    <form action="{{ route('assign-group-admin.update', $group_admin->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')    
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="group_name" class="form-label">Group Admin Name</label>
                            <p class="h5">{{ $group_admin->name }}</p> 
                        </div>

                        <div class="mb-3">
                            <?php $group_ids = array();?>
                            @foreach ($group_admin->groups as $group1)
                                <?php array_push($group_ids, $group1->id); ?>
                            @endforeach
                            <label for="group_name" class="form-label">Group Name </label>
                            <select class="form-select" name="assign_group[]" multiple aria-label="multiple select example">
                                @foreach($group as $groupList)
                                <option value="{{ $groupList->id }}" {{ (collect($group_ids)->contains($groupList->id)) ? 'selected':'' }}>{{ $groupList->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection