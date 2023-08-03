$(document).ready(function(){
    var funcion;
    $('.select2').select2();
    rellenar_roles();
    function rellenar_roles(){
        funcion="rellenar_roles";
        $.post('../controlador/RolController.php',{funcion},(response)=>{
            const roles = JSON.parse(response);
            let template='';
            roles.forEach(rol=>{
                template+=`
                <option value="${rol.id}">${rol.nombre}</option>
                `;
            });
            $('#rol').html(template);
        });
    }
    rellenar_roles2();
    function rellenar_roles2(){
        funcion="rellenar_roles2";
        $.post('../controlador/RolController.php',{funcion},(response)=>{
            const roles = JSON.parse(response);
            let template='';
            roles.forEach(rol=>{
                template+=`
                <option value="${rol.id}">${rol.nombre}</option>
                `;
            });
            $('#editar_rol_usuario').html(template);
        });
    }
    
});