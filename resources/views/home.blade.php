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
                        <td>Tickets amount</td>
                        <td>Book</td>
                    </tr>
                @foreach($records as $record)
                    <tr>
                        <form method="post" action="{{ route('booking.store') }}">
                        <td>{{ $record->cinema }}</td>
                        <td>{{ $record->movie }}</td>
                &nbsp;       <td>{{ $record->show_time }}</td>
                        <td>
                            <input type="number" name="tickets"/>
                        </td>
                        <td></td>


                        <div class="form-group">
                            @csrf
                            <input type="hidden" name="cinema" value="{{ $record->cinema }}" />
                            <input type="hidden" name="movie" value="{{ $record->movie }}" />
                    &nbsp;       <input type="hidden" name="show_time" value="{{ $record->show_time }}" />
                        </div>
                        <td><button type="submit" class="btn btn-primary">Book</button></td>
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
