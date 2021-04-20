@extends('admin.layouts.admin')

@section('title', __('views.admin.countries.index.title-restore'))

@section('content')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('email', __('views.admin.countries.index.table_header_0'),['page' => $countries->currentPage()])</th>
                <th>@sortablelink('name',  __('views.admin.countries.index.table_header_1'),['page' => $countries->currentPage()])</th>
                <th>{{ __('views.admin.countries.index.table_header_2') }}</th>
                <th>@sortablelink('active', __('views.admin.countries.index.table_header_3'),['page' => $countries->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($countries as $country)
                <tr>
                    <td>{{ $country->name }}</td>
                    <td>
                        @if($country->active)
                            <span class="label label-primary">{{ __('views.admin.countries.index.active') }}</span>
                        @else
                            <span class="label label-danger">{{ __('views.admin.countries.index.inactive') }}</span>
                        @endif
                    </td>

                    <td>{{ $country->created_at }}</td>
                    <td>{{ $country->updated_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.countries.restore-country', [$country->id]) }}"
                           data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.countries.index.restore') }}">
                            <i class="fa fa-undo"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $countries->links() }}
        </div>
    </div>
@endsection
