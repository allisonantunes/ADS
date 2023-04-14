const express = require('express')
const exphbs = require('express-handlebars')
const mysql = require('mysql2')
const bodyParser = require('body-parser')

const app = express()

// pegar o body em json
app.use(
    express.urlencoded({
        extended: true
    })
)
app.use(express.json())
//

app.engine('handlebars', exphbs.engine())
app.set('view engine', 'handlebars')

app.use(express.static('public'))

app.use(bodyParser.urlencoded({extended: true}))

/* app.get('/', (req, res) => {
    res.render("login")
}) */

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
        res.redirect('/login')
    })
})

const conn = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '123456',
    database: 'agendamento_horarios',
})

conn.connect(function(err) {
    if(err) {
        console.log(err)
    }
    console.log("conectou ao MySQL")
    app.listen(3000)
})

app.post('/', (req, res) => {
    
    if(req.body.usuario == username && req.body.senha == password){
        req.session.login = username
    }
    res.render("login")
})

// pg inicial
app.get('/', (req, res) =>{
    if(req.session.login){
        res.render('pagina logado')
    }else{
        res.render('login')
    }
    
    /* res.redirect('/paginainicial') */
})

/*
app.get('/clientes', (req, res) => {
    const slq = "SELECT * FROM users"

    conn.query(slq, function (err, data) {
        if(err) {
            console.log(err)
            return
        }

        const clientes = data
        console.log(clientes);

        res.render('clientes', {clientes})
    })
})

app.get('/login/id', (req, res) => {

    const id = req.params.id 

    conn.query(sql, function(err, data) {
        if(err) {
            console.log(err)
            return
        }
        const usuario = data[0]
        res.render('login', {usuario})
    })
}) */

