<template>
	<div class="modal product-modal fade" id="product-modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<i class="tf-ion-close"></i>
		</button>
		<div class="modal-dialog " role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div id="capture" class="px-3 py-5">
						<h3 class="text-center">Sistema MN</h3>
						<hr>
						<h4 class="d-flex justify-content-between align-items-center">
							<b>Cliente: </b>
							<span>{{ sale.client_name }}</span>
						</h4>
						<h4 class="d-flex justify-content-between align-items-center">
							<b>Fecha de venta: </b>
							<span>{{ sale.published_date }}</span>
						</h4>
						<h4 class="d-flex justify-content-between align-items-center">
							<b>Vendedor: </b>
							<span>{{ sale.user_name }}</span>
						</h4>
						<h4 class="d-flex justify-content-between align-items-center">
							<b>Tipo de venta: </b>
							<span>{{ sale.sale_type }}</span>
						</h4>
						<h4 class="d-flex justify-content-between align-items-center">
							<b>Estado: </b>
							<span>{{ sale.status }}</span>
						</h4>
						<hr>
						<h4><b>Productos: </b></h4>
						<h4 v-for="product in sale.products" :key="product.name" class="d-flex justify-content-between align-items-center">
							<b>{{ product.name }} x {{ product.quantity }}</b>
							<span>Bs {{ product.price * product.quantity}}</span>
						</h4>
						<hr>
						<h2 class="d-flex justify-content-between align-items-center">
							<b>Total: </b>
							<span>Bs {{ sale.total }}</span>
						</h2>
					</div>
					<!-- <a target="_blank" href="https://api.whatsapp.com/send?&text=_Hola_,te%20dejo%20una%20copia%20de%20tu%20recibo" class="btn btn-success">Compartir</a> -->
					<a @click.prevent="enviarWhatsApp" class="btn btn-success">Enviar whatsapp</a>
					<button id="btnCapturar" @click.prevent="capturaFoto" class="btn btn-primary">Tomar captura</button>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import html2canvas from 'html2canvas';

export default{
	props:['sale'],
	data(){
		return{
		}
	},
	methods:{
		async enviarWhatsApp(){
			await axios.post(`/api/twilio/${this.sale.id}`)
			.then(res=>{
				console.log('enviado')
			})
			.catch(err => {
				console.log('no enviado')
			})
		},
		capturaFoto(){
			html2canvas(document.querySelector("#capture"))
			.then(canvas => {
				let dataURL = canvas.toDataURL();
				axios.post(`/api/makeimage/${this.sale.id}`,{
					image:dataURL
				}).then(res => {
					console.log("Imagen creada con exito!");
				}).catch(err => {
					console.log(err.response.data);
				})
			});
		}
	}
}
</script>