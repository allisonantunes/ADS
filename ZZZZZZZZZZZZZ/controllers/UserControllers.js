
module.exports = class UserController{

    static async register(req, res) {

        const {name, email, username, password} = req.body

        if(!name) {
            res.status(422).json({ message: 'O nome é obrigatorio'})
            return
        }
        if(!email){
            res.status(422).json({ message: 'O email é obrigatorio'})
            return
        }
        if(!username) {
            res.status(422).json({ message: 'O telefone é obrigatorio'})
            return
        }
        if(!password) {
            res.status(422).json({ message: 'A senha é Obrigatorio'})
            return
        }
        const userExists = await User.findOne({ email: email})

        if(userExists) {
            res.status(422).json({ message: 'E-mail já cadastrado'})
            return
        }

        const user = new User({
            name,
            email,
            phone,
            password
        })

        const newUser = await user.save()
    }

    static async login(red, res) {
    const {username, password} = req.body

    if(!username) {
        res.status(422).json({message: 'nome de usuario obrigatório'})
        return
    }
    if(!password) {
        res.status(422).json({message: 'Digite sua senha!'})
        return
    }
}

}

