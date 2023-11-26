<template>
    <div class="">
        <div id="content-data" class="px-3 py-5">
            <h3 class="text-center">Sistema MN</h3>
            <hr />
            <h4 class="d-flex justify-content-between align-items-center">
                <b>Cliente: </b>
                <span>{{ pedido.client_name }}</span>
            </h4>
            <h4 class="d-flex justify-content-between align-items-center">
                <b>CI: </b>
                <span>{{ pedido.ci }}</span>
            </h4>
            <h4 class="d-flex justify-content-between align-items-center">
                <b>Fecha de venta: </b>
                <span>{{ pedido.created_at }}</span>
            </h4>
            <h4 class="d-flex justify-content-between align-items-center">
                <b>Tipo de venta: </b>
                <span>{{ pedido.sale_type }}</span>
            </h4>
            <h4 class="d-flex justify-content-between align-items-center">
                <b>Estado: </b>
                <span>{{ pedido.status }}</span>
            </h4>
            <hr />
            <h4><b>Productos: </b></h4>
            <h4
                v-for="(detalle, index) in pedido.detalle_pedidos"
                :key="index"
                class="d-flex justify-content-between align-items-center"
            >
                <b>{{ detalle.nombre }} x {{ detalle.cantidad }}</b>
                <span>Bs {{ detalle.precio * detalle.cantidad }}</span>
            </h4>
            <hr />
            <h3 class="d-flex justify-content-between align-items-center">
                <b>Total: </b>
                <span>Bs {{ pedido.total }}</span>
            </h3>
            <template v-if="pedido.deudas && pedido.deudas.length">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Monto pagado</th>
                            <th class="text-center">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(debt, index) in pedido.deudas"
                            :key="debt.id"
                        >
                            <td width="10px">{{ index + 1 }}</td>
                            <td>{{ debt.amount }}</td>
                            <td>{{ debt.created_at }}</td>
                        </tr>
                    </tbody>
                </table>
                <h3 class="d-flex justify-content-between align-items-center">
                    <b>Deuda: </b>
                    <span>Bs {{ pedido.pago_faltante }}</span>
                </h3>
            </template>
        </div>
        <a
            target="_blank"
            href="https://api.whatsapp.com/send?&text=Hola,%0A*te%20dejo%20una%20copia*%20de%20tu%20recibo"
            class="btn btn-success"
            :disabled="abonar"
            ><i class="fa fa-whatsapp"></i> Compartir</a
        >
        <a
            @click.prevent="exportToPdf"
            class="btn btn-danger"
            :disabled="abonar"
            ><i class="fa fa-file-pdf-o"></i> Exportar PDF</a
        >
        <a
            @click.prevent="exportToImage"
            class="btn btn-warning"
            :disabled="abonar"
            ><i class="fa fa-file-image-o"></i> Exportar Image</a
        >
    </div>
</template>
<script>
import html2canvas from "html2canvas";
import html2pdf from "html2pdf.js";

export default {
    data() {
        return {
            image: false,
            pdf: false,
            whatsapp: false,
            abonar: false,
            amount: 0,
            url: "",
            method: "",
            error: "",
            errors: [],
        };
    },
    methods: {
        exportToPdf() {
            if (this.abonar) {
                return;
            }
            let currentDate = new Date();
            let formattedDate =
                currentDate.getFullYear() +
                "-" +
                (currentDate.getMonth() + 1) +
                "-" +
                currentDate.getDate();
            let filename = "venta " + formattedDate + ".pdf";
            html2pdf(document.getElementById("content-data"), {
                margin: 3,
                filename: filename,
            });
        },
        exportToImage() {
            if (this.abonar) {
                return;
            }
            html2canvas(document.getElementById("content-data")).then(
                (canvas) => {
                    let a = document.createElement("a");
                    document.body.appendChild(a);
                    a.download = "filename.png";
                    a.href = canvas.toDataURL();
                    a.target = "_blank";
                    a.click();
                }
            );
        },
    },
    computed: {
        pedido() {
            return this.$store.state.pedido;
        },
    },
};
</script>
