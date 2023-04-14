const express = require('express');
const app = express();
const User = require('./models/User');
const handlebars = require('express-handlebars');

// template engine
app.engine('handlebars', handlebars({defaultLayout: 'main'}));
app.set('view engine', 'handlebars');

app.use(express.json());

/* const db = require('./models/db'); */

app.get('/login', function(req, res){
    res.send("asd")
});
app.post('/cadastro', function(req, res){
    User.create({
        name: req.body.name,
        email: req.body.email,
        username: req.body.user_name,
        password: req.body.password   
    })
    .then(() => {
        /* res.send("teste") */
        return res.json({
            erro: false,
            mensagem: "Usuario cadastrado com sucesso!"
        })
    }).catch(() => {
        return res.status(400).json({
            erro: false,
            mensagem: "Usuario cadastrado com sucesso!"
        })
    })
});

app.listen(8080, () => {
    console.log("Servidor iniciado na porta 8080: http://localhost:8080");
});
