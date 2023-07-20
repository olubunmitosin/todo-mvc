import './bootstrap';
import moment from 'moment';

let baseUrl = import.meta.env.VITE_BACKEND_ENDPOINT;
let username = import.meta.env.VITE_CLIENT_USERNAME;
let password = import.meta.env.VITE_CLIENT_PASSWORD;
let userId = window.userID;
let headers = {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
};


function getAxiosInstance(headers) {
    return axios.create({
        baseURL: `${baseUrl}/api`,
        timeout: 1000,
        headers: headers
    });
}

function checkAndSetAuthWithServer(callback) {
    const instance = getAxiosInstance(headers);
    return instance.post('/client/get-token', {username: username, password: password}).then(function (resp) {
        if (resp.data && resp.data.status) {
            headers['Authorization'] = "Bearer " + resp.data.response.access_token;
            callback(headers);
        }
    });
}


function buildTodoList(todos, empty = false) {
    const todoBody = $('#todo-list');
    todoBody.html(" ");
    if (empty) {
        todoBody.append('<tr><td colspan="6" class="text-center">Todos list is empty!</td></tr>');
    } else {
        $.each(todos, function(index, todo) {
            let due_date = moment(todo.due_date).format('DD-MM-YYYY h:mm a');
            let created_at = moment(todo.created_at).format('DD-MM-YYYY h:mm a');
            let template = '<tr>'+
            '<td>'+ todo.title + '</td>'+
            '<td>'+ todo.description +'</td>'+
            '<td>'+ todo.status +'</td>'+
            '<td>'+ created_at +'</td>'+
            '<td>'+ due_date +'</td>'+
            '<td><a href="/todo/edit/'+ todo.id +'" class="btn btn-sm btn-warning mx-1">Edit</i></a><button type="button" data-id="'+ todo.id +'" class="btn btn-sm btn-danger delete-todo">Delete</button></td>'+
            '</tr>';

            todoBody.append(template);
        });
    }
}



if (document.getElementById('todos')) {
    // Check and set token
    checkAndSetAuthWithServer(function (headers) {
        const instance = getAxiosInstance(headers);
        // Get todos
        instance.get('/todos?user_id=' + userId).then(function (todosResponse) {
            if (todosResponse.data && todosResponse.data.status && todosResponse.data.response.length > 0) {
                const todos = todosResponse.data.response;
                buildTodoList(todos);
            } else {
                // something happened, show empty list
                buildTodoList(null, true);
            }
        });
    });


    $(document).on('click', '.delete-todo', function(e) {
        const elem = $(this), id = elem.data('id');
        // Check and set token
        checkAndSetAuthWithServer(function (headers) {
            const instance = getAxiosInstance(headers);
            // Delete todo
            instance.post('/todos/delete', {id: id, user_id: userId}).then(function (todosResponse) {
                if (todosResponse.data && todosResponse.data.status) {
                    const todos = todosResponse.data.response;
                    window.location.reload();
                }
            });
        });
    });
}


if (document.getElementById("edit-todo-view")) {
    let page = $('#edit-todo-view');
    // Check and set token
    checkAndSetAuthWithServer(function (headers) {
        const instance = getAxiosInstance(headers);
        // Get todos
        instance.get('/todos/single?id=' + page.data('todo-id')).then(function (todosResponse) {
            if (todosResponse.data && todosResponse.data.status) {
                const todo = todosResponse.data.response;
                $('input[name=title]').val(todo.title);
                $('input[name=due_date]').val(moment(todo.due_date).format('yyyy-MM-DDThh:mm:ss'));
                $('textarea[name=description]').val(todo.description);
                $('select[name=status]').val(todo.status);
            }
        });
    });


    $('#todo-form').on('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();
        const formData = new FormData(e.target);
        const values = Object.fromEntries(formData);
        
        // Check and set token
        checkAndSetAuthWithServer(function (headers) {
            const instance = getAxiosInstance(headers);
            // Update todo
            values.id = page.data('todo-id');
            values.user_id = userId;
            values.due_date = moment(values.due_date).format('YYYY-MM-DD HH:mm:ss');
            instance.post('/todos/update', values).then(function (todosResponse) {
                if (todosResponse.data && todosResponse.data.status) {
                    const message = todosResponse.data.message;
                    console.log(message);
                }
            });
        });
    });
}


if (document.getElementById("create-todo")) {
    $('#todo-form').on('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();
        const formData = new FormData(e.target);
        const values = Object.fromEntries(formData);
        
        // Check and set token
        checkAndSetAuthWithServer(function (headers) {
            const instance = getAxiosInstance(headers);
            // Update todo
            values.due_date = moment(values.due_date).format('YYYY-MM-DD HH:mm:ss');
            values.user_id = userId;
            instance.post('/todos/create', values).then(function (todosResponse) {
                if (todosResponse.data && todosResponse.data.status) {
                    const message = todosResponse.data.message;
                    
                    setTimeout(() => {
                        window.location.href = "/";
                    });
                }
            });
        });
    });
}
