const express = require('express')
const exphbs = require('express-handlebars')
const mysql = require('mysql2')
const bodyParser = require('body-parser')
const cookieParser = require("cookie-parser")
const sessions = require('express-session')

/* const agendamento = require('./controllers/javascript.js')
agendamento.marca_dia() */

const app = express()
// pegar o body em json
app.use(express.urlencoded({extended: true}))
app.use(express.json())

// sessao
const oneDay = 1000 * 60 * 60 * 24

app.engine('handlebars', exphbs.engine())
app.set('view engine', 'handlebars')
app.use(express.static('public'))
app.use(bodyParser.urlencoded({extended: true}))

const conn = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '123456',
    database: 'agendamento_horarios',
})

app.use(sessions({
    secret: "thisismysecrctekeyfhrgfgrfrty84fwir767",
    saveUninitialized:true,
    cookie: { maxAge: oneDay },
    resave: false 
}))

app.use(cookieParser())
var session

conn.connect(function(err) {
    if(err) {
        console.log(err)
    }
    console.log("conectou ao MySQL")
    app.listen(3000)
})
////////////////////////////////////////////  fim  conexao com bd
////////////////////////////////////////////  login
app.get('/', (req, res) => {
    session=req.session
    if(session.userid){
        res.render("agendarHorario")
    }else{
        res.render("login")
    }
})

app.post('/', (req, res) => {

    const username = req.body.user_name
    const password = req.body.password
    const sql = `SELECT * FROM users WHERE username = '${username}' AND password = '${password}'`;
    conn.query(sql, [username, password], (error, results, fields) => {
        if (error) {
          console.error('Erro ao executar consulta: ' + error.stack)
          return;
        }
        console.log(results);
        if(results.length == ''){
            console.log("teste");
        }
    if (results.length > 0) {
        console.log('Login bem sucedido.')
        res.redirect('/agendar')
        session=req.session
        session.id=req.body.username
        console.log(req.session)
      } else {
        console.log('Email e/ou senha inválidos.')
      }
    })
})

app.get('/logout',(req,res) => {
    delete req.session.id.username
    req.session.destroy()
    res.redirect('/')
})

app.get('/agendar',  (req, res) => {

    res.render("agendarHorario")
})

app.post('/agendar', (req, res) => {

    res.render("agendarHorario")
})
//////////////////////////////////////////// fim  login
////////////////////////////////////////////    cadastro
app.get('/cadastro', (req, res) => {
    res.render("cadastro")
})

app.post('/cadastro', (req, res) => {
    const name = req.body.name
    const email = req.body.email
    const username = req.body.user_name
    const password = req.body.password

    const sql = `INSERT INTO users (name, email, username, password) VALUES ('${name}','${email}','${username}','${password}')`

    conn.query(sql, function(err) {
        if(err) {
            console.log(err)
            return
        }
        res.redirect('/')
    })
})
////////////////////////////////////////////  fim  cadastro
