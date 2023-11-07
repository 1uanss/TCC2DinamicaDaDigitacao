const input = document.getElementById('input-value');
const botao = document.getElementById('salvar');


let arraySobreTempoPresionadoDasTeclas = [];
let arrayEntreTempoDasTeclas = [];
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
        document.querySelector('#inputSobreTempoPresionadoDasTeclas').value = `${arraySobreTempoPresionadoDasTeclas.toString()}`;
        document.querySelector('#inputEntreTempoDasTeclas').value = `${arrayEntreTempoDasTeclas.toString()}`;
        console.log(document.querySelector('#inputEntreTempoDasTeclas').value)
        console.log(document.querySelector('#inputSobreTempoPresionadoDasTeclas').value)
    });
    
}

function compara(){
    console.log(teclasPressionadas)
    
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
        
        // console.log(element.letra,{tempoPressionando, tempoEntreTeclas});

        // console.log(arraySobreTempoPresionadoDasTeclas);
        // console.log(arrayEntreTempoDasTeclas);
    });

    const senha = (teclasPressionadas.map((elm)=>elm.letra)).join('')
    // console.log({senha})
    
}