<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .form-control {
            width: 50%;
        }

        .alert-success {
            width: 500px;
            justify-content: center;
        }

        @media only screen and (max-width:600px) {
            .form {
                margin: 0;
            }

            .form-control {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-4">

                <form action="register-user" method="POST" class="form">

                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert">{{ Session::get('fail') }}</div>
                    @endif
                    @csrf
                    <h2>Registration</h2>
                    <hr>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value={{old('name')}}>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span><br>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value={{old('email')}}>
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span><br>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" id="password" value={{old('password')}}>
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span><br>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="tel" class="form-control" name="phone_number" id="phone_number" value={{old('phone_number')}}>
                        <span class="text-danger">
                            @error('phone_number')
                                {{ $message }}
                            @enderror
                        </span><br>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value={{old('address')}}>
                        <span class="text-danger">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </span><br>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary form-control" type="submit">Submit</button>
                        <a href="/login">Already Registered !! Login Here.</a>
                </form>
            </div>
        </div>
</body>

</html>
