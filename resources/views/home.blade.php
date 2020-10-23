@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                    <table class="table border" id="myTable">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
