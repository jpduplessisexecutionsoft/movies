@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book a movie</div>
                <table>
                    <tr>
                        <td>Cinema</td>
                        <td>Movie</td>
                        <td>Show Time</td>
                        <td>Book</td>
                    </tr>
                @foreach($records as $record)
                    <tr>
                        <td>{{ $record->cinema }}</td>
                        <td>{{ $record->movie }}</td>
                &nbsp;       <td>{{ $record->show_time }}</td>
                        <td>

                    <form method="post" action="{{ route('booking.store') }}">
                        <div class="form-group">
                            @csrf
                            <input type="hidden" value="{{ $record->id }}" />
                        </div>
                        <button type="submit" class="btn btn-primary">Book</button>
                    </form>

                        </td>
                    </tr>
                @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
