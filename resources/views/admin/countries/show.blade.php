@extends('admin.layouts.admin')

@section('title', __('views.admin.countries.show.title', ['name' => $country->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

            <tr>
                <th>{{ __('views.admin.countries.show.table_header_0') }}</th>
                <td>{{ $country->name }}</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.countries.show.table_header_1') }}</th>
                <td>
                    @if($country->active)
                        <span class="label label-primary">{{ __('views.admin.countries.show.active') }}</span>
                    @else
                        <span class="label label-danger">{{ __('views.admin.countries.show.inactive') }}</span>
                    @endif
                </td>
            </tr>

{{--            <tr>--}}
{{--                <th>{{ __('views.admin.countries.show.table_header_6') }}</th>--}}
{{--                <td>{{ $country->created_at }} ({{ $country->created_at->diffForHumans() }})</td>--}}
{{--            </tr>--}}

{{--            <tr>--}}
{{--                <th>{{ __('views.admin.countries.show.table_header_7') }}</th>--}}
{{--                <td>{{ $country->updated_at }} ({{ $country->updated_at->diffForHumans() }})</td>--}}
{{--            </tr>--}}

            </tbody>
        </table>
    </div>
@endsection
