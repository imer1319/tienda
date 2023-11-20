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
        <div>
            <products-modal></products-modal>
        </div>
        <section class="user-dashboard page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Pedido ID</th>
                                        <th>Fecha</th>
                                        <th>Items</th>
                                        <th>Total precio</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-if="sales.length">
                                        <tr
                                            v-for="(sale, index) in sales"
                                            :key="index"
                                        >
                                            <td>#{{ sale.id }}</td>
                                            <td>{{ sale.created_at }}</td>
                                            <td>2</td>
                                            <td>${{ sale.total }}</td>
                                            <td>
                                                <span
                                                    class="label label-primary"
                                                    >{{ sale.status }}</span
                                                >
                                            </td>
                                            <td>
                                                <a
                                                    href="order.html"
                                                    class="btn btn-default"
                                                    >View</a
                                                >
                                            </td>
                                        </tr>
                                    </template>
									<template v-else>
										<tr>
											<td align="center" colspan="5">Aún no hay pedidos</td>
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
export default {
    mounted() {
        this.redirectIfGuest();
        this.$store.dispatch("getSales");
    },
    methods: {
        showSale(sale) {
            this.$store.dispatch("getSale", { sale });
            $("#product-modal").modal("show");
        },
    },
    computed: {
        sales() {
            return this.$store.state.sales;
        },
    },
};
</script>
