const Sequelize = require('sequelize');
const db = require('./db');

const User = db.define('users', {
    id: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    name: {
        type: Sequelize.STRING,
        allowNull: false,
    },
    email: {
        type: Sequelize.STRING,
        allowNull: false,
    },
    username: {
        type: Sequelize.STRING,
        allowNull: false,
    },
    password: {
        type: Sequelize.STRING,
        allowNull: false,
    }
});

// se nao tiver uma tabela irá criar uma
// User.sync()
// verifica diferença na tabela, realiza a alteracao
// User.sync({ alter:true })

module.exports = User;