<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!-- Pills navs -->
    <div class="row col-md-6 m-auto">
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="#pills-register"
                    role="tab" aria-controls="pills-register" aria-selected="true">Register</a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->
        <div class="tab-content">

            <div id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form action="{{ url('user-create') }}" method="POST">
                    @csrf

                    <div class="form-outline mb-4">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <input type="text" id="registerName" class="form-control" name="name" />
                        <label class="form-label" for="registerName">Name</label>
                    </div>


                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input type="email" id="registerEmail" class="form-control" name="email" />
                        <label class="form-label" for="registerEmail">Email</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input type="password" id="registerPassword" class="form-control" name="password" />
                        <label class="form-label" for="registerPassword">Password</label>
                    </div>

                    <!-- Repeat Password input -->
                    <div class="form-outline mb-4">
                        @error('rpassword')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input type="password" id="registerRepeatPassword" class="form-control" name="rpassword" />
                        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                            aria-describedby="registerCheckHelpText" />
                        <label class="form-check-label" for="registerCheck">
                            I have read and agree to the terms
                        </label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-3">Sign up</button>
                </form>
            </div>
        </div>
        <!-- Pills content -->

    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
</body>

</html>
