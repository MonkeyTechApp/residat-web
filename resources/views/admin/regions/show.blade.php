@extends('admin.layouts.admin')

@section('title', __('views.admin.regions.show.title', ['name' => $region->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

            <tr>
                <th>{{ __('views.admin.regions.show.table_header_0') }}</th>
                <td>{{ $region->name }}</td>
            </tr>
            <tr>
                <th>{{ __('views.admin.regions.show.table_header_1') }}</th>
                <td>{{ $region->country->name }}</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.regions.show.table_header_2') }}</th>
                <td>
                    @if($region->active)
                        <span class="label label-primary">{{ __('views.admin.regions.show.active') }}</span>
                    @else
                        <span class="label label-danger">{{ __('views.admin.regions.show.inactive') }}</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>{{ __('views.admin.regions.show.table_header_3') }}</th>
                <td>{{ $region->created_at }} ({{ $region->created_at->diffForHumans() }})</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.regions.show.table_header_4') }}</th>
                <td>{{ $region->updated_at }} ({{ $region->updated_at->diffForHumans() }})</td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection
