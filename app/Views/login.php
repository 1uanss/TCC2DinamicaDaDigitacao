<!DOCTYPE html>
<html lang="pt-br">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("/style.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/login/css/login.css")?>">
    
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>

    body {
        background-image: url('<?= base_url('/img/papel.jpg') ?>');
        display: flex;
        flex-direction: column;
    }
</style>

<body>
    
        <div class="container-child">
            <form method="POST" action="<?= base_url("/autenticar") ?>">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="form-header">
                    <div class="title">
                        <h1>Conecte-se</h1>
                    </div>
                </div>
                <div class="input-group grupo-inputs">
                    <div class="input-campo">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="username" placeholder="Email" required>
                    </div>
                    <div class="input-campo">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" placeholder="Senha" required>
                    </div>

                </div>
                <div class="confirm-button">
                    <a id="btn-cadastrar" href="<?= base_url("/cadastrar/usuario") ?>"><button type="button" class="btn btn-warning bttwo">Criar conta</button></a>
                    <button type="submit" class="btn btn-warning bttwo">Entrar</button>
                </div>
            </form>
        </div>
    

    </form>
</body>

</html>