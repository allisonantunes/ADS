const express = require('express')
const exphbs = require('express-handlebars')
const mysql = require('mysql2')

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

app.get('/', (req, res) => {
    res.render("home")
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
        }
        res.redirect('/')
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
    console.log("conectou ao MySQL");
    app.listen(3000)
})