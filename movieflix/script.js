let createButton = document.getElementById('create-button');
let createForm = document.getElementById('create-form');
let isCreateFormVisible = false;

let updateButton = document.getElementById('edit-button');
let updateForm = document.getElementById('update-form');
let isUpdateFormVisible = false;

let deleteButton = document.getElementById('delete-button');
let deleteForm = document.getElementById('delete-form');
let isDeleteFormVisible = false;

createButton.onclick = () => {
    console.log('test1');
    if(!isCreateFormVisible){
        createForm.style.display = 'block';
        updateForm.style.display = 'none';
        deleteForm.style.display = 'none';
        isDeleteFormVisible = false;
        isUpdateFormVisible = false;
        isCreateFormVisible = true;
    } else {
        createForm.style.display = 'none';
        isCreateFormVisible = false;
    }
}


updateButton.onclick = () => {
    if(!isUpdateFormVisible) {
        updateForm.style.display = 'block';
        createForm.style.display = 'none';
        deleteForm.style.display = 'none';
        isDeleteFormVisible = false;
        isCreateFormVisible = false;
        isUpdateFormVisible = true;
    } else {
        updateForm.style.display = 'none';
        isUpdateFormVisible = false;
    }
}

deleteButton.onclick = () => {
    if(!isDeleteFormVisible) {
        deleteForm.style.display = 'block';
        createForm.style.display = 'none';
        updateForm.style.display = 'none';
        isCreateFormVisible = false;
        isUpdateFormVisible = false;
        isDeleteFormVisible = true;
    } else {
        deleteForm.style.display = 'none';
        isDeleteFormVisible = false;
    }
}