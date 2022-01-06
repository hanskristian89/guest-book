@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Guest Book Table</h4>
                    <a href="{{ route('pages.add_tables') }}" class="btn btn-info">Add Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        First Name
                                    </th>
                                    <th>
                                        Last Name
                                    </th>
                                    <th>
                                        Organization
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        Province
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guest as $g)
                                    @if ($g->state == 'Active')
                                        <tr>
                                            <td>
                                                {{ $g->first_name }}
                                            </td>
                                            <td>
                                                {{ $g->last_name }}
                                            </td>
                                            <td>
                                                {{ $g->organization }}
                                            </td>
                                            <td>
                                                {{ $g->address }}
                                            </td>
                                            <td>
                                                {{ $g->provinces->nama }}
                                            </td>
                                            <td>
                                                {{ $g->cities->nama }}
                                            </td>
                                            <td>
                                                <a href="{{ route('pages.edit_tables', [$g->id]) }}"
                                                    class="btn btn-success">Edit</a>
                                                    <a href="/delete-guest/{{$g->id}}"
                                                    class="btn btn-danger" onclick="return confirm('Are you sure want to delete data: {{$g->first_name}} {{$g->last_name}}?')">Delete</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
