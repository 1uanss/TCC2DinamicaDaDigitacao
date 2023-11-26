const input = document.getElementById('input-value');
const botao = document.getElementById('salvar');



let arraySobreTempoPresionadoDasTeclas = [];
let arrayEntreTempoDasTeclas = [];
let teclasPressionadas = [];
let indexLetras = {};
let totalLetrasApertadas = 0;
let resultados = {
    "legitimo": [],
    "impostor": [],
};
let contadorLegitimo = 0;
let contadorImpostor = 0;
let totalDigitacaoLegitimo = 30;
let totalDigitacaoImpostor = 30;
let quemDigita = "legitimo";

function aperta(letra){
    teclasPressionadas.push({letra, apertou: Date.now()});
    indexLetras[letra] = teclasPressionadas.length - 1;
}

function solta(letra){
    const index = indexLetras[letra];
    teclasPressionadas[index].soltou = Date.now();
    delete indexLetras[letra];
}

window.onload = function(){
    input.addEventListener('keydown',e=>{
        
        aperta(e.key);
    })
    
    input.addEventListener('keyup',e=>{
        solta(e.key);
    })
    
    botao.addEventListener('click',(e)=>{
        if(contadorLegitimo < totalDigitacaoLegitimo){
            contadorLegitimo += 1;
        } else if(contadorLegitimo == totalDigitacaoLegitimo){
            quemDigita = "impostor";
        }

        if(quemDigita == "impostor" && contadorImpostor < totalDigitacaoImpostor){ 
            contadorImpostor += 1;
        }

        e.preventDefault()
        compara()
        document.querySelector('#inputSobreTempoPresionadoDasTeclas').value = `${arraySobreTempoPresionadoDasTeclas.toString()}`;
        document.querySelector('#inputEntreTempoDasTeclas').value = `${arrayEntreTempoDasTeclas.toString()}`;

        limparTempos();
        if(contadorImpostor == totalDigitacaoImpostor){
            // enviar dados para servido
            const dados = enviaDados();
            const formData = new FormData()
            formData.append('usuarioLegitimo',dados[0]);
            formData.append('usuarioImpostor',dados[1]);

            const xhr = new XMLHttpRequest 
            const baseURL = document.URL.split("/public/")[0] + "/public";
            console.log(dados)
            xhr.open('POST',baseURL+'/fase1/enviadados',true);
            xhr.send(formData);
            xhr.onload =  function(){
                if(xhr.status >= 200 && xhr.status < 300){
                    document.body.innerHTML+= xhr.responseText;
                }
            }
        }
    });
    
}

function limparTempos(){
    resultados[quemDigita].push({
        arraySobreTempoPresionadoDasTeclas,
        arrayEntreTempoDasTeclas,
        teclasPressionadas,
        indexLetras,
        totalLetrasApertadas,
    });
   

    arraySobreTempoPresionadoDasTeclas = [];
    arrayEntreTempoDasTeclas = [];
    teclasPressionadas = [];
    indexLetras = {};
    totalLetrasApertadas = 0;
}

function enviaDados(){
    const dadosLegitimos = resultados.legitimo.reduce((agg,curent,idx)=>{
       const tempoPresinando = curent.arraySobreTempoPresionadoDasTeclas;
       const tempoEntreTeclas = curent.arrayEntreTempoDasTeclas;
       const resultLegitimo = []
        tempoPresinando.forEach((val,validx)=>{
        resultLegitimo.push(val)
        if(validx < tempoEntreTeclas.length){
            const posicaoAtual = resultLegitimo.length
            resultLegitimo.splice(posicaoAtual, 0, tempoEntreTeclas[validx])
        }
       })
       return [...agg,resultLegitimo]
    },[]);

    const dadosImpostor = resultados.impostor.reduce((agg,curent,idx)=>{
        const tempoPresinando = curent.arraySobreTempoPresionadoDasTeclas;
        const tempoEntreTeclas = curent.arrayEntreTempoDasTeclas;
        const resultImpostor = []
         tempoPresinando.forEach((val,validx)=>{
         resultImpostor.push(val)
         if(validx < tempoEntreTeclas.length){
             const posicaoAtual = resultImpostor.length
             resultImpostor.splice(posicaoAtual, 0, tempoEntreTeclas[validx])
         }
        })
        return [...agg,resultImpostor]

     },[]);
     return[dadosLegitimos,dadosImpostor];
}

function compara(){
   
    
    teclasPressionadas.forEach((element, idx) => {
        const apertouAtual = element.apertou;
        const soltouAtual = element.soltou;




        let nextElement;
        let apertouProximo;
        let soltouProximo;
        let tempoPressionando;
        let tempoEntreTeclas;
        
        
        if(idx+1 < teclasPressionadas.length) {
             nextElement = teclasPressionadas[idx+1]
             apertouProximo = nextElement.apertou;
             soltouProximo = nextElement.soltou;
             tempoEntreTeclas = apertouProximo - soltouAtual;
             arrayEntreTempoDasTeclas.push(tempoEntreTeclas);
            }
        tempoPressionando = soltouAtual - apertouAtual;
        arraySobreTempoPresionadoDasTeclas.push(tempoPressionando);
        
       
        return  {tempoPressionando, tempoEntreTeclas};

       
    });



    const senha = (teclasPressionadas.map((elm)=>elm.letra)).join('')
    
    
}