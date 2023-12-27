<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Page | Quiz Management</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.04);
            border-radius: .25rem;
        }

        .card .card-header {
            background-color: #fff;
            border-bottom: none;
        }
    </style>
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <div class="card shadow-lg border-0 rounded-lg mt-5 mx-auto" style="width: 30rem;">
                <h3 class="card-header display-1 text-muted text-center">
                    404
                </h3>

                <span class="card-subtitle mb-2 text-muted text-center">
                    Page Could Not Be Found
                </span>

                <div class="card-body mx-auto">
                    <a type="button" href="{{ route('dashboard') }}" class="btn btn-sm btn-info text-white"> Back To Dashboard </a>
                </div>
            </div>
        </div>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
