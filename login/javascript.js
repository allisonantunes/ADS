let mes = document.getElementById("mes")
let ano = document.getElementById("ano")
let dias = document.getElementsByClassName("date-grid")
let now = new Date

document.write (now.getDate() )

mes_nome = new Array ("janeiro", "fevereiro", "março", "abril", "maio", "junho", "agosto", "outubro", "novembro", "dezembro")

mes.innerHTML = mes_nome[now.getMonth()].toUpperCase() + ","
ano.innerHTML = now.getFullYear()