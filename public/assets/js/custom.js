

// let tempos = [];
// let tempos_tecla = [];
// let nome;

// let primeira_letra = true;
// const btnMostrarArray = document.getElementById("salvar");
// // btnMostrarArray.addEventListener('click', function(){
// //   console.log('Intervalo entre teclas: ',tempos)
// //   console.log('Tempo pressionando teclas: ',tempos_tecla)
// // });

// let tempos_e_tempos_de_tecla = [];

// const form = document.getElementById('form');
// form.addEventListener('submit', (event) => {
//   event.preventDefault();
//   // console.log('fu');
//   console.log('Intervalo entre teclas: ',tempos)
//   // if(tempos.length >= 1) {
//   //   tempos_e_tempos_de_tecla.push(tempos.toString());
//   //   console.log("tempos_e_tempos_de_tecla: " + tempos_e_tempos_de_tecla);
//   // }
//   // if(tempos_tecla.length >= 1) {
//   //   tempos_e_tempos_de_tecla.push(tempos_tecla.toString());
//   //   console.log("tempos_e_tempos_de_tecla: " + tempos_e_tempos_de_tecla);
//   // }
//   console.log('Tempo pressionando teclas: ',tempos_tecla)
// });

// // Função para definir o nome
// // function salvarValor() {
// //   nome = document.getElementById('input-nome').value;
// // }

// *-------------------------------------------------------


// let tempo_inicio;

// window.addEventListener('keydown', (event) => {
//   if(event.target.id !== 'input-value') return;
//   if( event.key === 'Backspace') { 
//     tempos = [];
//     tempo_inicio = null;
//     primeira_letra = true;
//     const input_senha = document.getElementById('input-value');
//     input_senha.value = '';
//     return;
//   }

//   if(!primeira_letra) {
//     const diff = Date.now() - tempo_inicio;
//     tempos.push(diff);
//   }
  
  
//   tempo_inicio = Date.now();
//   if(primeira_letra == true) primeira_letra = false;
// });

// window.addEventListener('keyup',  (event) => {
//   if (event.target.id !== 'input-value' || event.key === 'Backspace') return; 
//     const tempo_fim = Date.now();
//     const diff = tempo_fim - tempo_inicio;
//     tempos_tecla.push(diff)

//     // Envia os dados para o servidor
//     // const response = await fetch('/salvar-valor', {
//     //   method: 'POST',
//     //   headers: {
//     //     'Content-Type': 'application/json',
//     //   },
//     //   body: JSON.stringify({
//     //     nome: nome,
//     //     tempos_tecla: tempos_tecla,
//     //     tempos: tempos,
//     //   }),
//     // });

//     // const data = await response.json();
//     // console.log(data);
  
// });


const input = document.getElementById('input-value');
const botao = document.getElementById('salvar');


const teclasPressionadas = {};
let totalLetrasApertadas = 0;

function aperta(letra){
    const chave = `${totalLetrasApertadas}_${letra}`;
    Object.assign(teclasPressionadas, {[chave]: {...teclasPressionadas[chave], apertou: Date.now()}})
    totalLetrasApertadas++;
}

function solta(letra){
    const chave = `${totalLetrasApertadas}_${letra}`;
    Object.assign(teclasPressionadas, {[chave]: {...teclasPressionadas[chave], soltou: Date.now()}})
}

window.onload = function(){
    window.addEventListener('keydown',e=>{
        console.log('press', e.key);
        aperta(e.key);
    })
    
    window.addEventListener('keyup',e=>{
        solta(e.key);
    })
    
    botao.addEventListener('click',compara);
}

function compara(){
  
    const teclas = Object.keys(teclasPressionadas);
    console.log(teclasPressionadas)
    for (let index = 0; index < teclas.length; index++) {
        if(index+1 === teclas.length) return;
        const tecla = teclas[index].split('_')[1];
        console.log(tecla, index);
        
        const apertouAtual = teclasPressionadas[teclas[index]].apertou;
        const soltouAtual = teclasPressionadas[teclas[index]].soltou;

        const apertouProximo = teclasPressionadas[teclas[index+1]].apertou;
        const soltouProximo = teclasPressionadas[teclas[index+1]].soltou;

        const tempoPressionando = soltouAtual - apertouAtual;
        const tempoEntreTeclas = apertouProximo - soltouAtual;
        const tempoNegativo = apertouProximo - soltouAtual;


        console.log(tecla,{tempoPressionando, tempoEntreTeclas});

    }
}