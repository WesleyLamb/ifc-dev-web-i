const express = require('express');

const recipesRouter = require('./src/routes/recipes');

const app = express();
const port = 3000;

app.use(express.json());
app.use('/recipes', recipesRouter);

app.listen(port, () => {
    console.log(`Example app listening at http://localhost:${port}`);
});