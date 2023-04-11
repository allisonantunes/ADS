let mes = document.getElementById("mes")
let ano = document.getElementById("ano")
let dias = document.querySelector(".date-grid")
let marcacao = document.querySelector(".confirmar_horario")

let now = new Date
ano_atual = now.getFullYear()
mes_atual = now.getMonth()


mes_nome = new Array ("janeiro", "fevereiro", "março", "abril", "maio", "junho", "agosto", "outubro", "novembro", "dezembro")

mes.innerHTML = mes_nome[mes_atual].toUpperCase() + ","
ano.innerHTML = ano_atual

var meses = mes = mes_nome[mes_atual].toUpperCase()

    let dias_mes = new Date(ano_atual, mes_atual + 1, 0).getDate()
    let dias_tag = ""

    for (let i = 1; i <= dias_mes; i++) {
    dias_tag += `<button value="${i}" onclick='marca_dia(${i})'>${i}</button>`;
    }
    
    dias.innerHTML = dias_tag
    let dia_selecionado = ''
    let hora_selecionada = ''

    function marca_dia(dia){
        dia_selecionado = dia
        teste = `<div>Vc selecionou: ${dia_selecionado} de ${meses} de ${ano_atual} às ${hora_selecionada}</button>`;
        marcacao.innerHTML = teste
    };

    function horarios(hora) {
        hora_selecionada = hora

        teste = `<div>Vc selecionou: ${dia_selecionado} de ${meses} de ${ano_atual} às ${hora}</button>`;
        marcacao.innerHTML = teste
        
    };
/*     let tudo = dia_selecionado + hora_selecionada
    console.log(tudo);
 */
