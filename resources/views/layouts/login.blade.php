<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <form class="m-4" method="post" action="{{route('auth.user')}}">
        @csrf
        <h1 class="text-center">Ecoleta - Login</h1>
        <div class="mb-3">
            <label for="emai1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" >
            
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>  
        <button type="submit" class="btn btn-primary">Conectar</button>
    </form>

</body>

</html>