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
    <div id="login">
        <h1 class="text-center">Ecoleta - Login</h1>
        <div class="mb-3">
            <label for="emai1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" >
            
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>  
        <button onclick="login()" class="btn btn-primary">Conectar</button>
    </div>

    <div id="success" style="display: none;">
        <p>Usuário logado.</p>
        <p id="usuario"></p>
    </div>
    <div id="error" style="display: none;">
        <p>Ops, houve algum problema.</p>
    </div>
    
<script>
    async function login() {
        let passwordInput = document.getElementById('password').value;
        let emailInput = document.getElementById('email').value;
        let usuario = document.getElementById('usuario');
        // dados a serem enviados pela solicitação POST
        let _data = {
            password: passwordInput,
            email: emailInput,
        };

        fetch('/api/login', {
            method: "POST",
            body: JSON.stringify(_data),
            headers: {"Content-type": "application/json; charset=UTF-8"}
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("HTTP status " + response.status);
            }
            return response.json();
        }) 
        .then(json => {
            console.log(json.data);
            document.getElementById('login').style.display = "none";
            usuario.innerHTML = JSON.stringify(json.data);
            document.getElementById('success').style.display = "block";
            document.getElementById('error').style.display = "none";
        })
        .catch(err =>{
            document.getElementById('error').style.display = "block";
            document.getElementById('success').style.display = "none";  
        });
    }
</script>

</body>

</html>