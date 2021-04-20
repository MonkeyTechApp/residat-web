@extends('admin.layouts.admin')

@section('title',__('views.admin.zones.edit.title', ['name' => $zone->name]) )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.zones.update', $zone->id],'method' => 'put','class'=>'form-horizontal form-label-left']) }}

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                        {{ __('views.admin.zones.edit.name') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('name')) parsley-error @endif"
                               name="name" value="{{ $zone->name }}" required>
                        @if($errors->has('name'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('name') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 "> {{ __('views.admin.zones.edit.region') }}</label>
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <select name="region" class="select2_group form-control">
                            @foreach($countries as $country)
                                @if(count($country->regions) > 0)
                                <optgroup label="{{$country->name}}">
                                    @foreach($country->regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </optgroup>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 "> {{ __('views.admin.zones.edit.parent')}} </label>
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <select name="parent" class="select2_group form-control">
                            @foreach($zone->region->zones as $zone)
                                <option value="{{$zone->id}}">{{$zone->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if(auth()->user()->hasRole('administrator'))
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="active" >
                            {{ __('views.admin.zones.edit.active') }}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input id="active" type="checkbox" class="@if($errors->has('active')) parsley-error @endif"
                                           name="active" @if($zone->active) checked="checked" @endif value="1">
                                    @if($errors->has('active'))
                                        <ul class="parsley-errors-list filled">
                                            @foreach($errors->get('active') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </label>
                            </div>
                        </div>
                    </div>


                @endif

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('views.admin.zones.edit.cancel') }}</a>
                        <button type="submit" class="btn btn-success"> {{ __('views.admin.zones.edit.save') }}</button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection
