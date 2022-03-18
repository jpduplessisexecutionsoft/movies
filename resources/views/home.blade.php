@extends('layouts.app')

@section('content')
<div class="container">
    @if (isset($codes))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book a movie</div>
                <table>
                    <tr>
                        <td>Cinema</td>
                        <td>Movie</td>
                        <td>Show Time</td>
                        <td>Ticket(s)</td>
                        <td>Redemption code</td>
                        <td>Cancel</td>
                    </tr>
                    @foreach($codes as $record)
                        <tr>

                                <td>{{ $record->cinema }}</td>
                                <td>{{ $record->movie }}</td>
                        &nbsp;       <td>{{ $record->show_time }}</td>
                                <td>{{ $record->tickets }}</td>
                                <td>{{ $record->code }}</td>
                                <td>

                                @if(\Carbon\Carbon::parse($record->show_time)->lt(\Carbon\Carbon::now()->subHour()))
                                    Movie has past


                                    @else
                                    <div class="form-group">
                                        <form action="{{ route('booking.destroy', $record->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        <form method="get" action="{{ route('booking.destroy', ['booking' => $record]) }}">
                            <td><button type="submit" class="btn btn-danger">Cancel</button></td>



                            @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @endif
    </div>
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
                        @if(\Carbon\Carbon::parse($record->show_time)>\Carbon\Carbon::now())
                    <tr>
                        <form method="post" action="{{ route('booking.store') }}">
                        <td>{{ $record->cinema }}</td>
                        <td>{{ $record->movie }}</td>
                &nbsp;       <td>{{ $record->show_time }}</td>
                        <td>
                            <input type="number" name="tickets"/>
                        </td>
                        <td>


                        <div class="form-group">
                            @csrf
                            <input type="hidden" name="cinema" value="{{ $record->cinema }}" />
                            <input type="hidden" name="movie" value="{{ $record->movie }}" />
                            <input type="hidden" name="show_time" value="{{ $record->show_time }}" />
                        </div>
                        <td><button type="submit" class="btn btn-primary">Book</button></td>
                    </form>

                        </td>
                    </tr>
                        @endif
                @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
