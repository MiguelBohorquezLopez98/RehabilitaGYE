$(document).ready(function(){
    buscar_datos();
    var funcion;
    function buscar_datos(consulta){
        funcion='buscar_paciente';
        $.post('../controlador/PacienteController.php',{consulta,funcion},(response)=>{
            //console.log(response);
            const pacientes = JSON.parse(response);
            let template='';
            pacientes.forEach(paciente => {
                template+=`
                    <tr UsId="${paciente.id}" UsCedula="${paciente.cedula}" UsNombres="${paciente.nombres}" UsApellidos="${paciente.apellidos}" UsFechanacimiento="${paciente.edad}" UsSexo="${paciente.sexo}" UsDireccion="${paciente.direccion}" UsCorreo="${paciente.correo}" UsTelefono="${paciente.telefono}" UsPassword="${paciente.password}" UsRol="${paciente.tipo}">
                        <td>${paciente.id}</td>
                        <td>${paciente.cedula}</td>
                        <td>${paciente.nombres}</td>
                        <td>${paciente.apellidos}</td>
                        <td>${paciente.edad}</td>
                        <td>${paciente.sexo}</td>
                        <td>${paciente.direccion}</td>
                        <td>${paciente.correo}</td>
                        <td>${paciente.telefono}</td>
                        <td>
                            <button class="editar btn btn-success" type="button" data-toggle="modal" data-target="#editarpaciente"><i class="fas fa-pencil-alt"></i>Editar</button>
                            <button class="eliminar btn btn-danger"><i class="fas fa-trash"></i>Eliminar</button>
                        </td>
                    </tr>
                `;
            });
            $('#pacientes').html(template);
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
        funcion='eliminar_paciente';
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
        console.log(id+cedula+nombres+apellidos+edad+sexo+direccion+correo+telefono+password+tipo);
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
                $.post('../controlador/PacienteController.php',{id,funcion},(response)=>{
                    if(response=='eliminado'){
                        swalWithBootstrapButtons.fire(
                            'Usuario eliminado!',
                            'El usuario ha sido eliminado.',
                            'success'
                        )
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
    $('#form-crear-paciente').submit(e=>{
        let cedula = $('#cedula').val();
        let nombres = $('#nombres').val();
        let apellidos = $('#apellidos').val();
        let fecha_nacimiento = $('#fecha_nacimiento').val();  
        let sexo = $('#sexo').val();  
        let direccion = $('#direccion').val();  
        let correo = $('#correo').val();
        let telefono = $('#telefono').val();
        funcion='crear_paciente';
        console.log(cedula+nombres+apellidos+sexo+direccion+correo+telefono);
        $.post('../controlador/PacienteController.php',{funcion,cedula,nombres,apellidos,fecha_nacimiento,sexo,direccion,correo,telefono},(response)=>{
            console.log(response);
            if(response=='add'){
                $('#addpaciente').hide('slow');
                $('#addpaciente').show(1500);
                $('#addpaciente').hide(2500);
                $('#form-crear-paciente').trigger('reset');
            }
            if(response=='noadd'){
                $('#noaddpaciente').hide('slow');
                $('#noaddpaciente').show(1500);
                $('#noaddpaciente').hide(2500);
                $('#form-crear-paciente').trigger('reset');
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
        
        $('#editar_id_paciente').val(id);
        $('#editar_nombres_paciente').val(nombres);
        $('#editar_apellidos_paciente').val(apellidos);
        $('#editar_sexo_paciente').val(sexo);
        $('#editar_direccion_paciente').val(direccion);
        $('#editar_correo_paciente').val(correo);
        $('#editar_telefono_paciente').val(telefono);
    });
    $('#form-editar-paciente').submit(e=>{
        let id= $('#editar_id_paciente').val();
        let nombres = $('#editar_nombres_paciente').val();
        let apellidos = $('#editar_apellidos_paciente').val(); 
        let sexo = $('#editar_sexo_paciente').val();  
        let direccion = $('#editar_direccion_paciente').val();  
        let correo = $('#editar_correo_paciente').val();
        let telefono = $('#editar_telefono_paciente').val();
        funcion='actualizar_paciente';
        //console.log(id_usuario+nombres+apellidos+sexo+direccion+correo+telefono+password+rol);
        $.post('../controlador/PacienteController.php',{funcion,id,nombres,apellidos,sexo,direccion,correo,telefono},(response)=>{
            console.log(response);
            if(response=='actualizado'){
                $('#edit-user').hide('slow');
                $('#edit-user').show(1500);
                $('#edit-user').hide(2500);
                $('#form-editar-paciente').trigger('reset');
                
            }
            else{
                $('#noedit-user').hide('slow');
                $('#noedit-user').show(1500);
                $('#noedit-user').hide(2500);
                $('#form-editar-paciente').trigger('reset');
            }       
        });
        e.preventDefault();
    });
});