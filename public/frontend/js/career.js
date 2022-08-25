// career Buttons
const careerBtns = document.querySelectorAll('.careerBtns');
careerBtns.forEach(element => {
    element.addEventListener('click', () => {
        event.target.classList.toggle('selected')
        event.target.classList.toggle('notSelected')
    })
});