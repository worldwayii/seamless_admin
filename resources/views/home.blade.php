@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-6 col-md-offset-4">
                        <a href="{{url('companies')}}">
                            <button type="submit" class="btn btn-primary" style="margin-right: 20px;">
                                View Companies
                            </button> 
                        </a>
                        <a href="{{url('employees')}}">
                             <button type="submit" class="btn btn-primary" style="margin-left: 20px;">
                                View Employees
                             </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
