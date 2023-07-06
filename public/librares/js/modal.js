console.log('est aqui')
const openButtonLoan = document.querySelector('.open-modal-loan')
const closeButtonLoan = document.querySelector('.close-modal-loan')

openButtonLoan.addEventListener('click', () => {
    showModalLoan()
})

function showModalLoan() {
    const modalLoan = document.querySelector(".modalLoan")
    modalLoan.showModal()
    console.log('1');
}

function closeModalLoan() {
    const modalLoan = document.querySelector(".modalLoan")
    modalLoan.close()
    console.log('2');
}

closeButtonLoan.addEventListener('click', () => {
    closeModalLoan()
})

const openButtonDevolution = document.querySelector('.open-modal-devolution')
const closeButtonDevolution = document.querySelector('.close-modal-devolution')


openButtonDevolution.addEventListener('click', () => {
    showModalDe()
})

function showModalDe() {
    const modalDevolution = document.querySelector(".modalDevolution")
    modalDevolution.showModal()
    console.log('1');
}

closeButtonDevolution.addEventListener('click', () => {
    modalDevolution.close()
})
