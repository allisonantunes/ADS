let mes = document.getElementById("mes")
let ano = document.getElementById("ano")
let dias = document.querySelector(".date-grid")

let now = new Date
ano_atual = now.getFullYear()
mes_atual = now.getMonth()


mes_nome = new Array ("janeiro", "fevereiro", "março", "abril", "maio", "junho", "agosto", "outubro", "novembro", "dezembro")

mes.innerHTML = mes_nome[mes_atual].toUpperCase() + ","
ano.innerHTML = ano_atual

const renderiza_calendario = () => {
    let dias_mes = new Date(ano_atual, mes_atual + 1, 0).getDate()
    let dias_tag = ""

    for (let i = 1; i <= dias_mes; i++) {
    dias_tag += `<button><time datetime="01">${i}</time></button>`;
    }

    dias.innerHTML = dias_tag
}


renderiza_calendario();