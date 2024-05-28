<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Note OnLine</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

    <div class="container-fluid d-flex align-items-center justify-content-center vh-100 ">
        <div class="text-center bg-dark text-white p-5 rounded">
            <h1 class="display-4 font-weight-bold">Welcome to Note Online</h1>
            <p class="lead">Your personal online note-taking app</p>
            <hr class="my-4" />
            <p>Capture and Organize Your Notes Seamlessly and save it on cloud</p>
            <a class="btn btn-light btn-lg" href="{{ route('login') }}" role="button">Login</a>
            <a class="btn btn-light btn-lg" href="{{ route('register') }}" role="button">Register</a>
        </div>
    </div>

</body>
</html>
