$(document).ready(function(){
    buscar_datos();
    var funcion;
    function buscar_datos(consulta){
        funcion='buscar_terapia';
        $.post('../controlador/TerapiaFisicaController.php',{consulta,funcion},(response)=>{
            const terapias = JSON.parse(response);
            let template='';
            terapias.forEach(terapiafisica => {
                template+=`
                    <tr TFId="${terapiafisica.id}" TFNombre="${terapiafisica.nombre}">
                        <td>${terapiafisica.id}</td>
                        <td>${terapiafisica.nombre}</td>
                        <td>
                            <button class="editar btn btn-success" type="button" data-toggle="modal" data-target="#editarterapiafisica"><i class="fas fa-pencil-alt"></i>Editar</button>
                            <button class="eliminar btn btn-danger"><i class="fas fa-trash"></i>Eliminar</button>
                        </td>
                    </tr>
                `;
            });
            $('#terapiasfisicas').html(template);
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
        funcion='eliminar_terapia';
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id=$(elemento).attr('TFId');
        const nombre=$(elemento).attr('TFNombre');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: '¿Desea eliminar '+nombre+' ?',
            text: "Esta acción no tiene retorno!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
                $.post('../controlador/TerapiaFisicaController.php',{id,funcion},(response)=>{
                    if(response=='eliminado'){
                        swalWithBootstrapButtons.fire(
                            'Terapia eliminada!',
                            'La terapia ha sido eliminada.',
                            'success'
                        )
                    }
                })
              
            } else if (result.dismiss === Swal.DismissReason.cancel){
              swalWithBootstrapButtons.fire(
                'Cancelado',
                ''+nombre+' no ha sido eliminada :)',
                'error'
              )
            }
        })
    })
    $('#form-crear-terapia').submit(e=>{
        let nombre = $('#nombre').val();
        funcion='crear_terapia';
        $.post('../controlador/TerapiaFisicaController.php',{funcion,nombre},(response)=>{
            //console.log(response);
            if(response=='add'){
                $('#addterapia').hide('slow');
                $('#addterapia').show(1500);
                $('#addterapia').hide(2500);
                $('#form-crear-terapia').trigger('reset');
            }
            if(response=='noadd'){
                $('#noaddterapia').hide('slow');
                $('#noaddterapia').show(1500);
                $('#noaddterapia').hide(2500);
                $('#form-crear-terapia').trigger('reset');
            }       
        });
        e.preventDefault();
    })
    $(document).on('click','.editar',(e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id=$(elemento).attr('TFId');
        const nombre=$(elemento).attr('TFNombre');
        
        $('#editar_id_terapiafisica').val(id);
        $('#editar_nombre_terapiafisica').val(nombre);
    });
    $('#form-editar-terapia').submit(e=>{
        let id= $('#editar_id_terapiafisica').val();
        let nombre = $('#editar_nombre_terapiafisica').val();
        funcion='actualizar_terapia';
        //console.log(id_usuario+nombres+apellidos+sexo+direccion+correo+telefono+password+rol);
        $.post('../controlador/TerapiaFisicaController.php',{funcion,id,nombre},(response)=>{
            //console.log(response);
            if(response=='actualizado'){
                $('#edit-terapia-fisica').hide('slow');
                $('#edit-terapia-fisica').show(1500);
                $('#edit-terapia-fisica').hide(2500);
                $('#form-editar-terapia').trigger('reset');
                
            }
            else{
                $('#noedit-terapia-fisica').hide('slow');
                $('#noedit-terapia-fisica').show(1500);
                $('#noedit-terapia-fisica').hide(2500);
                $('#form-editar-terapia').trigger('reset');
            }       
        });
        e.preventDefault();
    });
});