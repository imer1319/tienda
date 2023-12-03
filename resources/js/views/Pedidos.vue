<template>
    <div>
        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                            <h1 class="page-name">Pedidos</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <Modal>
            <PedidoItem></PedidoItem>
        </Modal>
        <section class="user-dashboard mb-3">
            <div class="container">
                <div class="row">
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Items</th>
                                        <th>Total precio</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-if="pedidos.length">
                                        <tr
                                            v-for="(pedido, index) in pedidos"
                                            :key="index"
                                        >
                                            <td>#{{ index + 1 }}</td>
                                            <td>{{ pedido.created_at }}</td>
                                            <td>{{ pedido.items }}</td>
                                            <td>${{ pedido.total }}</td>
                                            <td>
                                                <span
                                                    class="label label-primary"
                                                    >{{ pedido.status }}</span
                                                >
                                            </td>
                                            <td>
                                                <a
                                                    @click.prevent="
                                                        showPedido(pedido)
                                                    "
                                                    class="btn btn-default"
                                                    >Ver</a
                                                >
                                            </td>
                                        </tr>
                                    </template>
                                    <template v-else>
                                        <tr>
                                            <td align="center" colspan="5">
                                                Aún no hay pedidos
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import Modal from "../components/Modal.vue";
import PedidoItem from "../components/PedidoItem.vue";
export default {
    components: {
        Modal,
        PedidoItem,
    },
    mounted() {
        this.redirectIfGuest();
        this.$store.dispatch("getPedidos", this.currentUser.id);
    },
    methods: {
        showPedido(pedido) {
            this.$store.dispatch("getPedido", { pedido });
            $("#product-modal").modal("show");
        },
    },
    computed: {
        pedidos() {
            return this.$store.state.pedidos;
        },
    },
};
</script>
