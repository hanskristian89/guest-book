@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="title">Edit Guest Data</h5>
    </div>
    <form method="post" action="{{ route('pages.update_tables', [$guest->id]) }}" autocomplete="off">
        <div class="card-body">
                @csrf
                @method('PUT')

                @include('alerts.success')

                <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                    <label>{{ __('First Name') }}</label>
                    <input type="text" name="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{$guest->first_name}}">
                </div>

                <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                    <label>{{ __('Last Name') }}</label>
                    <input type="text" name="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" value="{{$guest->last_name}}">
                </div>

                <div class="form-group{{ $errors->has('organization') ? ' has-danger' : '' }}">
                    <label>{{ __('Organization') }}</label>
                    <input type="text" name="organization" class="form-control{{ $errors->has('organization') ? ' is-invalid' : '' }}" placeholder="{{ __('Organization') }}" value="{{$guest->organization}}">
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                    <label>{{ __('Address') }}</label>
                    <input type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" value="{{$guest->address}}">
                </div>

                <div class="form-group{{ $errors->has('province') ? ' has-danger' : '' }}">
                    <label>{{ __('Province') }}</label>
                    <select class="form-control" name="province">
                        @foreach ($province as $p)
                            @if($guest->id_province==$p->id)
                                <option style="color: black" value="{{$p->id}}" selected>{{$p->nama}}</option>
                            @else
                                <option style="color: black" value="{{$p->id}}">{{$p->nama}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                    <label>{{ __('City') }}</label>
                    <select class="form-control" name="city">
                        @foreach ($city as $c)
                            @if($guest->id_city==$c->id)
                                <option style="color: black" value="{{$c->id}}" selected>{{$c->nama}}</option>
                            @else
                                <option style="color: black" value="{{$c->id}}">{{$c->nama}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
</div>
@endsection
