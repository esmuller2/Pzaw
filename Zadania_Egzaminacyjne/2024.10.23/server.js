const express = require('express');
const app = express();
const PORT = 5000;
 
app.use(express.static('public'));
app.use(express.json());
 
let comments = [];
 
app.get('/comments', (req, res) => {
    res.json(comments);
});
 
app.post('/comments', (req, res) => {
    const comment = req.body.comment;
    if (comment) {
        comments.push(comment);
        res.status(201).json({ success: true, comments });
    } else {
        res.status(400).json({ success: false, message: "Comment cannot be empty" });
    }
});
 
app.listen(PORT, () => {
console.log(`Server is running on http://localhost:${PORT}`);
});