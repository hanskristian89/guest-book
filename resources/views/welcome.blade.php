@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">Welcome, Guest</h1>
                        <p class="text-lead text-light">
                            Submit your data here.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="title">Add Guest Data</h5>
        </div>
        <form method="post" action="/store" autocomplete="off">
            <div class="card-body">
                @csrf

                @if (\Session::has('info'))
                    <div class="alert alert-success alert-dismissible" id="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{ \Session::get('info') }}
                    </div>
                @endif

                <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                    <label>{{ __('First Name') }}</label>
                    <input type="text" name="first_name"
                        class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                        placeholder="{{ __('First Name') }}">
                </div>

                <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                    <label>{{ __('Last Name') }}</label>
                    <input type="text" name="last_name"
                        class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                        placeholder="{{ __('Last Name') }}">
                </div>

                <div class="form-group{{ $errors->has('organization') ? ' has-danger' : '' }}">
                    <label>{{ __('Organization') }}</label>
                    <input type="text" name="organization"
                        class="form-control{{ $errors->has('organization') ? ' is-invalid' : '' }}"
                        placeholder="{{ __('Organization') }}">
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                    <label>{{ __('Address') }}</label>
                    <input type="text" name="address"
                        class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                        placeholder="{{ __('Address') }}">
                </div>

                <div id="province" class="form-group{{ $errors->has('province') ? ' has-danger' : '' }}">
                    <label>{{ __('Province') }}</label>
                    <select id="input--province" class="form-control" name="province">
                        <option style="color: black" value="" selected disabled>Province</option>
                        @foreach ($province as $p)
                            <option style="color: black" value="{{ $p->id }}">{{ $p->nama }}</option>
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
