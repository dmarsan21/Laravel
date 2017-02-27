
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


$('form').on('submit', function(){
	$(this).find('input[type=submit]').attr('disabled', true);
});

Echo.channel('messages-channel')
	.listen('MessageWasReceived', (data) => {
		let message = data.message;
		let html = `
			<tr>
					<td>${message.id}</td>
					<td>${message.nombre}</td>
					<td>${message.email}</td>
					<td>${message.mensaje}</td>
					<td></td>
					<td></td>
					<td>
						<a class="btn btn-info btn-xs" href="/mensajes/${message.id}/edit">Editar</a>
						<form style="display:inline" method="POST" action="/mensajes/${message.id}">
							<input type="hidden" name="_token" value="${Laravel.csrfToken}" />
							<input type="hidden" name="_method" value="DELETE" />
							<button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
						</form>
					</td>
				</tr>
		`;

		$(html).hide().prependTo('tbody').fadeIn();
	})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
