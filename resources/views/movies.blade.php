@extends('layouts.app');

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
            <form method="post" action="{{ route('movie.store') }}">
                <div class="form-group">
                    @csrf
                </div>
                <div class="form-group">
                    <label for="movie">Select a Movie:</label>

                    <select name="movie" id="movie">
                        <option value="1">Movie 1</option>
                        <option value="2">Movie 2</option>
                    </select>
                </div>
                 <div class="form-group">
                    <label for="cinema">Select a Cinema:</label>

                    <select name="cinema" id="cinema">
                        <option value="1">Cinema 1</option>
                        <option value="2">Cinema 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="theater">Select a theater:</label>

                    <select name="theater" id="theater">
                        <option value="1">Theater 1</option>
                        <option value="2">Theater 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        Showing Time
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control datetimepicker" name="show_time">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Movie</button>
            </form>
            <script type="text/javascript">
                $(function () {
                    $('.datetimepicker').datetimepicker({
                        format: 'YYYY-MM-DD HH:mm'
                    });
                });
            </script>
@endsection
