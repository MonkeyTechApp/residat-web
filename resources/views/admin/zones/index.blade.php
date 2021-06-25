@extends('admin.layouts.admin')

@section('title', __('views.admin.zones.index.title'))

@section('content')
    <div class="pull-right">
        <a href="{{ route('admin.zones.create') }}">
            <button type="button" class="btn btn-secondary btn-sm fa-plus-circle">Create Zone</button> </a>
    </div>

    <div class="row">
        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>@sortablelink('email', __('views.admin.zones.index.table_header_0'),['page' => $zones->currentPage()])</th>
                <th>@sortablelink('name',  __('views.admin.zones.index.table_header_1'),['page' => $zones->currentPage()])</th>
                <th>{{ __('views.admin.zones.index.table_header_2') }}</th>
                <th>@sortablelink('active', __('views.admin.zones.index.table_header_3'),['page' => $zones->currentPage()])</th>
                <th>@sortablelink('active', __('views.admin.zones.index.table_header_4'),['page' => $zones->currentPage()])</th>
                <th>@sortablelink('active', __('views.admin.zones.index.table_header_5'),['page' => $zones->currentPage()])</th>
                <th>@sortablelink('active', __('views.admin.zones.index.table_header_6'),['page' => $zones->currentPage()])</th>
                <th>@sortablelink('active', __('views.admin.zones.index.table_header_7'),['page' => $zones->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($zones as $zone)
                <tr>
                    <td>{{ $zone->name }}</td>
                    <td>{{ $zone->mother->name ?? 'No parent'}}</td>
                    <td>
                        @if($zone->svg != null)
                            <span class="label label-primary">{{ __('views.admin.zones.index.active') }}</span>
                        @else
                            <span class="label label-warning">{{ __('views.admin.zones.index.inactive') }}</span>
                        @endif
                    <td>{{ $zone->image ?? 'No Image' }}</td>
                    <td>{{ $zone->level ?? 'Unknown' }}</td>
                    <td>
                        @if($zone->active)
                            <span class="label label-primary">{{ __('views.admin.zones.index.active') }}</span>
                        @else
                            <span class="label label-danger">{{ __('views.admin.zones.index.inactive') }}</span>
                        @endif
                    </td>

                    <td>{{ $zone->created_at }}</td>
                    <td>{{ $zone->updated_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.zones.show', [$zone->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.zones.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.zones.edit', [$zone->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.zones.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('administrator'))
                            <a href="{{ route('admin.zones.destroy', [$zone->id]) }}" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.zones.index.delete') }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $zones->links() }}
        </div>
    </div>
@endsection
