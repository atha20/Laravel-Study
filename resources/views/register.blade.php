<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 9 | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<style>
    .register-box {
        border: solid 1px;
        width: 500px;
        padding: 20px;
        box-sizing: border-box;
    }
</style>

<body>

    <div class="vh-100 d-flex justify-content-center align-items-center flex-column">
        {{-- @if (Session::has('status'))
            <div class="alert alert-danger login-box center text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif --}}

        <div class="register-box">
            <form action="register" method="POST">  
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                {{-- <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div> --}}
                <div class="mb-3">
                    <button class="btn btn-primary form-control" type="submit">Register</button>
                </div>
                <div class="mb-3">
                    <a href="/login" class="btn btn-success form-control" type="submit">Back</a>
                </div>
        </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>