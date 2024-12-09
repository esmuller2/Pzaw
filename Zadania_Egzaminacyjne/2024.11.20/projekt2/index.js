const express = require('express');
const app = express();
const router = express.Router();
router.get('/new', (req, res) => {
    res.send('Dodawanie nowych użytkowników')
})

router.param("id", (req, res, next, id) => {
    console.log(id)
    next()
})

router.route('/:id').get((req, res) =>{
    req.params.id
    res.send(`Użytkownik o id ${req.params.id}`)
}).put((req,res) => {
    req.params.id
    res.send(`Aktualizacja użytkownika o id ${req.params.id}`)
}).delete((req,res)=>{
    req.params.id
    res.send(`Usuwanie użytkownika o id ${req.params.id}`)
})

router.route('/user')

module.exports = router;