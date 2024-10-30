const fs = require('fs');
const filePath = './data/recipes.json';

class Manager {
    constructor() {
        this.data = [];
        this.load();
    }

    create(data) {
        data.id = this.data.at(-1).id + 1;
        this.data.push(data);
        this.save();
    }

    index() {
        return this.data;
    }

    show(id) {
        this.load();
        return this.data.find((el) => {
            return el.id == id;
        })
    }

    update(id, data) {
        this.load();

        let index = this.data.findIndex((el) => {return el.id == id});
        if (index) {
            this.data[index] = data;
        }
        this.save();
    }

    delete(id) {
        this.load();
        let index = this.data.findIndex((el) => {return el.id == id});
        if (index) {
            this.data.splice(index, 1);
        }
        this.save();
    }

    save() {
        fs.writeFileSync(filePath, JSON.stringify({data: this.data}));
    }

    load() {
        this.data = JSON.parse(fs.readFileSync(filePath)).data;
    }
}

module.exports = Manager;