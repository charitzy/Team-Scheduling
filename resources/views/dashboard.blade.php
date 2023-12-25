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
            width: 200px;
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

    <div class="container">
        <div class="dashboard-header">
            <h1>Team Scheduling System</h1>
        </div>

        <!-- Game Scheduling Form -->
        <div class="input-section">
            <form action="{{ route('games.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <!-- First Row - Three Columns -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="team1_name">Team 1 Name</label>
                            <input type="text" name="team1_name" class="form-control" placeholder="Name">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="team2_name">Team 2 Name</label>
                            <input type="text" name="team2_name" class="form-control" placeholder="Name">
                        </div>
                    </div>

                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row  mb-3">
                    <!-- Second Row - Two Columns -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field_name">Field Name</label>
                            <input type="text" name="field_name" class="form-control" placeholder="Input">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="referee_name">Referee Name</label>
                            <input type="text" name="referee_name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Schedule Game</button>
            </form>
        </div>




        <!-- Display Scheduled Matches -->
        <!-- <div class="display-section">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Team 1</th>
                        <th>Vs</th>
                        <th>Team 2</th>
                        <th>Date</th>
                        <th>Field</th>
                        <th>Referee</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($games as $game)
                    <tr>
                        <td>{{ $game->teams[0]->name ?? 'N/A' }}</td>
                        <td>Vs</td>
                        <td>{{ $game->teams[1]->name ?? 'N/A' }}</td>
                        <td>{{ $game->date->format('Y-m-d') ?? '' }}</td>
                        <td>{{ $game->field->name ?? '' }}</td>
                        <td>{{ $game->referee->name ?? '' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No scheduled matches</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div> -->

        <!-- Display Tournament Button -->

        <!-- Display Tournament Button -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-6 text-center">
                <a href="{{ route('tournament') }}" class="btn btn-success">See Tournament</a>
            </div>
            <div class="col-md-6 text-center">
                <a href="{{ route('scores.index') }}" class="btn btn-success">Go to Scores</a>
            </div>

        </div>



        <!-- make another div that the user will just select the two teams and input their scores then store in database  -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>