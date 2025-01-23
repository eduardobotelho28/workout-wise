const add_more_btn    = document.querySelector('#add-more-button')
const section_workout = document.querySelector('section#treino')
const form            = document.querySelector('form')

if (add_more_btn) add_more_btn.addEventListener('click', cloneForm)

function cloneForm () {
    
    const clonedForm = section_workout.cloneNode(true)

    form.appendChild(clonedForm)

}