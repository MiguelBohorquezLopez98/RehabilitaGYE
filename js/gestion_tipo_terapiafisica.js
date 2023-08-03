$(document).ready(function(){
    buscar_datos();
    var funcion;
    function buscar_datos(consulta){
        funcion='buscar_tipoterapia';
        $.post('../controlador/TipoTerapiaFisicaController.php',{consulta,funcion},(response)=>{
            const tiposterapias = JSON.parse(response);
            let template='';
            tiposterapias.forEach(tipoterapiafisica => {
                template+=`
                    <tr TTFId="${tipoterapiafisica.id}" TTFNombre="${tipoterapiafisica.nombre}" TTFTerapia="${tipoterapiafisica.terapiafisica}">
                        <td>${tipoterapiafisica.id}</td>
                        <td>${tipoterapiafisica.nombre}</td>
                        <td>${tipoterapiafisica.terapiafisica}</td>
                        <td>
                            <button class="editar btn btn-success" type="button" data-toggle="modal" data-target="#editartipoterapiafisica"><i class="fas fa-pencil-alt"></i>Editar</button>
                            <button class="eliminar btn btn-danger"><i class="fas fa-trash"></i>Eliminar</button>
                        </td>
                    </tr>
                `;
            });
            $('#tipoterapiasfisicas').html(template);
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
        funcion='eliminar_tipoterapia';
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id=$(elemento).attr('TTFId');
        const nombre=$(elemento).attr('TTFNombre');
        const terapiafisica=$(elemento).attr('TTFTerapia');
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
                $.post('../controlador/TipoTerapiaFisicaController.php',{id,funcion},(response)=>{
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
    $('#form-crear-tipoterapia').submit(e=>{
        let nombre = $('#nombre').val();
        let terapiafisica = $('#terapiafisica').val();
        funcion='crear_tipoterapia';
        $.post('../controlador/TipoTerapiaFisicaController.php',{funcion,nombre,terapiafisica},(response)=>{
            if(response=='add'){
                $('#addtipoterapia').hide('slow');
                $('#addtipoterapia').show(1500);
                $('#addtipoterapia').hide(2500);
                $('#form-crear-tipoterapia').trigger('reset');
            }
            if(response=='noadd'){
                $('#noaddtipoterapia').hide('slow');
                $('#noaddtipoterapia').show(1500);
                $('#noaddtipoterapia').hide(2500);
                $('#form-crear-tipoterapia').trigger('reset');
            }       
        });
        e.preventDefault();
    })
    $(document).on('click','.editar',(e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id=$(elemento).attr('TTFId');
        const nombre=$(elemento).attr('TTFNombre');
        const terapiafisica=$(elemento).attr('TTFTerapia');
        $('#editar_id_tipoterapiafisica').val(id);
        $('#editar_nombre_tipoterapiafisica').val(nombre);
        $('#editar_terapiafisica').val(terapiafisica);
    });
    $('#form-editar-tipoterapia').submit(e=>{
        let id= $('#editar_id_tipoterapiafisica').val();
        let nombre = $('#editar_nombre_tipoterapiafisica').val();
        let terapiafisica = $('#editar_terapiafisica').val();
        funcion='actualizar_tipoterapia';
        //console.log(id_usuario+nombres+apellidos+sexo+direccion+correo+telefono+password+rol);
        $.post('../controlador/TipoTerapiaFisicaController.php',{funcion,id,nombre,terapiafisica},(response)=>{
            //console.log(response);
            if(response=='actualizado'){
                $('#edit-tipoterapia-fisica').hide('slow');
                $('#edit-tipoterapia-fisica').show(1500);
                $('#edit-tipoterapia-fisica').hide(2500);
                $('#form-editar-tipoterapia').trigger('reset');
                
            }
            else{
                $('#noedit-tipoterapia-fisica').hide('slow');
                $('#noedit-tipoterapia-fisica').show(1500);
                $('#noedit-tipoterapia-fisica').hide(2500);
                $('#form-editar-tipoterapia').trigger('reset');
            }       
        });
        e.preventDefault();
    });
});