const express = require('express');
const router = express.Router();

router.get('/search', (req, res) => {
    res.render('http://localhost:3000');
})
module.exports = router;