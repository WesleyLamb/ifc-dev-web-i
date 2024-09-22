class TodoList {
    constructor() {
        this._todos = JSON.parse(localStorage.getItem('todos')) || [];
    }

    add(todo) {
        this._todos.push(todo);
        this.saveToLocalStorage();
    }

    remove(id) {
        this._todos = this._todos.filter(t => t.id !== id);
        this.saveToLocalStorage();
    }

    changeStatus(id) {
        const todo = this._todos.find(t => t.id === id);
        todo.isDone = !todo.isDone;
        this.saveToLocalStorage();
    }

    loadTodos(descriptionFilter, statusFilter) {
        return this._todos.filter(todo => {
            if (descriptionFilter && !todo.description.includes(descriptionFilter)) {
                return false;
            }
            if (statusFilter && todo.isDone !== statusFilter) {
                return false;
            }
            return true;
        });
    }

    saveToLocalStorage() {
        localStorage.setItem('todos', JSON.stringify(this._todos));
    }
}

const todoList = new TodoList();

function createTodo(description, date) {
    lastId = parseInt(localStorage.getItem('todoId')) || 1;
    id = lastId;
    lastId = lastId + 1;
    localStorage.setItem('todoId', lastId);
    return {
        id:  id,
        description: description,
        date: date,
        isDone: false
    }
}

function todoToHTML(todo) {
    return `
        <td>${todo.description}</td>
        <td>${todo.date}</td>
        <td>${!todo.isDone ? "Pendente" : "Concluído"}</td>
        <td>
            <button type="button" class="btn-primary" onclick="toggleTodoStatus(${todo.id})">Concluir</button>
            <button type="button" class="btn-danger" onclick="deleteTodo(${todo.id})">Excluir</button>
        </td>
    `;
}
