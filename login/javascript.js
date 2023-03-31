let mes = document.getElementById("mes")
let ano = document.getElementById("ano")
let now = new Date

/* document.write ("Hoje é " + now.getDay()
 + ", " + now.getDate() + " de " + now.getMonth()
  + " de " + now.getFullYear() ) */

mes_nome = new Array ("janeiro", "fevereiro", "março", "abril", "maio", "junho", "agosto", "outubro", "novembro", "dezembro")

mes.innerHTML = mes_nome[now.getMonth()]
ano.innerHTML = ano[now. getFullYear()]