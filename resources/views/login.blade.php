<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login de usuario</title>
</head>
<body style="background: #eeeeee;">
    <div class="container">
        <div class="row">
            <div class="col col-sm-3"></div>

            <div class="col col-sm-6">
                <div class="card" style="margin-top: 100px;">
                    <div class="card-body">
                        <?php
                            if (isset($error)) {
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                        {{$error}}
                                    </div>
                                <?php
                            } else if (isset($message)) {
                                ?>
                                    <div class="alert alert-success" role="alert">
                                        {{$message}}
                                    </div>
                                <?php
                            }
                        ?>
                        <form method="POST" action="{{action('LoginController@store')}}">
                            <div class="form-group">
                                <label for="correo">Correo electrónico</label>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="Ingresa tu correo electrónico">
                            </div>
                            <div class="form-group">
                                <label for="correo">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña">
                            </div>
                           
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                    <a href="{{url('/registro')}}" class="btn btn-link">Registrarme</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <input type="submit" value="Iniciar sesión" class="btn btn-success float-right">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col col-sm-3"></div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>