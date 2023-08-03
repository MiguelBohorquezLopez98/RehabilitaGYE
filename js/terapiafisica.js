$(document).ready(function(){
    var funcion;
    $('.select2').select2();
    rellenar_terapiafisica();
    function rellenar_terapiafisica(){
        funcion="rellenar_terapiafisica";
        $.post('../controlador/TerapiaFisicaController.php',{funcion},(response)=>{
            const terapiasfisicas = JSON.parse(response);
            let template='';
            terapiasfisicas.forEach(terapiafisica=>{
                template+=`
                <option value="${terapiafisica.id}">${terapiafisica.nombre}</option>
                `;
            });
            $('#terapiafisica').html(template);
        });
    }
    rellenar_terapiafisica2();
    function rellenar_terapiafisica2(){
        funcion="rellenar_terapiafisica2";
        $.post('../controlador/TerapiaFisicaController.php',{funcion},(response)=>{
            const terapiasfisicas = JSON.parse(response);
            let template='';
            terapiasfisicas.forEach(terapiafisica=>{
                template+=`
                <option value="${terapiafisica.id}">${terapiafisica.nombre}</option>
                `;
            });
            $('#editar_terapiafisica').html(template);
        });
    }
    
});