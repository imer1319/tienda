<template>
    <div class="modal product-modal fade" id="product-modal">
        <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
        >
            <i class="tf-ion-close"></i>
        </button>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="content-data" class="px-3 py-5">
                        <h3 class="text-center">Sistema MN</h3>
                        <hr />
                        <h4
                            class="d-flex justify-content-between align-items-center"
                        >
                            <b>Cliente: </b>
                            <span>{{ sale.client_name }}</span>
                        </h4>
                        <h4
                            class="d-flex justify-content-between align-items-center"
                        >
                            <b>Fecha de venta: </b>
                            <span>{{ sale.published_date }}</span>
                        </h4>
                        <h4
                            class="d-flex justify-content-between align-items-center"
                        >
                            <b>Vendedor: </b>
                            <span>{{ sale.user_name }}</span>
                        </h4>
                        <h4
                            class="d-flex justify-content-between align-items-center"
                        >
                            <b>Tipo de venta: </b>
                            <span>{{ sale.sale_type }}</span>
                        </h4>
                        <h4
                            class="d-flex justify-content-between align-items-center"
                        >
                            <b>Estado: </b>
                            <span>{{ sale.status }}</span>
                        </h4>
                        <hr />
                        <h4><b>Productos: </b></h4>
                        <h4
                            v-for="(product, index) in sale.products"
                            :key="index"
                            class="d-flex justify-content-between align-items-center"
                        >
                            <b>{{ product.name }} x {{ product.quantity }}</b>
                            <span
                                >Bs {{ product.price * product.quantity }}</span
                            >
                        </h4>
                        <hr />
                        <h3
                            class="d-flex justify-content-between align-items-center"
                        >
                            <b>Total: </b>
                            <span>Bs {{ sale.total }}</span>
                        </h3>
                        <template v-if="sale.debts.length">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Monto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(debt, index) in sale.debts"
                                        :key="debt.id"
                                    >
                                        <td width="10px">{{ index + 1 }}</td>
                                        <td>{{ debt.created_at }}</td>
                                        <td>{{ debt.amount }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h3
                                class="d-flex justify-content-between align-items-center"
                            >
                                <b>Deuda: </b>
                                <span>Bs {{ sale.total - deuda }}</span>
                            </h3>
                            <div class="input-group pt-3" v-if="abonar">
                                <input
                                    type="number"
                                    v-model="amount"
                                    class="form-control"
                                    min="1"
                                />
                                <div class="input-group-append">
                                    <a
                                        @click.prevent="storeOrUpdateDebt"
                                        class="btn btn-default"
                                        >Abonar</a
                                    >
                                </div>
                            </div>
                            <div v-if="error" class="text-danger">
                                {{ error }}
                            </div>
                            <div v-for="(errorArray, idx) in errors" :key="idx">
                                <div
                                    v-for="(allErrors, idx) in errorArray"
                                    :key="idx"
                                    class="text-danger"
                                >
                                    {{ allErrors }}
                                </div>
                            </div>
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
                        @click.prevent="payDebt(sale)"
                        class="btn btn-default"
                        v-if="sale.sale_type === 'DEUDA'"
                        :disabled="abonar"
                        ><i class="fa fa-plus-square"></i> Abonar</a
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
                    <a
                        @click.prevent="closePay"
                        v-if="abonar"
                        class="btn btn-default"
                        ><i class="fa fa-times"></i> Cancelar</a
                    >
                </div>
            </div>
        </div>
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
        getMethod() {},
        storeOrUpdateDebt() {
            if (Number(this.deuda) + Number(this.amount) > this.sale.total) {
                this.error = "El monto no puede ser mayor a la deuda";
                return;
            } else if (
                Number(this.deuda) + Number(this.amount) ===
                this.sale.total
            ) {
                this.url = `/api/sales/${this.sale.id}`;
                this.method = "put";
            } else {
                this.url = `/api/debts/${this.sale.id}`;
                this.method = "post";
            }

            axios[this.method](this.url, {
                amount: this.amount,
                status: "PAGADO",
            })
                .then((res) => {
                    this.amount = 0;
                    this.closePay();
                    this.errors = [];
                    this.$store.dispatch("getDebts");
                    $("#product-modal").modal("hide");
                    if (this.deuda == 0) {
                        Swal.fire(
                            "Guardado correctamente. Se movio a mis ventas",
                            "",
                            "success"
                        );
                    } else {
                        Swal.fire(
                            "Los cambios se guardaron correctamente.",
                            "",
                            "success"
                        );
                    }
                })
                .catch((err) => {
                    this.error = "";
                    this.errors = err.response.data.errors;
                });
        },
        payDebt() {
            this.image = true;
            this.pdf = true;
            this.whatsapp = true;
            this.abonar = true;
        },
        closePay() {
            this.image = false;
            this.pdf = false;
            this.whatsapp = false;
            this.abonar = false;
            this.error = "";
        },
    },
    computed: {
        deuda() {
            let deuda = 0;
            this.sale.debts.forEach((item) => {
                deuda += item.amount;
            });
            return deuda;
        },
        sale() {
            return this.$store.state.sale;
        },
    },
};
</script>
