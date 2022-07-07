@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Customer Group</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $customerList)
                            <tr>
                                <td>{{ $customerList->users->name }}</td>
                                <td>{{ $customerList->groups->name }}</td>
                                <td>
                                    <a href="{{ route('list-customer.show', $customerList->user_id) }}" class="btn btn-warning">View</a>
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