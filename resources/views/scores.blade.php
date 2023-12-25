<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Scheduling</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('/images/template.png');
            color: #ffffff;
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 900px;
            padding: 1rem;
            border-radius: 10px;
            margin: 2rem auto;
            box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.5);
        }

        .dashboard-header h1 {
            color: #DDA0DD;
            /* Styling the header to have a violet color */
            margin-bottom: 1rem;
        }

        .input-section {
            background: none;
            padding: 0.5rem;

        }

        .form-group {
            margin-bottom: 1rem;
            width: 350px;
        }

        .form-control {

            margin-bottom: 0.5rem;
        }

        .btn-primary {
            border: none;
            margin-top: 0.5rem;
        }

        h1 {
            text-align: center;
        }

        .display-section {
            background: none;
            padding: 0.5rem;
        }

        table {
            margin-top: 1rem;
            /* Space above the table */
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5);
            /* Shadow for depth */
        }

        table thead {
            background-color: #6A5ACD;
            color: white;
            /* Slate blue for the header */
        }

        table tbody tr:nth-child(odd) {
            background-color: #483D8B;
            /* Alternating row colors */
        }

        table tbody tr:nth-child(even) {
            background-color: #6A5ACD;
            /* Alternating row colors */
        }

        th,
        td {
            text-align: center;
            padding: 0.5rem;
            border: 1px solid #DDA0DD;
            color: white;
            /* Violet border for cells */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg ">
        <a href="{{ route('dashboard') }}" class="btn btn-success">Home</a>
    </nav>
    <div class="container">
        <div class="dashboard-header">
            <h1>Input Scores</h1>
        </div>

        <!-- Display Scores Form -->
        <div class="input-section">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif


            <form action="{{ route('storeGame') }}" method="post">
                @csrf
                <input type="hidden" name="game_id" value="{{ $gameId }}">

                @foreach($teams as $team)
                <div class="form-group">
                    <label for="scores[{{ $team->id }}]">{{ $team->name }} Score</label>
                    <input type="number" name="scores[{{ $team->id }}]" class="form-control" placeholder="Enter score for {{ $team->name }}" required>
                </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Submit Scores</button>
            </form>



        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>