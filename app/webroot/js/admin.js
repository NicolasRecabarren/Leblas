function addError(element,errorText){
    if(!element.hasClass('has-error')){
        element.addClass('has-error');
        element.append(
            '<span class="error-msg">'+errorText+'</span>'
        );
    }
}

function removeError(element){
    if( element.hasClass('has-error') ){
        element.find('.error-msg').remove();
        element.removeClass('has-error');
    }
}

function alert_error(msg, title, time){

	title =(typeof(title)=="undefined" ? 'Ha ocurrido un error':title);
	time =(typeof(time)=="undefined" ? 5000:time);
	className = 'error';
	alert_admin(className, msg, title, time);
}

function alert_success(msg, title, time, className){

	title =(typeof(title)=="undefined" ? 'Proceso correcto!':title);
	time =(typeof(time)=="undefined" ? 5000:time);
	className ='success';
	alert_admin(className, msg, title, time);
}

function alert_info(msg, title, time, className){

	title =(typeof(title)=="undefined" ? 'Proceso correcto!':title);
	time =(typeof(time)=="undefined" ? 5000:time);
	className ='info';
	alert_admin(className, msg, title, time);
}

function alert_warning(msg, title, time, className){

	title =(typeof(title)=="undefined" ? 'Proceso correcto!':title);
	time =(typeof(time)=="undefined" ? 5000:time);
	className ='warning';
	alert_admin(className, msg, title, time);
}

function alert_admin(className, msg, title, time ){
	$.toast({
		heading: title,
		text: msg,
		position: 'top-right',
		icon:className,
		loader: true,
		stack: false,
		hideAfter :time,
		position: {
	        right: 15,
	        top: 54
   		 },
	});
}