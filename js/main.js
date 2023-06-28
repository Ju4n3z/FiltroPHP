addEventListener("DOMContentLoaded", ()=>{

    let myBoton = document.getElementById("listar");
    myBoton.addEventListener("click", ()=>{

    })

    let myform = document.querySelector("#MyForm")
    myform.addEventListener("submit", async(e)=>{
        e.preventDefault();
        let opc = e.submitter.dataset.accion;
        if(opc=="guardar"){
            let nombreCamper = document.querySelector("#nombreCamper").value;
            let apellidoCamper = document.querySelector("#apellidoCamper").value;
            let fechaNac = document.querySelector("#fechaNac").value;
            let idReg = parseInt(document.querySelector("#idReg").value);
            let config = {
                method:"POST",
                headers:{"Content-Type": "Application/json"},
                body:JSON.stringify(
                    {
                        "nombreCamper": nombreCamper,
                        "apellidoCamper": apellidoCamper,
                        "fechaNac": fechaNac,
                        "idReg": idReg
                      }
                )
            };
            let data = await (await fetch("http://localhost/ApolT01-018/FiltroPHP/uploads/campers", config)).text();
            console.log(data);
        }else if(opc=="listar"){
            let config = {
                method:"GET",
                headers:{"Content-Type": "Application/json"},
            };
            let tablah = document.querySelector("#tabla");
            tablah.innerHTML = "";
            let data = await (await fetch("http://localhost/ApolT01-018/FiltroPHP/uploads/campers", config)).json();
            console.log(data);
            data.forEach(element => {

                let tabla = `
                <tr>
                    <td>${element.idCamper}</td>
                    <td>${element.nombreCamper}</td>
                    <td>${element.apellidoCamper}</td>
                    <td>${element.fechaNac}</td>
                    <td>${element.idReg}</td>
                </tr>
                `

                tablah.insertAdjacentHTML("beforeend",tabla);
            });
        } else if(opc=="eliminar"){
            let idCamper = parseInt(document.querySelector("#idCamper").value);
            let config = {
                method:"DELETE",
                headers:{"Content-Type": "Application/json"},
                body:JSON.stringify(
                    {
                        "idCamper": idCamper
                        }
                )
            };
            let data = await (await fetch("http://localhost/ApolT01-018/FiltroPHP/uploads/campers", config)).text();
            console.log(data);
        } else if(opc=="actualizar"){
            let idCamper = parseInt(document.querySelector("#idCamper").value);
            let nombreCamper = document.querySelector("#nombreCamper").value;
            let apellidoCamper = document.querySelector("#apellidoCamper").value;
            let fechaNac = document.querySelector("#fechaNac").value;
            let idReg = parseInt(document.querySelector("#idReg").value);
            let config = {
                method:"PUT",
                headers:{"Content-Type": "Application/json"},
                body:JSON.stringify(
                    {
                        "idCamper": idCamper,
                        "nombreCamper": nombreCamper,
                        "apellidoCamper": apellidoCamper,
                        "fechaNac": fechaNac,
                        "idReg": idReg
                        }
                )
            };
            let data = await (await fetch("http://localhost/ApolT01-018/FiltroPHP/uploads/campers", config)).text();
            console.log(data);
        }
    })

})