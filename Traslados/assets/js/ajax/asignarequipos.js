$(document).ready(function() {
  console.log( "ready!" );
  $("form").submit(function (event){
    var idform = $(this).attr('id');
    var formdetail = $('#'+idform);
    $.ajax({
      type:"POST",
      url:"../assets/db/asignacion_equipos.php",
      data:formdetail.serializeArray(),
      success: function()
      {
        swal(
          'Exito!',
          'Exito en la asignacion del equipo!',
          'success'
        );
        setTimeout(function () { location.reload(true); }, 1000);
      },
      error: function()
      {
        swal(
          'Bad job!',
          'Error en asignacion del equipo!',
          'error'
        );
        setTimeout(function () { location.reload(true); }, 1000);
      }
    })
    console.log($(this).serialize());
    event.preventDefault();
  });

});
