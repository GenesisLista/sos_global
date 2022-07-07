@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('assign-customer.index') }}" class="btn btn-primary">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('assign-customer.update', $user_details->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')    
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="assign_group" class="form-label">Assign Group</label>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="assign_group">
                                <option value="">Select group</option>
                                @foreach($group as $groupList)
                                <option value="{{ $groupList->id }}" {{ $customer == null ? '' : ($customer->group_id == $groupList->id ? 'selected' : '') }}>{{ $groupList->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('assign_group'))
                            <span class="text-danger">{{ $errors->first('assign_group') }}</span>
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