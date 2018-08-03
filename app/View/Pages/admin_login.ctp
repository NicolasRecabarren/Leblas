<div class="panel">
    <h2>Admin Login</h2>
    <p><?= __('Ingrese su nombre de usuario y contraseña.');?></p>
</div>
<?php
    echo $this->Form->create('User',['novalidate' => true,'id' => 'LoginForm']);
    
    echo $this->Form->input('username',[
        'label' => false,
        'class' => 'form-control',
        'placeholder' => 'Usuario',
        'div' => 'form-group'
    ]);
    
    echo $this->Form->input('password',[
        'label' => false,
        'class' => 'form-control',
        'placeholder' => 'Contraseña',
        'div' => 'form-group'
    ]);
    
    echo '<div class="forgot">'.
            $this->Html->link('¿Olvidaste tu contraseña?','javascript:;',['class' => false]).
         '</div>';
    
    echo $this->Form->button('Login',[
        'type' => 'submit',
        'class' => 'btn btn-primary submitLogin'
    ]);
    
    echo $this->Form->end();
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('submit','#LoginForm',function(e){
            e.preventDefault();
            var error = 0;
            
            var inputUsername = $('#UserUsername');
            if( $.trim(inputUsername.val()) == ""){
                addError(inputUsername.parent(),'Debe ingresar su nombre de usuario.');
                error++;
            } else {
                removeError(inputUsername.parent());
            }
            
            var inputPassword = $('#UserPassword');
            if( $.trim(inputPassword.val()) == ""){
                addError(inputPassword.parent(),'Debe ingresar su contraseña.');
                error++;
            } else{
                removeError(inputPassword.parent());
            }
            
            if( error == 0){
                $(this).get(0).submit();
            }
            
            return false;
        });
        
        <?php if(!empty($this->request->data)): ?>
            alert_error('Nombre de usuario o contraseña son incorrectos.');
        <?php endif; ?>
    });
</script>