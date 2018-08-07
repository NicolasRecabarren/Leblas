<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <i class="fa fa-up-arrow fa-2x"></i>
            <h1 class="block-header titt">CONTÁCTENOS</h1>
            <p class="first_indent animated fadeInUp">Tel.: <a class="aa" href="javascript:;">+56 9 9876 5432</a> - Email: contacto@leblas.cl<br>
                Dirección: Av. Nueva Esperanza 777 - Las Condes, Santiago, Chile<br>
                Horarios: Lun. a Vir. de 9hrs a 19hrs</p>
        </div>
    </div>
    <div class="alert alert-danger alert-dismissable alert-fixed hide">
        <button type="button" class="close" aria-hidden="true">×</button>
        <div id="resultado_mensaje" style="width:300px; height:auto;margin: 0 auto;text-align: center;">
            Primero corrija los siguientes errores:
            <ul style="text-align: left;"></ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="contact-form">
                <?php echo $this->Form->create('Contact',['novalidate' => true,'id' => 'ContactForm','url' => ['controller' => 'pages','action' => 'saveContact']]); ?>
                    
                    <p class="name"><?php
                        echo $this->Form->input('nombre',[
                                'label' => [
                                    'class' => false,
                                    'text' => 'Nombre <span class="required">*</span>'
                                ],
                                'id' => 'FormContactName',
                                'class' => 'form-control',
                                'placeholder' => 'Nombre',
                                'size' => 30,
                                'div' => false
                        ]);?>
                    </p>
                    <p class="email"><?php
                        echo $this->Form->input('email',[
                                'label' => [
                                    'class' => false,
                                    'text' => 'Correo Electrónico <span class="required">*</span>'
                                ],
                                'id' => 'FormContactEmail',
                                'class' => 'form-control',
                                'placeholder' => 'Correo electrónico',
                                'size' => 255,
                                'div' => false
                        ]);?>
                    </p>
                    <p class="tlf"><?php
                        echo $this->Form->input('telefono',[
                                'label' => [
                                    'class' => false,
                                    'text' => 'Teléfono <span class="required">*</span>'
                                ],
                                'id' => 'FormContactPhone',
                                'class' => 'form-control',
                                'placeholder' => 'Teléfono',
                                'size' => 30,
                                'div' => false
                        ]);?>
                    </p>
                    <p class="message"><?php
                        echo $this->Form->textarea('contenido',[
                                'id' => 'FormContactContent',
                                'class' => 'form-control',
                                'placeholder' => 'Comentario',
                                'rows' => 8,
                                'cols' => 30,
                                'div' => false
                        ]);?>
                    </p>
                    
                    <p class="submit text-center vertical-margin-81">
                        <button type="submit" id="contact_form_submit" name="contact_submit" value="Enviar" class="btn boton-enviar">Enviar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!--<div class="col-sm-6 col-xs-12">
            <div id="map">
            </div>
        </div>-->
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('submit','#ContactForm',function(e){
            e.preventDefault();
            
            var error = 0;
            var $this = $(this).get(0);
            var form = $(this);
            var divAlert = $('section#contacto').find('div.alert');
            divAlert.find('#resultado_mensaje ul').html("");
            
            var inputNombre = $('#FormContactName');
            if( $.trim(inputNombre.val()) == "" || $.trim(inputNombre.val()) == "Nombre" ){
                divAlert.find('#resultado_mensaje ul').append("<li>Debe ingresar su nombre.</li>");
                error++;
            }
            
            var inputEmail = $('#FormContactEmail');
            if( $.trim(inputEmail.val()) == "" || $.trim(inputNombre.val()) == "Correo" || $.trim(inputNombre.val()) == "Correo electrónico" ){
                divAlert.find('#resultado_mensaje ul').append("<li>Debe ingresar su correo electrónico.</li>");
                error++;
            }
            
            var inputPhone = $('#FormContactPhone');
            if( $.trim(inputPhone.val()) == "" || $.trim(inputPhone.val()) == "Teléfono" ){
                divAlert.find('#resultado_mensaje ul').append("<li>Debe ingresar su número de contacto.</li>");
                error++;
            }
            
            var inputContent = $('#FormContactContent');
            if( $.trim(inputContent.val()) == "" || $.trim(inputContent.val()) == "Comentario" ){
                divAlert.find('#resultado_mensaje ul').append("<li>Debe escribir un comentario.</li>");
                error++;
            }
            
            if( error == 0 ){
                if(!divAlert.hasClass("hide"))
                    divAlert.addClass("hide");

                $.ajax({
                    url: form.attr('action'),
                    type: "POST",
                    data: form.serialize(),
                    async: false,
                    beforeSend: function(){
                        form.find('button[type="submit"]').attr('disabled','disabled');
                        form.find('button[type="submit"]').html("Enviando...");
                    },
                    success: function(response){
                        response = $.trim(response);
                        if(response == "sended"){
                            alert_info("Éste será respondido a la brevedad.","¡Contacto enviado!")
                            inputNombre.val("");
                            inputEmail.val("");
                            inputPhone.val("");
                            inputContent.val("");
                        } else {
                            alert_error("Ha ocurrido un error al enviar el formulario.");
                        }
                        form.find('button[type="submit"]').removeAttr('disabled');
                        form.find('button[type="submit"]').html("Enviar");
                    }
                });
                return false;
            } else {
                divAlert.removeClass("hide");
            }
            return false;
        });
    });
</script>