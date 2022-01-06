@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title"> Welcome to Administrator Page</h4>
        </div>
      </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
