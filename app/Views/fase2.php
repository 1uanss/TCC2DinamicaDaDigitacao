<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <style>
        section {
            background-color: #dfc0a1;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
   
    <section class="container">
    <header>
        <nav>
            <ul>
                <li><a href="<?= base_url("/fase1") ?>">Fase 1</a></li>
                <li><a  href="<?= base_url("/fase2") ?>">Fase 2</a></li>
                <li><a  href="<?= base_url("#") ?>">Exportar</a></li>
            </ul>
        </nav>
    </header>
        <p class="informacao">Bem-vindo à Fase 2 do projeto sobre a dinâmica da digitação. Nesta fase, você contribuirá seguindo os passos a seguir:
        Tente acessar o seu próprio login duas vezes.
        Além disso, tente acessar o login de outros usuários duas vezes.
        </p>
        <div class="login-info">
            <h3>Informações de Login:</h3>
         <p id="login-info"></p>
</div>
        <div class="form-box">
            <div class="form-value">
                <form id="form">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <h2>Informe os dados</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <label for="name">Nome</label>
                        <input type="text" id="input-nome" name="name" required>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <label for="password">Passaword</label>
                        <input type="password" id="input-value" name="password" required>
                    </div>
                    <button id="salvar">Salvar</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div id="progress-bar">
                <div id="progress">0%</div>
            </div>
        </div>

        </div>
    </section>
    <!-- <button id='mostrar_array'>Mostrar Array</button> -->
    <script>
        const progressBar = document.getElementById("progress");
        const salvarButton = document.getElementById("salvar");
        const cadastroForm = document.getElementById("form");
        const loginInfo = document.getElementById("login-info");

        let cadastros = 0;
        const form = document.getElementById('form');

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            console.log('fu')
        });

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            console.log("fu");
        });


        salvarButton.addEventListener("click", () => {
            cadastros++;
            if (cadastros <= 30) {
                const progressPercentage = (cadastros / 30) * 100;
                progressBar.style.width = `${progressPercentage}%`;
                progressBar.textContent = `${progressPercentage.toFixed(2)}%`;

                const nome = document.getElementById("input-nome").value;
                const password = document.getElementById("input-value").value;
                loginInfo.textContent = `Nome: ${nome}, Senha: ${password}`;
            } else {
                alert("Limite de 30 cadastros atingido.");
            }
        });
    </script>
    <!-- <script src="<?= base_url('assets/luan/script.js'); ?>"></script> -->
    <!-- <script src="public/assets/luan/jquery.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->
    <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg/ .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->
</body>

</html>