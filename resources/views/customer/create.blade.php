@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('customer.index') }}" class="btn btn-primary">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="voucher_code" class="form-label">Voucher Code</label>
                            <input type="text" class="form-control" id="voucher_code" name="voucher_code" value="{{ $voucher_code }}" readonly>
                            @if($errors->has('voucher_code'))
                            <span class="text-danger">{{ $errors->first('voucher_code') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection