@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.header.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.headers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.id') }}
                        </th>
                        <td>
                            {{ $header->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.title') }}
                        </th>
                        <td>
                            {{ $header->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $header->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.button') }}
                        </th>
                        <td>
                            {{ $header->button }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.link') }}
                        </th>
                        <td>
                            {{ $header->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.header.fields.photo') }}
                        </th>
                        <td>
                            @if($header->photo)
                                <a href="{{ $header->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $header->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.headers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection