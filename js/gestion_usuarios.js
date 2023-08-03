$(document).ready(function(){
    buscar_datos();
    var funcion;
    function buscar_datos(consulta){
        funcion='buscar_usuarios_adm';
        $.post('../controlador/UsuarioController.php',{consulta,funcion},(response)=>{
            //console.log(response);
            const usuarios = JSON.parse(response);
            let template='';
            usuarios.forEach(usuario => {
                template+=`
                    <tr UsId="${usuario.id}" UsCedula="${usuario.cedula}" UsNombres="${usuario.nombres}" UsApellidos="${usuario.apellidos}" UsFechanacimiento="${usuario.edad}" UsSexo="${usuario.sexo}" UsDireccion="${usuario.direccion}" UsCorreo="${usuario.correo}" UsTelefono="${usuario.telefono}" UsPassword="${usuario.password}" UsRol="${usuario.tipo}">
                        <td>${usuario.id}</td>
                        <td>${usuario.cedula}</td>
                        <td>${usuario.nombres}</td>
                        <td>${usuario.apellidos}</td>
                        <td>${usuario.edad}</td>
                        <td>${usuario.sexo}</td>
                        <td>${usuario.direccion}</td>
                        <td>${usuario.correo}</td>
                        <td>${usuario.telefono}</td>
                        <td>${usuario.password}</td>
                        <td>${usuario.tipo}</td>
                        <td>
                            <button class="editar btn btn-success" type="button" data-toggle="modal" data-target="#editarusuario"><i class="fas fa-pencil-alt"></i>Editar</button>
                            <button class="eliminar btn btn-danger"><i class="fas fa-trash"></i>Eliminar</button>
                        </td>
                    </tr>
                `;
            });
            $('#usuarios').html(template);
        })
    }
    $(document).on('keyup','#buscar',function(){
        let valor = $(this).val();
        if(valor!=""){
            buscar_datos(valor);
        }
        else{
            buscar_datos();
        }
    }) 
    $(document).on('click','.eliminar',(e)=>{
        funcion='eliminar';
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id=$(elemento).attr('UsId');
        const cedula=$(elemento).attr('UsCedula');
        const nombres=$(elemento).attr('UsNombres');
        const apellidos=$(elemento).attr('UsApellidos');
        const edad=$(elemento).attr('UsFechanacimiento');
        const sexo=$(elemento).attr('UsSexo');
        const direccion=$(elemento).attr('UsDireccion');
        const correo=$(elemento).attr('UsCorreo');
        const telefono=$(elemento).attr('UsTelefono');
        const password=$(elemento).attr('UsPassword');
        const tipo=$(elemento).attr('UsRol');
        //console.log(id+cedula+nombres+apellidos+edad+sexo+direccion+correo+telefono+password+tipo);
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: '¿Desea eliminar a '+nombres+' '+apellidos+'?',
            text: "Esta acción no tiene retorno!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
                $.post('../controlador/UsuarioController.php',{id,funcion},(response)=>{
                    if(response=='eliminado'){
                        swalWithBootstrapButtons.fire(
                            'Usuario eliminado!',
                            'El usuario ha sido eliminado.',
                            'success'
                        )
                        buscar_usuarios_adm();
                    }
                })
              
            } else if (result.dismiss === Swal.DismissReason.cancel){
              swalWithBootstrapButtons.fire(
                'Cancelado',
                ''+nombres+' '+apellidos+' no ha sido eliminad@ :)',
                'error'
              )
            }
        })
    })
    $('#form-crear-usuario').submit(e=>{
        let cedula = $('#cedula').val();
        let nombres = $('#nombres').val();
        let apellidos = $('#apellidos').val();
        let fecha_nacimiento = $('#fecha_nacimiento').val();  
        let sexo = $('#sexo').val();  
        let direccion = $('#direccion').val();  
        let correo = $('#correo').val();
        let password = $('#password').val();
        let telefono = $('#telefono').val();
        let rol = $('#rol').val();
        funcion='crear';
        $.post('../controlador/UsuarioController.php',{funcion,cedula,nombres,apellidos,fecha_nacimiento,sexo,direccion,correo,password,telefono,rol},(response)=>{
            if(response=='add'){
                $('#add').hide('slow');
                $('#add').show(1500);
                $('#add').hide(2500);
                $('#form-crear-usuario').trigger('reset');
            }
            if(response=='noadd'){
                $('#noadd').hide('slow');
                $('#noadd').show(1500);
                $('#noadd').hide(2500);
                $('#form-crear-usuario').trigger('reset');
            }       
        });
        e.preventDefault();
    })
    $(document).on('click','.editar',(e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id=$(elemento).attr('UsId');
        const nombres=$(elemento).attr('UsNombres');
        const apellidos=$(elemento).attr('UsApellidos');
        const sexo=$(elemento).attr('UsSexo');
        const direccion=$(elemento).attr('UsDireccion');
        const correo=$(elemento).attr('UsCorreo');
        const telefono=$(elemento).attr('UsTelefono');
        const password=$(elemento).attr('UsPassword');
        const tipo=$(elemento).attr('UsRol');
        $('#editar_id_usuario').val(id);
        $('#editar_nombres_usuario').val(nombres);
        $('#editar_apellidos_usuario').val(apellidos);
        $('#editar_sexo_usuario').val(sexo);
        $('#editar_direccion_usuario').val(direccion);
        $('#editar_correo_usuario').val(correo);
        $('#editar_telefono_usuario').val(telefono);
        $('#editar_password_usuario').val(password);
        $('#editar_rol_usuario').val(tipo);
    });
    $('#form-editar-usuario').submit(e=>{
        let id= $('#editar_id_usuario').val();
        let nombres = $('#editar_nombres_usuario').val();
        let apellidos = $('#editar_apellidos_usuario').val(); 
        let sexo = $('#editar_sexo_usuario').val();  
        let direccion = $('#editar_direccion_usuario').val();  
        let correo = $('#editar_correo_usuario').val();
        let telefono = $('#editar_telefono_usuario').val();
        let password = $('#editar_password_usuario').val();
        let rol = $('#editar_rol_usuario').val();
        funcion='actualizar_usuario';
        //console.log(id_usuario+nombres+apellidos+sexo+direccion+correo+telefono+password+rol);
        $.post('../controlador/UsuarioController.php',{funcion,id,nombres,apellidos,sexo,direccion,correo,telefono,password,rol},(response)=>{
            console.log(response);
            if(response=='actualizado'){
                $('#edit-user').hide('slow');
                $('#edit-user').show(1500);
                $('#edit-user').hide(2500);
                $('#form-editar-usuario').trigger('reset');
                
            }
            else{
                $('#noedit-user').hide('slow');
                $('#noedit-user').show(1500);
                $('#noedit-user').hide(2500);
                $('#form-editar-usuario').trigger('reset');
            }       
        });
        e.preventDefault();
    });
});