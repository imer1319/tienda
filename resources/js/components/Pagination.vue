<template>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item" :class="{ disabled: currentPage === 1 }">
                <a class="page-link" @click="changePage(1)" aria-label="First">
                    <span aria-hidden="true">&laquo;&laquo;</span>
                </a>
            </li>
            <li class="page-item" :class="{ disabled: currentPage === 1 }">
                <a
                    class="page-link"
                    @click="changePage(currentPage - 1)"
                    aria-label="Previous"
                >
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li
                v-for="pageNumber in pageNumbers"
                :key="pageNumber"
                class="page-item"
                :class="{ active: pageNumber === currentPage }"
            >
                <a class="page-link" @click="changePage(pageNumber)">{{
                    pageNumber
                }}</a>
            </li>
            <li
                class="page-item"
                :class="{ disabled: currentPage === totalPages }"
            >
                <a
                    class="page-link"
                    @click="changePage(currentPage + 1)"
                    aria-label="Next"
                >
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <li
                class="page-item"
                :class="{ disabled: currentPage === totalPages }"
            >
                <a
                    class="page-link"
                    @click="changePage(totalPages)"
                    aria-label="Last"
                >
                    <span aria-hidden="true">&raquo;&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    props: {
        currentPage: Number,
        totalPages: Number,
    },
    computed: {
        pageNumbers() {
            const startPage = Math.max(1, this.currentPage - 2);
            const endPage = Math.min(this.totalPages, startPage + 4);

            return Array.from(
                { length: endPage - startPage + 1 },
                (_, index) => startPage + index
            );
        },
        categoria() {
            return this.$store.state.categoria;
        },
    },
    methods: {
        changePage(pageNumber) {
            if (this.categoria != null) {
                this.$emit("page-change-category", pageNumber, this.categoria);
            } else {
                this.$emit("page-change", pageNumber);
            }
        },
    },
};
</script>

<style scoped>
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.page-item {
    cursor: pointer;
}
</style>
