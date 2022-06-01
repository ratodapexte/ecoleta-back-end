<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="changePassword">
        <label for="password">Senha</label>
        <input type="text" id="password" name="password">

        <button onclick="changePassword()">Redefinir senha</button>
    </div>

    <div id="success" style="display: none;">
        <p>Senha foi redefinida.</p>
    </div>
    <div id="error" style="display: none;">
        <p>Ops, houve algum problema.</p>
    </div>


<script>
    async function changePassword() {
        console.log(document.getElementById('password').value);

        let passwordInput = document.getElementById('password').value;
        // dados a serem enviados pela solicitação POST
        let _data = {
            token: '{{ $token }}',
            password: passwordInput,
        };

        fetch('/api/reset-pass', {
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
            document.getElementById('changePassword').style.display = "none";
            document.getElementById('success').style.display = "block";
        })
        .catch(err =>{
            document.getElementById('error').style.display = "block";
            document.getElementById('success').style.display = "none";  
        });
    }
</script>
</body>

</html>