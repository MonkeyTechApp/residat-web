@extends('admin.layouts.admin')

@section('title', __('views.admin.zones.show.title', ['name' => $zone->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

            <tr>
                <th>{{ __('views.admin.zones.show.table_header_0') }}</th>
                <td>{{ $zone->name }}</td>
            </tr>
            <tr>
                <th>{{ __('views.admin.zones.show.table_header_1') }}</th>
                <td>@if($zone->mother != null ){{ $zone->mother->name ?? 'No parent'}} @else {{ __('views.admin.no_parent') }} @endif</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.zones.show.table_header_3') }}</th>
                <td>
                    @if($zone->active)
                        <span class="label label-primary">{{ __('views.admin.zones.show.active') }}</span>
                    @else
                        <span class="label label-danger">{{ __('views.admin.zones.show.inactive') }}</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>{{ __('views.admin.zones.show.table_header_4') }}</th>
                <td>{{ $zone->created_at }} ({{ $zone->created_at->diffForHumans() }})</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.zones.show.table_header_5') }}</th>
                <td>{{ $zone->updated_at }} ({{ $zone->updated_at->diffForHumans() }})</td>
            </tr>

            </tbody>
        </table>
    </div>

    @section('title', __('views.admin.zones.show.sub_zone_of', ['name' => $zone->name]))
        <h4>{{ __('views.admin.zones.show.sub_zone_of', ['name' => $zone->name])}}</h4>
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('email', __('views.admin.zones.index.table_header_0'),['page' => $zone->children])</th>
                <th>@sortablelink('name',  __('views.admin.zones.index.table_header_1'),['page' => $zone->children])</th>
                <th>{{ __('views.admin.zones.index.table_header_2') }}</th>
                <th>@sortablelink('active', __('views.admin.zones.index.table_header_3'),['page' => $zone->children])</th>
                <th>@sortablelink('active', __('views.admin.zones.index.table_header_4'),['page' => $zone->children])</th>
                <th>@sortablelink('active', __('views.admin.zones.index.table_header_5'),['page' => $zone->children])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($zone->children as $child)
                <tr>
                    <td>{{ $child->name }}</td>
                    <td>{{ $child->mother->name ?? 'No parent'}}</td>
                    <td>{{ $child->region->name ?? 'Unknown' }}</td>
                    <td>
                        @if($child->active)
                            <span class="label label-primary">{{ __('views.admin.zones.index.active') }}</span>
                        @else
                            <span class="label label-danger">{{ __('views.admin.zones.index.inactive') }}</span>
                        @endif
                    </td>

                    <td>{{ $child->created_at }}</td>
                    <td>{{ $child->updated_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.zones.show', [$child->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.zones.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.zones.edit', [$child->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.zones.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('administrator'))
                            <a href="{{ route('admin.zones.destroy', [$child->id]) }}" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.zones.index.delete') }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h4>{{ __('views.admin.map', ['name' => $zone->name])}}</h4>
        {!! $zone->svg !!}
{{--        <div class="pull-right">--}}
{{--            {{ $zone->children->links() }}--}}
{{--        </div>--}}
    </div>
@endsection
