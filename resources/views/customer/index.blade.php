@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h5>Group Name: {{ $group->groups->name }}</h5>
            <div class="card">
                <div class="card-header">
                    @if($voucher_remaining != 0)
                    <a href="{{ route('customer.create') }}" class="btn btn-primary"> Add </a>
                    <span> <strong>Voucher Remaining : </strong></span> {{ $voucher_remaining }}
                    @else
                    <span> <strong>Voucher Remaining : </strong></span> {{ $voucher_remaining }}
                    @endif

                </div>

                <div class="card-body">
                    @if(session('success_add'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success_add') }}
                    </div>
                    @elseif(session('success_deleted'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success_deleted') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Voucher Code</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($voucher as $voucherList)
                            <tr>
                                <td>{{ $voucherList->code }}</td>
                                <td>
                                    <form method="post" action="{{ route('customer.destroy', $voucherList->id) }}">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $voucher->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection