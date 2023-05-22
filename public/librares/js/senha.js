const password = document.getElementById('password')
const passwordConfirmation = document.getElementById('password-confirmation')
const icon = document.getElementById('icon')
const iconConfirmation = document.getElementById('icon-confirmation')

function showHide() {
    if(password.type === 'password') {
        password.setAttribute('type', 'text')
        icon.classList.add('hide')
    }else {
        password.setAttribute('type', 'password')
        icon.classList.remove('hide')
    }
}

function showHideConfirmation() {
    if(passwordConfirmation.type === 'password') {
        passwordConfirmation.setAttribute('type', 'text')
        iconConfirmation.classList.add('hide')
    }else {
        passwordConfirmation.setAttribute('type', 'password')
        iconConfirmation.classList.remove('hide')
    }
}