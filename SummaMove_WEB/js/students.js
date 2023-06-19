"use strict"
const apiBasis = "http://127.0.0.1:8000/api/"
const addStudents = "students/"

const apiLogin = apiBasis + "login"
const apiRegister = apiBasis + "register"

var students = []
var selectedStudent = undefined

var loggedIn = false
var access_token = undefined

const load = async () => {
    await getAll()
    fillTable()
}

const getAll = async () => {
    console.log('Loading students...')
    try {
        const response = await axios.get(apiBasis + addStudents)
        students = await response.data
        console.log(students.length + "students loaded.")
    } catch (error) {
        console.log("Unexpected result.", error)
    }
}

const fillTable = () => {
    console.log("Showing students...")
    let tabelInhoud = ''
    if (loggedIn) {
        students.map(el => tabelInhoud += `<tr><td class="selectButton" onclick="select({
                id: ${el.id}, 
                first_name: '${el.first_name}', 
                last_name: '${el.last_name}',
                class: '${el.class}'
            }, this)">Selecteer</td>
            <td>${el.first_name}</td><td>${Floor(el.last_name)}</td><td>${Floor(el.class)}</td>
            <td onclick="remove(${el.id})"> x </td></tr>`)
    }
    else {
        students.map(el => tabelInhoud += `<tr><td class="selectButton" onclick="select({
            id: ${el.id}, 
            first_name: '${el.first_name}', 
            last_name: '${el.last_name}',
            class: '${el.class}'
        }, this)">Selecteer</td>
        <td>${el.first_name}</td><td>${Floor(el.last_name)}</td><td>${Floor(el.class)}</td>
        <td onclick="remove(${el.id})" style="display: none;"> x </td></tr>`)
    }
    if (tabelInhoud == '') {
        tabelInhoud = "Er zijn geen studenten gevonden."
        console.log("No students found.")
    }
    else {
        console.log("Succes.")
    }
    document.getElementById("index").innerHTML = tabelInhoud
}

const showSelected = () => {
    console.log("Showing selected student...")
    const title = document.getElementById("title")
    const content = document.getElementById("content")

    if (selectedStudent != undefined) {
        title.innerHTML = selectedStudent.first_name + " " + selectedStudent.last_name
        content.innerHTML = `
            <p>
                <strong>Firstname</strong> <br>
                ${selectedStudent.first_name}
            </p>

            <p>
            <strong>Last Name</strong> <br>
            ${selectedStudent.last_name}
            </p>

            <p>
            <strong>Class</strong> <br>
            ${selectedStudent.class}
            </p>
          
        `
    }
    else {
        title.innerHTML = ""
        content.innerHTML = ""

        console.log("Failed, no student selected.")
    }
}

// const login = async () => {
//     const password = document.getElementById("password").value
//     const email    = document.getElementById("email").value
//     const jsonstring = {"password":password, "email":email}
//     console.log("login: ", email)
//     const response = await axios.post(apiLogin, jsonstring, {headers: {'Content-Type': 'application/json'}})
//     console.log('status code', response.status)
//     if (response.status == 200) {
//         access_token = await response.data.access_token
//         console.log('access_token: ', access_token)

//         document.getElementById("loginForm").style.display = "none"
//         document.getElementById("createForm").style.display = "inline"
//         document.querySelectorAll(".tableContainer").forEach(tableContainer => tableContainer.style = "max-height: 33vh;")
//         document.querySelectorAll("td:last-child").forEach(el => el.style.display = "inline")
//         if (selectedExercise != undefined) {
//             document.getElementById("updateForm").style.display = "inline"
//         }

//         loggedIn = true
//     }
// }		

// const add = async () => {
//     try {
//         const name = document.getElementById("name").value
//         const instruction_nl = document.getElementById("instruction_nl").value
//         const instruction_en = document.getElementById("instruction_en").value
//         const jsonstring = { "name": name, "instruction_nl": instruction_nl, "instruction_en": instruction_en }
//         console.log("Adding exercise...", jsonstring)
//         const response = await axios.post(apiBasis + addExercises, jsonstring, { 
//             headers: {
//                 'Content-Type': 'application/json',
//                 'Accept': 'application/json',
//                 'Authorization':'Bearer '+ access_token 
//             } 
//         })
//         access_token = await response.data.access_token
//         if (response.status == 201) {
//             console.log("Succes.")
//             document.getElementById("name").value = ""
//             document.getElementById("instruction_nl").value = ""
//             document.getElementById("instruction_en").value = ""
//         }
//         else {
//             console.log('Unexpected result, status code: ', response.status)
//         }
//     } catch (error) {
//         console.log("Unexpected result.", error)
//     } finally {
//         load()
//     }
// }

// const update = async () => {
//     try {
//         const name = document.getElementById("nameEdit").value
//         const instruction_nl = document.getElementById("instruction_nlEdit").value
//         const instruction_en = document.getElementById("instruction_enEdit").value
//         const jsonstring = { "name": name, "instruction_nl": instruction_nl, "instruction_en": instruction_en }
//         console.log(`Changing exercise ${selectedExercise.id} To...`, jsonstring)
//         const response = await axios.patch(apiBasis + addExercises + selectedExercise.id, jsonstring, { 
//             headers: {
//                 'Content-Type': 'application/json',
//                 'Accept': 'application/json',
//                 'Authorization':'Bearer '+ access_token 
//             } 
//         })
//         access_token = await response.data.access_token
//         if (response.status == 200) {
//             console.log("Succes.")
//         }
//         else {
//             console.log('Unexpected result, status code: ', response.status)
//         }
//     } catch (error) {
//         console.log("Unexpected result.", error)
//     } finally {
//         await load()
//         showSelected()
//     }
// }

// const remove = async (id) => {
//     try {
//         console.log(`Deleting exercise ${id}...`)
//         const response = await axios.delete(apiBasis + addExercises + id, { 
//             headers: {
//                 'Content-Type': 'application/json',
//                 'Accept': 'application/json',
//                 'Authorization':'Bearer '+ access_token 
//             } 
//         })
//         access_token = await response.data.access_token
//         if (response.status == 200) {
//             console.log("Succes.")
//             if (id == selectedExercise.id) {
//                 await deSelect()
//             }
//         }
//         else {
//             console.log('Unexpected result, status code: ', response.status)
//         }
//     } catch (error) {
//         console.log("Unexpected result.", error)
//     } finally {
//         load()
//     }
// }

const select = async (student, button) => {
    // console.log(`Selecting student ${student.first_name + $student.last_name}...`)
    selectedStudent = student

    document.querySelectorAll(".selectButton").forEach(selectButton => {
        selectButton.className = "selectButton"
    })
    button.className += " selected"

    // // if (loggedIn) {
    // //     document.getElementById("updateForm").style.display = "initial"
    // // }
    // document.getElementById("first_nameEdit").value = student.first_name
    // document.getElementById("last_nameEdit").value = student.last_name
    // document.getElementById("classEdit").value = student.class

    await showSelected()

    console.log(`Succes.`)
}

const deSelect = async () => {
    console.log(`Deselecting the student...`)

    selectedStudent = undefined

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