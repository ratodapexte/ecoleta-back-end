<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="sendEmail">
        <label for="email">Email</label>
        <input type="text" id="email" name="password">

        <button onclick="sendEmail()">Enviar token</button>
    </div>

    <div id="success" style="display: none;">
        <p>Email com o token foi enviado.</p>
    </div>
    <div id="error" style="display: none;">
        <p>Ops, houve algum problema.</p>
    </div>

<script>
    async function sendEmail() {
        console.log(document.getElementById('email').value);

        let emailInput = document.getElementById('email').value;
        // dados a serem enviados pela solicitação POST
        let _data = {
        email: emailInput,
        };

        fetch('/api/send-reset-email', {
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
            document.getElementById('sendEmail').style.display = "none";
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