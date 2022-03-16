@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Movies</div>

                    <div class="card-body">
                        @foreach($records as $record)
                            Theater: {{ $record->theater }}
                            &nbsp;
                            Date and Time: {{ $record->show_time }}
                            <br/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

