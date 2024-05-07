@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userProduct.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-products.update", [$userProduct->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="productid_id">{{ trans('cruds.userProduct.fields.productid') }}</label>
                <select class="form-control select2 {{ $errors->has('productid') ? 'is-invalid' : '' }}" name="productid_id" id="productid_id">
                    @foreach($productids as $id => $entry)
                        <option value="{{ $id }}" {{ (old('productid_id') ? old('productid_id') : $userProduct->productid->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('productid'))
                    <span class="text-danger">{{ $errors->first('productid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userProduct.fields.productid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.userProduct.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $userProduct->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userProduct.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.userProduct.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $userProduct->status) }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userProduct.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection