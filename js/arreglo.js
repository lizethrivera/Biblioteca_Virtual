var indiceInstructorSeleccionada = null;

var classroom = [
    {
        instructor: {
            nombre:"Goku",
            correo: "goku@gmail.com",
            imagen: "goku.jpg",
        },
        clases: [
            {
                nombreClase: "Desarrollo web",
                codigo: "asdasd",
                seccion: "1300",
                descripcion: "Probar habilidades",
                aula: "078",
            },
        ],
    },

    {
        instructor: {
            nombre:"Vegeta",
            correo: "vegeta@gmail.com",
            imagen: "vegeta.jpg",
        },
        clases: [
            {
                nombreClase: "POO",
                codigo: "qweqwe",
                seccion: "1500",
                descripcion: "Practicar",
                aula: "078",
            },
            {
                nombreClase: "Economia",
                codigo: "qweqwe2",
                seccion: "1600",
                descripcion: "Practicar2",
                aula: "078",
            },
            {
                nombreClase: "Redes",
                codigo: "qweqwe3",
                seccion: "2000",
                descripcion: "Practicar3",
                aula: "078",
            }
        ],
    },

    {
        instructor: {
            nombre:"Patricio",
            correo: "patricio@gmail.com",
            imagen: "patricio.jpg",
        },
        clases: [
            {
                nombreClase: "Inteligencia Artificial",
                codigo: "zxczxczxc",
                seccion: "1700",
                descripcion: "Clase del futuro",
                aula: "078",
            },
            {
                nombreClase: "Sistemas expertos",
                codigo: "zxczxczxc2",
                seccion: "1800",
                descripcion: "Clase del futuro2",
                aula: "078",
            },
            {
                nombreClase: "Computacion cuántica",
                codigo: "zxczxczx3",
                seccion: "1900",
                descripcion: "Clase del futuro3",
                aula: "078",
            },
            {
                nombreClase: "Coompiladores",
                codigo: "zxczxczx4",
                seccion: "2100",
                descripcion: "Clase del futuro4",
                aula: "078",
            }
        ],
    },
]

//Uso de LocalStorage
var localStorage = window.localStorage;
if (localStorage.getItem('classroom') == null) {
    localStorage.setItem('classroom', JSON.stringify(classroom));; //De JSON a cadena// //Guardamos el listado de las aplicaciones por primera vez
}else{
    classroom = JSON.parse(localStorage.getItem('classroom')); //De cadena a JSON //Si hay algun elemento en localStorage que se llama aplicaciones, rescatamos el valor y lo almacenamos en el listado de aplicaciones.
}

//Empezar con 0
// document.getElementById('profilePic').innerHTML = `<img id="imgInstructor" src="img/home/profile-pics/defaultProfilePic.png" alt="" srcset=""></img>`;

function obtenerInstructores() {
    // document.getElementById('dropMenu').innerHTML = '';
    // var texto = '';
    
    // for (let i = 0; i < classroom.length; i++) {
    //     const element = classroom[i].instructor.nombre;

    //     //console.log(element);
    //     document.getElementById('dropMenu').innerHTML += `
    //     <div class="instructor row" style="display: flex;" onclick="obtenerClases(${i})">
    //         <span class="dropdown-item infoInstructor col-1"><img id="imgInstructor" src="img/home/profile-pics/${classroom[i].instructor.imagen}" alt="" srcset=""></span>
    //         <div class="infoInstructor col-11">
    //             <h5 style="margin-left: 10px; margin-bottom: 0px; font-size: 15px;">${classroom[i].instructor.nombre}</h5>
    //             <small class = "text-muted" style="margin-left: 10px;">${classroom[i].instructor.correo}</small>
    //         </div>
    //     </div>
    //     ${texto}
    //     `;
    // }
    //Otra Info para Dropdown
    // document.getElementById('dropMenu').innerHTML += `
    // <div class="instructor row" style="display: flex;">
    //     <span class="dropdown-item infoInstructor"style ="display:flex; margin: 5px 0px 0px 13px;" id = "addUser">
    //         <i class="fas fa-gear"></i>
    //         <h5 style="margin-bottom: 0px; font-size: 15px; margin-left: 18px;"> Configuracion</h5>
    //     </span>
    //     <span class="dropdown-item infoInstructor"style ="display:flex; margin: 5px 0px 0px 13px;" id = "addUser">
    //         <i class="fas fa-right-from-bracket"></i>
    //         <h5 style="margin-bottom: 0px; font-size: 15px; margin-left: 18px;"> Cerrar Sesion</h5>
    //     </span>
    // </div>
    // `;
    }

function obtenerClases(indice) {
    console.log("Entro a funcion", indice);

    indiceInstructorSeleccionada = indice;
    // document.getElementById('tarjetasClases').innerHTML = '';
    // document.getElementById('clasesSideBar').innerHTML = '';
    // document.getElementById('profilePic').innerHTML = `<img id="imgInstructor" src="img/home/profile-pics/${classroom[indice].instructor.imagen}" alt="" srcset=""></img>`;

    for (let i = 0; i < classroom[indice].clases.length; i++) {
        var element = classroom[indice].clases;
        let random = Math.floor(Math.random() * (20 - 1) + 1);
        var classLi = "";

        let r = Math.floor(Math.random() * (255 - 0) + 0);
        let g = Math.floor(Math.random() * (255 - 0) + 0);
        let b = Math.floor(Math.random() * (255 - 0) + 0);

        let nImagen = "img"+ random+".jpg";
        //console.log(nImagen);
        
        if(i == 0){
            classLi = "list active";
        }else{
            classLi = "list";
        }

        // document.getElementById('clasesSideBar').innerHTML += `
        //     <li class="${classLi}">
        //         <b></b>
        //         <b></b>
        //         <a href="#">
        //             <span class="icon"><i class="rightBarIcons" style="margin-top: 12px; margin-left: 10px; background-color: rgb(${r},${g},${b}); color: white; font-weight: 600">${element[i].nombreClase.charAt(0)}</i></span>
        //             <span class="title">${element[i].nombreClase}</span>
        //         </a>
        //     </li>
        // `;

        
        // document.getElementById('tarjetasClases').innerHTML += `
        // <div class="tarjeta">
		// 	<div class="cabecera" style="background: url(img/home/classes-background/${nImagen});background-repeat: no-repeat;-webkit-background-size: cover;background-size: cover;">
		// 	</div>
            
		// 	<div class="medio">				
        //         <a class="parte1" href="">
        //             <div class="titulo">${element[i].seccion} - ${element[i].nombreClase}</div>	
        //         </a>
		// 	</div>

        //     <div class="pie">				
		// 		<span class="icon2"><i class="fa-solid fa-pen"></i></span>
		// 		<span class="icon1"><i class="fa-solid fa-eye"></i></span>
		// 	</div>
		// </div>
        // `;
    }

    let list = document.querySelectorAll('.list');
        for (let i = 0; i < list.length; i++) {
            list[i].onclick = function(){
                let j = 0;
                while (j < list.length){
                    list[j++].className = 'list';
                }
                list[i].className = 'list active';
            }
            
        }
}


function crearClase() {
    const clase = {
        nombreClase: document.getElementById('nombreClase').value,
        codigo: document.getElementById('codigo').value,
        seccion: document.getElementById('seccion').value,
        descripcion: document.getElementById('descripcion').value,
        aula: document.getElementById('aula').value,
    }

    //console.log(clase);
    classroom[indiceInstructorSeleccionada].clases.push(clase);
    //console.log(classroom);   
    localStorage.setItem('classroom', JSON.stringify(classroom));    
    obtenerClases(indiceInstructorSeleccionada); 
    vaciarCampos();
    $('#modalAddClass').modal('hide');
}

function vaciarCampos() {
    console.log("Vacio");
    document.getElementById('nombreClase').value = '';
    document.getElementById('codigo').value = '';
    document.getElementById('seccion').value = '';
    document.getElementById('descripcion').value = '';
    document.getElementById('aula').value = '';
}

obtenerClases(2);
