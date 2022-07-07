@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('list-customer.index') }}" class="btn btn-primary">Back</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Voucher Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($voucher as $voucherList)
                            <tr>
                                <td>{{ $voucherList->code }}</td>
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