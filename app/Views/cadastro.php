<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("assets/cadastro_usuario/css/cadastro_usuario.css") ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Cadastro usuário</title>
</head>
<style>
    body {
    background-image: url('<?= base_url('/img/banner.jpg') ?>');
    display: flex;
    flex-direction: column;
    }
</style>

<body>
    <div class="container">
       
        <form id="form" action="<?= base_url('/novo/usuario')?>" method="POST">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <div class="form-header">
                <div class="title">
                    <h1>Cadastre-se</h1>
                </div>
            </div>
            <?php
            if (session()->getFlashdata('status') === "okay") {
            echo '<div class="alert alert-success" role="alert">
                        Usuário cadastro!
                    </div>';
        };
        if (session()->getFlashdata('status') === "error") {
            echo '<div class="alert alert-warning" role="alert">
                        Usuário não cadastro!
                    </div>';
        };
        ?>
            <div class="field-group">
                <div class=" data-field">
                    <label for="username">Seu nome</label>
                    <input id="username" type="text" name="username" placeholder="Login" required>
                </div>

                
                
                <div class="data-field">
                    <label for="nome">Email</label>
                    <input id="useremail" type="text" name="useremail" placeholder="Nome" required>
                </div>
            </div>
            
            <div class="data-field">
                <label for="password">Senha</label>
                <input id="password" type="password" name="userpassword" placeholder="Senha" required>
            </div>

            <div class="registration-button">
                <a href="<?= base_url("/") ?>"><button type="button" class="btn btn-warning bttwo">Já tenho uma conta</button></a>
                <button type="submit" class="btn btn-warning bttwo">Cadastrar</button>
            </div>
        </form>
    </div>
    <script>
        setTimeout(function() {
        let divToRemove = document.querySelector('.alert');
        if (divToRemove) {
            divToRemove.remove();
        }
    }, 3000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>