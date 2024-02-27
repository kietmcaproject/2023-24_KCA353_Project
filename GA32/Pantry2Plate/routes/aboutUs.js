const express = require('express');
const router = express.Router();

router.get('/aboutUs', (req, res) => {
    res.render('aboutUs');
})
module.exports = router;