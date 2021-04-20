@extends('admin.layouts.admin')

@section('title', __('views.admin.regions.index.title'))

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
                    <td>{{ $region->country->name ?? 'Unknown' }}</td>
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
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.regions.show', [$region->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.regions.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.regions.edit', [$region->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.regions.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('administrator'))
                            <a href="{{ route('admin.regions.destroy', [$region->id]) }}" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.regions.index.delete') }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        @endif
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
