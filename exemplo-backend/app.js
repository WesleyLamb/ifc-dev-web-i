const express = require('express');
const cats = ['Garfield', 'Tom', 'Frajola'];

const app = express();

app.use(express.json());

app.get('/', (req, res) => {
    // res.send('Hello, world!');
    res.send('<h1>Hello, world!</h1>');


    // res.json({message: "Hello, warudo!"});
});

app.listen(5000, () => {
    console.log("Server is running on http://localhost:5000");
});