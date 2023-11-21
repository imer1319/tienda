<template>
    <div class="row">
        <div class="form-group col-md-6">
            <label>Nombre</label>
            <input type="text" class="form-control" v-model="profile.name" />
        </div>
        <div class="form-group col-md-6">
            <label>Apellido paterno</label>
            <input
                type="text"
                class="form-control"
                v-model="profile.apellido_paterno"
            />
        </div>
        <div class="form-group col-md-6">
            <label>Apellido materno</label>
            <input
                type="text"
                class="form-control"
                v-model="profile.apellido_materno"
            />
        </div>
        <div class="form-group col-md-6">
            <label>Email</label>
            <input type="text" class="form-control" v-model="profile.email" />
        </div>
        <div class="form-group col-md-6">
            <label>Ci</label>
            <input type="text" class="form-control" v-model="profile.ci" />
        </div>
        <div class="form-group col-md-6">
            <label>Celular</label>
            <input type="text" class="form-control" v-model="profile.phone" />
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            profile: {},
        };
    },
};
</script>
