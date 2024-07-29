const btnGuardar = document.getElementById('btnGuardar')
const btnModificar = document.getElementById('btnModificar')
const btnBuscar = document.getElementById('btnBuscar')
const btnCancelar = document.getElementById('btnCancelar')
const btnLimpiar = document.getElementById('btnLimpiar')
const tablaMesa = document.getElementById('tablaMesas')
const formulario = document.querySelector('form')

btnModificar.parentElement.style.display = 'none'
btnCancelar.parentElement.style.display = 'none'

const getMesa = async (alerta = 'si') => {
    const numero = formulario.mesa_numero.value
    const capacidad = formulario.mesa_capacidad.value
    const ubicacion = formulario.mesa_ubicacion.value
    const url = `/restaurante_jimenez/controladores/mesas/index.php?mesa_numero=${numero}&mesa_capacidad=${capacidad}&mesa_ubicacion=${ubicacion}`
    const config = {
        method: 'GET'
    }

    try {
        const respuesta = await fetch(url, config);
        // console.log(respuesta)
        const data = await respuesta.json();
        tablaMesa.tBodies[0].innerHTML = ''
        const fragment = document.createDocumentFragment()
        let contador = 1;
        console.log(data);
        if (respuesta.status == 200) {
            if (alerta == 'si') {
                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    title: 'Mesa encontradas',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();
            }


            if (data.length > 0) {
                data.forEach(mesa => {
                    const tr = document.createElement('tr')
                    const celda1 = document.createElement('td')
                    const celda2 = document.createElement('td')
                    const celda3 = document.createElement('td')
                    const celda4 = document.createElement('td')
                    const celda5 = document.createElement('td')
                    const celda6 = document.createElement('td')
                    const buttonModificar = document.createElement('button')
                    const buttonEliminar = document.createElement('button')

                    celda1.innerText = contador;
                    celda2.innerText = mesa.MESA_NUMERO;
                    celda3.innerText = mesa.MESA_CAPACIDAD;
                    celda4.innerText = mesa.MESA_UBICACION;


                    buttonModificar.textContent = 'Modificar'
                    buttonModificar.classList.add('btn', 'btn-secondary', 'w-100')
                    buttonModificar.innerHTML = '<i class="bi bi-back"></i>'
                    buttonModificar.addEventListener('click', () => llenarDatos(mesa))

                    buttonEliminar.textContent = 'Eliminar'
                    buttonEliminar.classList.add('btn', 'btn-danger', 'w-100')
                    buttonEliminar.innerHTML = '<i class="bi bi-person-x-fill"></i>'
                    buttonEliminar.addEventListener('click', () => EliminarMesas(mesa.MESA_ID))

                    celda5.appendChild(buttonModificar)
                    celda6.appendChild(buttonEliminar)

                    tr.appendChild(celda1)
                    tr.appendChild(celda2)
                    tr.appendChild(celda3)
                    tr.appendChild(celda4)
                    tr.appendChild(celda5)
                    tr.appendChild(celda6)
                    fragment.appendChild(tr);

                    contador++
                });

            } else {
                const tr = document.createElement('tr')
                const td = document.createElement('td')
                td.innerText = 'No hay mesas disponibles'
                td.classList.add('text-center')
                td.colSpan = 6;

                tr.appendChild(td)
                fragment.appendChild(tr)
            }
        } else {
            // console.log('hola');
        }

        tablaMesa.tBodies[0].appendChild(fragment)
    } catch (error) {
        // console.log(error);
    }
}

//GUARDAR
const guardarMesas = async (e) => {
    e.preventDefault()
    btnGuardar.disabled = true

    const url = '/restaurante_jimenez/controladores/mesas/index.php'
    const formData = new FormData(formulario)
    // console.log(formulario);
    formData.append('tipo', 1)
    formData.delete('mesa_id')
    const config = {
        method: 'POST',
        body: formData
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json()
        const { mensaje, codigo, detalle } = data
        // console.log(data)
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "success",
            title: mensaje,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer
                toast.onmouseleave = Swal.resumeTimer
            }
        }).fire()
        if (codigo == 1 && respuesta.status == 200) {
            formulario.reset()
            getMesa(alerta = 'no');
        } else {
            console.log(detalle)
        }

    } catch (error) {
        console.log(error)
    }
    btnGuardar.disabled = false
}


const llenarDatos = (mesa) => {

    // console.log(cliente)
    formulario.mesa_id.value = mesa.MESA_ID
    formulario.mesa_numero.value = mesa.MESA_NUMERO
    formulario.mesa_capacidad.value = mesa.MESA_CAPACIDAD
    formulario.mesa_ubicacion.value = mesa.MESA_UBICACION
    

    btnModificar.parentElement.style.display = ''
    btnCancelar.parentElement.style.display = ''
    btnGuardar.parentElement.style.display = 'none'
    btnBuscar.parentElement.style.display = 'none'
    btnLimpiar.parentElement.style.display = 'none'

}

//MODIFICAR

const ModificarMesas = async (e) => {
    e.preventDefault()
    btnModificar.disabled = true

    const url = '/restaurante_jimenez/controladores/mesas/index.php'
    const formData = new FormData(formulario)
    // console.log(formulario);
    formData.append('tipo', 2)
    const config = {
        method: 'POST',
        body: formData
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json()
        const { mensaje, codigo, detalle } = data
        console.log(data)
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "success",
            title: mensaje,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer
                toast.onmouseleave = Swal.resumeTimer
            }
        }).fire()
        if (codigo == 2 && respuesta.status == 200) {
            formulario.reset()
            getMesa(alerta = 'no');
            btnModificar.parentElement.style.display = 'none'
            btnCancelar.parentElement.style.display = 'none'
            btnGuardar.parentElement.style.display = ''
            btnBuscar.parentElement.style.display = ''
            btnLimpiar.parentElement.style.display = ''
        } else {
            console.log(detalle)
        }

    } catch (error) {
        console.log(error)
    }
    btnModificar.disabled = false
}

const cancelar = () => {
    formulario.reset()
    getMesa();
    btnModificar.parentElement.style.display = 'none'
    btnCancelar.parentElement.style.display = 'none'
    btnGuardar.parentElement.style.display = ''
    btnBuscar.parentElement.style.display = ''
    btnLimpiar.parentElement.style.display = ''
}

//ELIMINAR

const EliminarMesas = async (mesa) => {

    console.log(mesa)
    const url = '/restaurante_jimenez/controladores/mesas/index.php'
    const formData = new FormData(formulario)
    // console.log(formulario);
    formData.append('tipo', 3)
    formData.append('mesa_id', mesa)
    const config = {
        method: 'POST',
        body: formData
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json()
        const { mensaje, codigo, detalle } = data
        console.log(data)
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "success",
            title: mensaje,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer
                toast.onmouseleave = Swal.resumeTimer
            }
        }).fire()
        if (codigo == 3 && respuesta.status == 200) {
            formulario.reset()
            getMesa(alerta = 'no');
            btnModificar.parentElement.style.display = 'none'
            btnCancelar.parentElement.style.display = 'none'
            btnGuardar.parentElement.style.display = ''
            btnBuscar.parentElement.style.display = ''
            btnLimpiar.parentElement.style.display = ''
        } else {
            console.log(detalle)
        }

    } catch (error) {
        console.log(error)
    }
    btnModificar.disabled = false
}

getMesa();


formulario.addEventListener('submit', guardarMesas)
btnModificar.addEventListener('click', ModificarMesas)
btnBuscar.addEventListener('click', () => { getMesa(alerta = 'si') })
btnCancelar.addEventListener('click',cancelar)