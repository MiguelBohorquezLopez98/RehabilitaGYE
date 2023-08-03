$(document).ready(function(){
    var funcion ='';
    var id_usuario = $('#id_usuario').val();
    var edit=false;
    buscar_usuario(id_usuario);
    function buscar_usuario(dato){
        funcion='buscar_usuario';
        $.post('../controlador/UsuarioController.php',{dato,funcion},(response)=>{
            let nombres='';
            let apellidos='';
            let edad='';
            let cedula='';
            let tipo='';
            let telefono='';
            let direccion='';
            let correo='';
            let sexo='';
            const usuario = JSON.parse(response);
            nombres+=`${usuario.nombres}`;
            apellidos+=`${usuario.apellidos}`;
            edad+=`${usuario.edad}`;
            cedula+=`${usuario.cedula}`;
            tipo+=`${usuario.tipo}`;
            telefono+=`${usuario.telefono}`;
            direccion+=`${usuario.direccion}`;
            correo+=`${usuario.correo}`;
            sexo+=`${usuario.sexo}`;
            $('#nombres_usuario').html(nombres);
            $('#apellidos_usuario').html(apellidos);
            $('#edad').html(edad);
            $('#cedula_usuario').html(cedula);
            $('#tipo_usuario').html(tipo);
            $('#telefono_usuario').html(telefono);
            $('#direccion_usuario').html(direccion);
            $('#correo_usuario').html(correo);
            $('#sexo_usuario').html(sexo);
        })
    }
    
    $(document).on('click','.edit',(e)=>{
        funcion='capturar_datos';
        edit=true;
        $.post('../controlador/UsuarioController.php',{funcion,id_usuario},(response)=>{
            const usuario = JSON.parse(response);
            $('#telefono').val(usuario.telefono);
            $('#direccion').val(usuario.direccion);
            $('#correo').val(usuario.correo);
            $('#sexo').val(usuario.sexo);
        })
    });
    $('#form-usuario').submit(e=>{
        if(edit==true){
            let telefono=$('#telefono').val();
            let direccion=$('#direccion').val();
            let correo=$('#correo').val();
            let sexo=$('#sexo').val();
            funcion='editar_usuario';
            $.post('../controlador/UsuarioController.php',{id_usuario,funcion,telefono,direccion,correo,sexo},(response)=>{
                if(response=='Editado'){
                    $('#editado').hide('slow');
                    $('#editado').show(1500);
                    $('#editado').hide(2500);
                    $('#form-usuario').trigger('reset');
                }
                edit=false;
                buscar_usuario(id_usuario); 
            })
        }
        else{
            $('#noeditado').hide('slow');
            $('#noeditado').show(1500);
            $('#noeditado').hide(2500);
            $('#form-usuario').trigger('reset');
        }
        e.preventDefault();
    });

    $('#form-pass').submit(e=>{
        let oldpass=$('#oldpass').val();
        let newpass=$('#newpass').val();
        funcion='cambiar_contra';
        $.post('../controlador/UsuarioController.php',{id_usuario,funcion,oldpass,newpass},(response)=>{
            if(response=='update'){
                $('#update').hide('slow');
                $('#update').show(1500);
                $('#update').hide(2500);
                $('#form-pass').trigger('reset');
            }
            else{
                $('#noupdate').hide('slow');
                $('#noupdate').show(1500);
                $('#noupdate').hide(2500);
                $('#form-pass').trigger('reset');
            }
        });
        e.preventDefault();
    });
})