const input = document.getElementById('input-value');
const botao = document.getElementById('salvar');


const teclasPressionadas = [];
const indexLetras = {};
let totalLetrasApertadas = 0;

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
        console.log('press', e.key);
        aperta(e.key);
    })
    
    input.addEventListener('keyup',e=>{
        solta(e.key);
    })
    
    botao.addEventListener('click',(e)=>{
        e.preventDefault()
        compara()
    });
}

function compara(){
    console.log(teclasPressionadas)
    
    teclasPressionadas.forEach((element, idx) => {
        // if(idx+1 === teclasPressionadas.length) return;
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
            }
        tempoPressionando = soltouAtual - apertouAtual;

        // const tempoNegativo = apertouProximo - soltouAtual;
        
        console.log(element.letra,{tempoPressionando, tempoEntreTeclas});
    });

    const senha = (teclasPressionadas.map((elm)=>elm.letra)).join('')
    console.log({senha})
}