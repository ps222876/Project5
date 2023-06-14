"use strict"
const apiBasis = "http://127.0.0.1:8000/api/"
const addExercises = "exercises/"

const apiLogin = apiBasis + "login"
const apiRegister = apiBasis + "register"

var exercises = []
var selectedExercise = undefined

var loggedIn = false
var access_token = undefined

const load = async () => {
    await getAll()
    fillTable()
}

const getAll = async () => {
    console.log('Loading exercises...')
    try {
        const response = await axios.get(apiBasis + addExercises)
        exercises = await response.data
        console.log(exercises.length + " exercises loaded.")
    } catch (error) {
        console.log("Unexpected result.", error)
    }
}

const fillTable = () => {
    console.log("Showing exercises...")
    let tabelInhoud = ''
    if (loggedIn) {
        exercises.map(el => tabelInhoud += `<tr><td class="selectButton" onclick="select({
                id: ${el.id}, 
                name: '${el.name}', 
                instruction_nl: '${el.instruction_nl}',
                instruction_en: '${el.instruction_en}'
            }, this)">Selecteer</td>
            <td>${el.name}</td><td>${Floor(el.instruction_nl)}</td><td>${Floor(el.instruction_en)}</td>
            <td onclick="deleteComponent(${el.id})"> x </td></tr>`)
    }
    else {
        exercises.map(el => tabelInhoud += `<tr><td class="selectButton" onclick="select({
            id: ${el.id}, 
            name: '${el.name}', 
            instruction_nl: '${el.instruction_nl}',
            instruction_en: '${el.instruction_en}'
        }, this)">Selecteer</td>
        <td>${el.name}</td><td>${Floor(el.instructoin_nl)}</td><td>${Floor(el.instruction_en)}</td>
        <td onclick="deleteComponent(${el.id})" style="display: none;"> x </td></tr>`)
}
    if (tabelInhoud == '') {
        tabelInhoud = "Er zijn geen oefeningen gevonden."
        console.log("No exercises found.")
    }
    else {
        console.log("Succes.")
    }
    document.getElementById("index").innerHTML = tabelInhoud
}

const showSelected = () => {
    console.log("Showing selected exercise...")
    const title = document.getElementById("title")
    const content = document.getElementById("content")

    if (selectedExercise != undefined) {
        title.innerHTML = selectedExercise.name
        content.innerHTML = `
            <p>
                <strong>Instructie Nederlands</strong> <br>
                ${selectedExercise.instruction_nl}
            </p>
            <p>
                <strong>Instruction English</strong> <br>
                ${selectedExercise.instruction_en != "" ? selectedExercise.instruction_en : "No instruction available."}
            </p>
        `
    }
    else {
        title.innerHTML = ""
        content.innerHTML = ""

        console.log("Failed, no exercise selected.")
    }
}

const login = async () => {
    const password = document.getElementById("password").value
    const email    = document.getElementById("email").value
    const jsonstring = {"password":password, "email":email}
    console.log("login: ", email)
    const response = await axios.post(apiLogin, jsonstring, {headers: {'Content-Type': 'application/json'}})
    console.log('status code', response.status)
    if (response.status == 200) {
        access_token = await response.data.access_token
        console.log('access_token: ', access_token)
        
        document.getElementById("loginForm").style.display = "none"
        document.getElementById("createForm").style.display = "inline"
        document.querySelectorAll("td:last-child").forEach(el => el.style.display = "inline")
        if (selectedExercise != undefined) {
            document.getElementById("updateForm").style.display = "inline"
        }
    
        loggedIn = true
    }
}		

const add = async () => {
    try {
        const name = document.getElementById("name").value
        const instruction_nl = document.getElementById("instruction_nl").value
        const instruction_en = document.getElementById("instruction_en").value
        const jsonstring = { "name": name, "instruction_nl": instruction_nl, "instruction_en": instruction_en }
        console.log("Adding exercise...", jsonstring)
        const response = await axios.post(apiBasis + addExercises, jsonstring, { 
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization':'Bearer '+ access_token 
            } 
        })
        if (response.status == 201) {
            console.log("Succes.")
        }
        else {
            console.log('Unexpected result, status code: ', response.status)
        }
    } catch (error) {
        console.log("Unexpected result.", error)
    } finally {
        load()
    }
}

const edit = async () => {
    try {
        const name = document.getElementById("nameEdit").value
        const instruction_nl = document.getElementById("instruction_nlEdit").value
        const instruction_en = document.getElementById("instruction_enEdit").value
        const jsonstring = { "name": name, "instruction_nl": instruction_nl, "instruction_en": instruction_en }
        console.log(`Changing exercise ${selectedExercise.id} To...`, jsonstring)
        const response = await axios.patch(apiBasis + addExercises + selectedExercise.id, jsonstring, { 
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization':'Bearer '+ access_token 
            } 
        })
        if (response.status == 200) {
            console.log("Succes.")
        }
        else {
            console.log('Unexpected result, status code: ', response.status)
        }
    } catch (error) {
        console.log("Unexpected result.", error)
    } finally {
        await load()
        showSelected()
    }
}

const remove = async (id) => {
    try {
        console.log(`Deleting exercise ${id}...`)
        const response = await axios.delete(apiBasis + addExercises + id, { 
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization':'Bearer '+ access_token 
            } 
        })
        if (response.status == 200) {
            console.log("Succes.")
            if (id == selectedExercise.id) {
                await deSelect()
            }
        }
        else {
            console.log('Unexpected result, status code: ', response.status)
        }
    } catch (error) {
        console.log("Unexpected result.", error)
    } finally {
        load()
    }
}

const select = async (exercise, button) => {
    console.log(`Selecting exercise ${exercise.name}...`)
    selectedExercise = exercise

    document.querySelectorAll(".selectButton").forEach(selectButton => {
        selectButton.className = "selectButton"
    })
    button.className += " selected"

    if (loggedIn) {
        document.getElementById("updateForm").style.display = "initial"
    }
    document.getElementById("nameEdit").value = exercise.name
    document.getElementById("instruction_nl").value = exercise.instruction_nl
    document.getElementById("instruction_en").value = exercise.instruction_en

    await showSelected()
    
    console.log(`Succes.`)
}

const deSelect = async () => {
    console.log(`Deselecting the exercise...`)

    selectedExercise = undefined

    document.querySelectorAll(".selected").forEach(selectButton => {
        selectButton.className = "selectButton"
    });

    document.getElementById("updateForm").style.display = "none"

    await showSelected()

    console.log('Succes.')
}

const Floor = (str) => {
    const maxCharLength = screen.width / 37
    if (str.length > maxCharLength) {
        return str.slice(0, maxCharLength - 3) + "..."
    } return str
}