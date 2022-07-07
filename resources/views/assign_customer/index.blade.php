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
                                <th scope="col">Customer Name</th>
                                <th scope="col">Group Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $customerList)
                            <tr>
                                <td>{{ $customerList->name }}</td>
                                <td>
                                    {{ $customerList->customer_groups != null ? $customerList->customer_groups->groups->name : '' }}
                                </td>
                                <td>
                                    <a href="{{ route('assign-customer.edit', $customerList->id) }}" class="btn btn-warning">Update</a>
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