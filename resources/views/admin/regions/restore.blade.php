@extends('admin.layouts.admin')

@section('title', __('views.admin.regions.index.title-restore'))

@section('content')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('email', __('views.admin.regions.index.table_header_0'),['page' => $regions->currentPage()])</th>
                <th>@sortablelink('name',  __('views.admin.regions.index.table_header_1'),['page' => $regions->currentPage()])</th>
                <th>{{ __('views.admin.regions.index.table_header_2') }}</th>
                <th>@sortablelink('active', __('views.admin.regions.index.table_header_3'),['page' => $regions->currentPage()])</th>
                <th>@sortablelink('active', __('views.admin.regions.index.table_header_4'),['page' => $regions->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($regions as $region)
                <tr>
                    <td>{{ $region->name }}</td>
                    <td>{{ $region->Country->name }}</td>
                    <td>
                        @if($region->active)
                            <span class="label label-primary">{{ __('views.admin.regions.index.active') }}</span>
                        @else
                            <span class="label label-danger">{{ __('views.admin.regions.index.inactive') }}</span>
                        @endif
                    </td>

                    <td>{{ $region->created_at }}</td>
                    <td>{{ $region->updated_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.regions.restore-country', [$region->id]) }}"
                           data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.regions.index.restore') }}">
                            <i class="fa fa-undo"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $regions->links() }}
        </div>
    </div>
@endsection
