<script type="text/javascript">
$(document).ready(function() {  
    Documentos.CargarDocumentos(activarTabla);

    $('#documentoModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // captura al boton
      var titulo = button.data('titulo'); // extrae del atributo data-
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this); //captura el modal
      modal.find('.modal-title').text(titulo+' Documento');
      $('#form_documentos [data-toggle="tooltip"]').css("display","none");
      $("#form_documentos input[type='hidden']").remove();

        if(titulo=='Nuevo'){
            modal.find('.modal-footer .btn-primary').text('Guardar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
            $('#form_documentos #slct_estado').val(1); 
            $('#form_documentos #txt_nombre').focus();
        }
        else{
            modal.find('.modal-footer .btn-primary').text('Actualizar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');
            $('#form_documentos #txt_nombre').val( $('#t_documentos #nombre_'+button.data('id') ).text() );
            $('#form_documentos #slct_estado').val( $('#t_documentos #estado_'+button.data('id') ).attr("data-estado") );
            $("#form_documentos").append("<input type='hidden' value='"+button.data('id')+"' name='id'>");
        }

    });

    $('#documentoModal').on('hide.bs.modal', function (event) {
      var modal = $(this); //captura el modal
      modal.find('.modal-body input').val(''); // busca un input para copiarle texto
    });
});

activarTabla=function(){
    $("#t_documentos").dataTable(); // inicializo el datatable    
};

Editar=function(){
    if(validaDocumentos()){
        Documentos.AgregarEditarDocumento(1);
    }
};

activar=function(id){
    Documentos.CambiarEstadoDocumentos(id,1);
};
desactivar=function(id){
    Documentos.CambiarEstadoDocumentos(id,0);
};

Agregar=function(){
    if(validaDocumentos()){
        Documentos.AgregarEditarDocumento(0);
    }
};

validaDocumentos=function(){
    $('#form_documentos [data-toggle="tooltip"]').css("display","none");
    var a=[];
    a[0]=valida("txt","nombre","");
    var rpta=true;

    for(i=0;i<a.length;i++){
        if(a[i]===false){
            rpta=false;
            break;
        }
    }
    return rpta;
};

valida=function(inicial,id,v_default){
    var texto="Seleccione";
    if(inicial=="txt"){
        texto="Ingrese";
    }

    if( $.trim($("#"+inicial+"_"+id).val())==v_default ){
        $('#error_'+id).attr('data-original-title',texto+' '+id);
        $('#error_'+id).css('display','');
        return false;
    }   
};
</script>