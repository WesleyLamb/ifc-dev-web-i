const express = require('express');
const router = express.Router();
const Manager = require('../database/manager');
const manager = new Manager();

router.get('/', (req, res) => {
    // Index recipes
    return res.status(200).json(manager.index()).end();
});

router.get('/:id', (req, res) => {
    // Show recipe
    const id = req.params.id;
    const recipe = manager.show(id);
    if (recipe) {
        return res.status(200).json(recipe).end();
    } else {
        return res.status(404).end();
    }
});

router.post('/', (req, res) => {
    // Create recipe
    const data = req.body;
    manager.create(data);
    return res.status(201).json(data).end();
});

router.put('/:id', (req, res) => {
    // Update recipe
    const id = req.params.id;
    const data = req.body;
    const recipe = manager.show(id);
    if (!recipe) {
        return res.status(404).end();;
    }
    manager.update(id, data);
    return res.status(200).json(data).end();
});

router.delete('/:id', (req, res) => {
    // Delete recipe
    const id = req.params.id;
    const recipe = manager.show(id);
    if (!recipe) {
        return res.status(404).end();
    }
    manager.delete(id);
    return res.status(204).end();
});

module.exports = router;