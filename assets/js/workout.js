const add_more_btn    = document.querySelector('#add-more-button')
const section_workout = document.querySelector('section#treino')
const form            = document.querySelector('form')
const save_btn        = document.querySelector('#save-button')
const delete_button   = document.querySelector('#delete-btn')
const div_errors      = document.querySelector('.errors')
const select          = document.querySelector('select')
const data            = []

if (add_more_btn) add_more_btn.addEventListener('click', cloneFormSection)

function cloneFormSection () {
    const clonedForm = section_workout.cloneNode(true)
    form.appendChild(clonedForm)
}

if(form) form.addEventListener('click', delete_section)

function delete_section (evt) {
    if (evt.target.classList.contains('delete-btn')) {
        if(form.querySelectorAll('section').length > 1) {
            evt.target.closest('section').remove()
        } 
    }
}

if (save_btn) save_btn.addEventListener('click', send_to_save)

async function send_to_save (evt) {

    if(!verify_fields()) return 

    organize_fields()

    const req = await fetch('/workout-wise/workouts/save', {
        method: "POST",
        body: JSON.stringify(data)
    })

    const res = await req.json()
    
}

function verify_fields () {

    const all_fields = [...document.querySelectorAll('input,select')]

    const empty_fields = all_fields.filter (field => field.value === '')

    div_errors.innerHTML = ''
    if(empty_fields.length > 0) {
        div_errors.innerHTML = 'Todos os campos devem estar preenchidos.'
        return false
    }

    return true

}

function organize_fields () {

    data.length = 0

    const all_sections = document.querySelectorAll('section')

    all_sections.forEach (section => {
        
        const this_section_obj = {}

        section.querySelectorAll('input, select').forEach( field => this_section_obj[field.name] = field.value )
        this_section_obj.name = document.querySelector('[name="name"]').value

        data.push(this_section_obj)

    }) 
}

( async () => {
    
    const res       = await fetch(`/workout-wise/exercises/get_all`)
    const exercises = await res.json()
     
    if(exercises.length > 0) {

        exercises.forEach(exercise => {
    
            const option      = document.createElement('option')
            option.innerText  = exercise.name ?? ''
            option.value      = exercise.id ?? ''

            select.appendChild(option)

        });

    }


}) ()
