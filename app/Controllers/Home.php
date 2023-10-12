<?php


namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\ValorModel; // Importe o modelo

class Home extends BaseController
{
    use ResponseTrait;

    public function index(): string
    {
        return view('index');
    }

    public function salvarValor() 
    {
        // Obtenha os dados do corpo da solicitação
        $input = $this->request->getJSON(true);

        try {
            // Carregue o modelo ValorModel
            $valorModel = new ValorModel();

            // Inserir os valores recebidos no banco de dados
            $data = [
                'nome' => $input['nome'],
                'tempos_tecla' => $input['tempos_tecla'],
                'tempos' => json_encode($input['tempos']),
            ];
            $valorModel->insert($data);

            // Verificar se a inserção foi bem-sucedida e enviar uma resposta ao frontend
            if ($valorModel->affectedRows() > 0) {
                return $this->respond(['mensagem' => 'Valores salvos com sucesso!'], 200);
            } else {
                return $this->respond(['error' => 'Erro ao salvar os valores.'], 500);
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->respond(['error' => 'Erro ao salvar os valores.'], 500);
        }
    }
}

// namespace App\Controllers;

// class Home extends BaseController
// {
//     public function index(): string
//     {
//         return view('index');
//     }

//     public function salvarValor() 
//     {
        // Obtenha os dados do corpo da solicitação
        // $input = $this->request->getJSON(true);

        // Configurar as informações de conexão com o banco de dados
        // $connectionConfig = [
        //     'hostname' => 'localhost',
        //     'username' => 'root',
        //     'password' => '',
        //     'database' => 'tcc',
        // ];

        // try {
            // Criar uma conexão com o banco de dados
            // $db = \Config\Database::connect($connectionConfig);

            // Inserir os valores recebidos no banco de dados
            // $data = [
            //     'nome' => $input['nome'],
            //     'tempos_tecla' => $input['tempos_tecla'],
            //     'tempos' => json_encode( $input['tempos']),
            //     // 'diferencas' => json_encode($input['diferencas']), // Converta em JSON para armazenamento
            // ];
            // $db->table('valores')->insert($data);

            // Verificar se a inserção foi bem-sucedida e enviar uma resposta ao frontend
//             if ($db->affectedRows() > 0) {
//                 return $this->response->setStatusCode(ResponseInterface::HTTP_OK)
//                                      ->setJSON(['mensagem' => 'Valores salvos com sucesso!']);
//             } else {
//                 return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
//                                      ->setJSON(['error' => 'Erro ao salvar os valores.']);
//             }
//         } catch (\Exception $e) {
//             log_message('error', $e->getMessage());
//             return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
//                                  ->setJSON(['error' => 'Erro ao salvar os valores.']);
//         }
//     }
// }

