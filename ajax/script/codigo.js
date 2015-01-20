window.addEventListener("load", function() {
    var paginaActual = 0;
    cargarPagina(0);
    agregarEventoVerInsertar();
    function agregarEventoVerInsertar() {
        var elemento = document.getElementById("btverinsertar");
        elemento.addEventListener("click", function() {
            $("#btsiI").unbind("click");
            $("#btsiI").on("click", function() {
                var login = document.getElementById("login").value;
                var clave = document.getElementById("clave").value;
                var nombre = document.getElementById("nombre").value;
                var apellidos = document.getElementById("apellidos").value;
                var email = document.getElementById("email").value;
                var rol = document.getElementById("rol").value;
                var isroot = document.getElementById("isroot").value;
                var isactivo = document.getElementById("isactivo").value;
                var datos = {
                    login: login,
                    clave: clave,
                    nombre: nombre,
                    apellidos: apellidos,
                    email: email,
                    rol: rol,
                    isroot: isroot,
                    isactivo: isactivo
                };
                ajaxInsert(datos);
                $("#dialogomodalInsertar").modal('hide');
            });
            $("#btnoI").unbind("click");
            $("#btnoI").on("click", function() {
                $("#dialogomodalInsertar").modal('hide');
                tostada("Inserción cancelada", 2);
            });
            $('#dialogomodalInsertar').modal('show');
        });
    }

    function ajaxInsert(datos) {
        $.ajax({
            url: "ajaxinsert.php",
            //type: "post",
            data: datos,
            success: function(result) {
                if (result.r === 0) {
                    tostada("No se ha podido insertar", 2);
                } else {
                    tostada("usuario insertado", 1);
                    destruirTabla();
                    construirTabla(result);
                    crearEventos();
                    
                    login.value = "";
                    clave.value = "";
                    nombre.value = "";
                    apellidos.value = "";
                    email.value = "";
                    rol.value = "";
                    isroot.value = "";
                    isactivo.value = "";
                }
            },
            error: function() {
                tostada("No se ha podido insertar. Error ajax", 2);
            }
        });
    }

    function cargarPagina(pagina) {
        paginaActual = pagina;
        $.ajax({
            url: "ajaxselect.php?pagina=" + pagina,
            success: function(result) {
                //alert(result.usuarios[0].login);            
                //$("#divajax").html(result.usuarios[0].login);
                destruirTabla();
                construirTabla(result);
                crearEventos();
            },
            error: function() {
                alert("error");
            }
        });
    }
    function crearEventos() {
        var enlaces = document.getElementsByClassName("enlace");
        for (var i = 0; i < enlaces.length; i++) {
            agregarEvento(enlaces[i]);
        }

        var enlacesEditar = document.getElementsByClassName("enlace-editar");
        for (var i = 0; i < enlacesEditar.length; i++) {
            agregarEventoEditar(enlacesEditar[i]);
        }

        var enlacesBorrar = document.getElementsByClassName("enlace-borrar");
        for (var i = 0; i < enlacesBorrar.length; i++) {
            agregarEventoBorrar(enlacesBorrar[i]);
        }
    }

    function agregarEvento(elemento) {
        var datahref = elemento.getAttribute("data-href");
        elemento.addEventListener("click", function(e) {
            cargarPagina(datahref);
        });
    }

    function agregarEventoEditar(elemento) {
        var dataEditar = elemento.getAttribute("data-editar");
        elemento.addEventListener("click", function(e) {
            editar(dataEditar);
        });
    }

    function editar(dataEditar) {
        $.ajax({
            url: "ajaxget.php?login=" + dataEditar,
            success: function(result) {
                console.log(result.r);
                if (result.r === 0) {
                    tostada("No existe el usuario", 2);
                } else {
                    //tostada("Existe el usuario", 2);
                    var login = document.getElementById("login");
                    var clave = document.getElementById("clave");
                    var nombre = document.getElementById("nombre");
                    var apellidos = document.getElementById("apellidos");
                    var email = document.getElementById("email");
                    var rol = document.getElementById("rol");
                    var isroot = document.getElementById("isroot");
                    var isactivo = document.getElementById("isactivo");
                    usuarioEdit = result.persona;

                    var loginpk = usuarioEdit.login;
                    login.value = usuarioEdit.login;
                    clave.value = usuarioEdit.clave;
                    nombre.value = usuarioEdit.nombre;
                    apellidos.value = usuarioEdit.apellidos;
                    email.value = usuarioEdit.email;
                    rol.value = usuarioEdit.rol;
                    isroot.value = usuarioEdit.isroot;
                    isactivo.value = usuarioEdit.isactivo;
                    mostrarEditar(loginpk);
                }
            },
            error: function() {
                tostada("No existe el usuario.Error ajax", 2);
            }
        });
        function mostrarEditar(loginpk) {
            $("#btsiI").unbind("click");
            $("#btsiI").on("click", function() {
                var login = document.getElementById("login").value;
                var clave = document.getElementById("clave").value;
                var nombre = document.getElementById("nombre").value;
                var apellidos = document.getElementById("apellidos").value;
                var email = document.getElementById("email").value;
                var rol = document.getElementById("rol").value;
                var isroot = document.getElementById("isroot").value;
                var isactivo = document.getElementById("isactivo").value;
                var datos = {
                    pagina: paginaActual,
                    loginpk: loginpk,
                    login: login,
                    clave: clave,
                    nombre: nombre,
                    apellidos: apellidos,
                    email: email,
                    rol: rol,
                    isroot: isroot,
                    isactivo: isactivo
                };
                update(datos);
                $("#dialogomodalInsertar").modal('hide');
            });
            $("#btnoI").unbind("click");
            $("#btnoI").on("click", function() {
                $("#dialogomodalInsertar").modal('hide');
                tostada("Inserción cancelada", 2);
            });
            $('#dialogomodalInsertar').modal('show');
        }
    }

    function update(datos) {
        $.ajax({
            url: "ajaxupdate.php",
            type: "post",
            data: datos,
            success: function(result) {
                if (result.r === 0) {
                    tostada("No se ha podido actualizar", 2);
                } else {
                    tostada("usuario actualizado", 2);
                    destruirTabla();
                    construirTabla(result);
                    crearEventos();
                }
            },
            error: function() {
                tostada("No se ha podido actualizar. Error ajax", 2);
            }
        });
    }

    function agregarEventoBorrar(elemento) {
        var mensaje = elemento.getAttribute("data-borrar");
        elemento.addEventListener("click", function() {
            confirmarBorrar(mensaje);
        });
    }

    function confirmarBorrar(mensaje) {
        var cm = document.getElementById("contenidomodal");
        cm.innerHTML = "¿Borrar " + mensaje + "?";
        $("#btsi").unbind("click");
        $("#btsi").on("click", function() {
            $("#dialogomodal").modal('hide');
            borrar(mensaje, paginaActual);
        });
        $("#btno").unbind("click");
        $("#btno").on("click", function(e) {
            $("#dialogomodal").modal('hide');
            tostada("Borrado cancelado", 2);
        });
        $('#dialogomodal').modal('show');
    }

    function borrar(login, posicion) {
        $.ajax({
            url: "ajaxdelete.php?login=" + login + "&pagina=" + posicion,
            success: function(result) {
                console.log(result);
                if (result.r === 0) {
                    tostada("No se ha podido borrar", 2);
                } else {
                    tostada("usuario " + login + " borrado", 2);
                    destruirTabla();
                    construirTabla(result);
                    crearEventos();
                }
            },
            error: function() {
                tostada("No se ha podido borrar", 2);
            }
        });
    }

    function destruirTabla() {
        var divajax = document.getElementById("divajax");
        while (divajax.hasChildNodes()) {
            divajax.removeChild(divajax.firstChild);
        }
    }

    function construirTabla(datos) {
        var tabla = document.createElement("table");
        var tr, td, th;
        /*
         var cont = 0;
         for (var i = 0 in datos.usuarios) {
         if (cont === 0) {
         tr = document.createElement("tr");
         for (var j = 0 in datos.usuarios[i]) {
         th = document.createElement("th");
         th.textContent = j;
         tr.appendChild(th);
         }
         tabla.appendChild(tr);
         }
         cont++;
         
         tr = document.createElement("tr");
         for (var k = 0 in datos.usuarios[i]) {
         td = document.createElement("td");
         td.textContent = datos.usuarios[i][k];
         tr.appendChild(td)
         }
         tabla.appendChild(tr);
         }*/

        for (var i = 0; i < datos.usuarios.length; i++) {
            if (i === 0) {
                tr = document.createElement("tr");
                for (var j = 0 in datos.usuarios[i]) {
                    th = document.createElement("th");
                    th.textContent = j;
                    tr.appendChild(th);
                }
            }
            tabla.appendChild(tr);
            tr = document.createElement("tr");
            for (var j = 0 in datos.usuarios[i]) {
                td = document.createElement("td");
                td.textContent = datos.usuarios[i][j];
                tr.appendChild(td)
            }
            td = document.createElement("td");
            td.innerHTML = "<a class='enlace-editar' data-editar='" + datos.usuarios[i].login + "'>Editar</a>";
            tr.appendChild(td);
            td = document.createElement("td");
            td.innerHTML = "<a class='enlace-borrar' data-borrar='" + datos.usuarios[i].login + "'>Borrar</a>";
            tr.appendChild(td);
            tabla.appendChild(tr);
        }
        /* paginacion */
        tr = document.createElement("tr");
        td = document.createElement("th");
        td.setAttribute("colspan", "10");
        /*td.textContent = "" + datos.paginas.inicio + " " + datos.paginas.anterior + " " +
         datos.paginas.primero + " " + datos.paginas.segundo + " " + datos.paginas.actual
         + " " + datos.paginas.cuarto + " " + datos.paginas.quinto + " " + datos.paginas.siguiente
         + " " + datos.paginas.ultimo;*/


        td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.inicio + "'>&lt&lt;</a>";
        td.innerHTML += "&nbsp;";
        td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.anterior + "'>&lt;</a>";
        td.innerHTML += "&nbsp;";
        if (datos.paginas.primero !== -1) {
            td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.primero + "'>" +
                    (parseInt(datos.paginas.primero) + 1) + "</a>";
            td.innerHTML += "&nbsp;";
        }
        if (datos.paginas.segundo !== -1) {
            td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.segundo + "'>" +
                    (parseInt(datos.paginas.segundo) + 1) + "</a>";
            td.innerHTML += "&nbsp;";
        }
        if (datos.paginas.actual !== -1) {
            td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.actual + "'>" +
                    (parseInt(datos.paginas.actual) + 1) + "</a>";
            td.innerHTML += "&nbsp;";
        }
        if (datos.paginas.cuarto !== -1) {
            td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.cuarto + "'>" +
                    (parseInt(datos.paginas.cuarto) + 1) + "</a>";
            td.innerHTML += "&nbsp;";
        }
        if (datos.paginas.quinto !== -1) {
            td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.quinto + "'>" +
                    (parseInt(datos.paginas.quinto) + 1) + "</a>";
            td.innerHTML += "&nbsp;";
        }
        td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.siguiente + "'>&gt;</a>";
        td.innerHTML += "&nbsp;";
        td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.ultimo + "'>&gt;&gt;</a>";
        tr.appendChild(td);
        tabla.appendChild(tr);
        var divajax = document.getElementById("divajax");
        divajax.appendChild(tabla);
    }

});


