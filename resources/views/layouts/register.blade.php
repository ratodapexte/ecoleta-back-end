<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div id="register">
        <h1 class="text-center">Ecoleta - Cadastro</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Nome Completo</label>
            <input type="text" name="name" class="form-control" id="name" >
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" id="cpf">
        </div>  
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>  
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>  
            
        <button onclick="register()" class="btn btn-primary">Cadastrar</button>    
    </div>

    <div id="success" style="display: none;">
        <p>Usuário criado com sucesso.</p>
        <p id="usuario"></p>
    </div>
    <div id="error" style="display: none;">
        <p>Ops, houve algum problema.</p>
    </div>
    
<script>
    async function register() {
        let passwordInput = document.getElementById('password').value;
        let emailInput = document.getElementById('email').value;
        let cpfInput = document.getElementById('cpf').value;
        let nameInput = document.getElementById('name').value;
        let usuario = document.getElementById('usuario');

        // dados a serem enviados pela solicitação POST
        let _data = {
            password: passwordInput,
            email: emailInput,
            cpf: cpfInput,
            name: nameInput,
        };

        fetch('/api/registerUser', {
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
            document.getElementById('register').style.display = "none";
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