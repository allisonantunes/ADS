const express = require('express')
const exphbs = require('express-handlebars')
const mysql = require('mysql2')
const bodyParser = require('body-parser')
const cookieParser = require("cookie-parser")
const sessions = require('express-session')

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
    /* res.render("login") */
})

const myusername = 'asd'
const mypassword = 'asdf'

app.post('/', (req, res) => {

/*     const username = req.body.user_name
    const password = req.body.password
    const sql = `SELECT * FROM users WHERE username = '${username}' AND password = '${password}'`;

    conn.query(sql, function(err) {
        if(err) {
            console.log(err)
            return
        }
       res.redirect('/agendar')
    }) */
    if(req.body.user_name == myusername && req.body.password == mypassword){
        session=req.session
        session.userid=req.body.username
        console.log(req.session)
        res.render("agendarHorario")
    }
    else{
        res.send('Invalid username or password');
    }
     
})

app.get('/logout',(req,res) => {
    req.session.destroy();
    res.redirect('/');
})

app.get('/agendar', (req, res) => {
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
