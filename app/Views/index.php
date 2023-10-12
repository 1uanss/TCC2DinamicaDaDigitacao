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
            background-image: url('<?= base_url('/img/one.jpg') ?>');
            display: flex;
            flex-direction: column;
        }

        /* #progress-bar {
            width: 100%;
            background-color: #ccc;
            height: 30px;
            margin-bottom: 20px;
        }

        #progress {
            width: 0;
            height: 100%;
            background-color: #4CAF50;
            text-align: center;
            line-height: 30px;
            color: white;
        }

        .card {
            width: 400px;
            margin-top: 50px;
        }

        .informacao {
            width: 400px;
            background-color: #f0f0f0;
            padding: 20px;
            border: 2px solid #4CAF50;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        } */
    </style>
</head>

<body>
    <section class="container">
        <p class="informacao">
            Bem vindo ao projeto sobre a dinamica da digitação, ao digitar seu nome e senha trinta vezes
            voçê estara ajudando no treinamento de uma RNA " rede neural artificial".
        </p>
        <div class="form-box">
            <div class="form-value">
                <form id="form">
                    <h2>Conecte-se</h2>
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
            } else {
                alert("Limite de 30 cadastros atingido.");
            }
        });
    </script>
    <script src="<?= base_url('assets/luan/script.js'); ?>"></script>

    <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg/ .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->
</body>

</html>