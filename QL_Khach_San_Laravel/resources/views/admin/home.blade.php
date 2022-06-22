@extends('layouts.admin')
@section('title')
Manager Admin
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard

                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @include('admin.Dashboard')











                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection
