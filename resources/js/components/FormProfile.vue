<template>
    <div class="row">
        <div class="col-12 text-center">
            <h4><b>Editar datos del cliente</b></h4>
        </div>
        <div class="form-group col-md-6 mt-3">
            <label>Nombre</label>
            <input type="text" class="form-control" v-model="profile.name" />
            <p class="text-danger">
                {{ errors["name"] }}
            </p>
        </div>
        <div class="form-group col-md-6">
            <label>Apellido paterno</label>
            <input
                type="text"
                class="form-control"
                v-model="profile.apellido_paterno"
            />
            <p class="text-danger">
                {{ errors["apellido_paterno"] }}
            </p>
        </div>
        <div class="form-group col-md-6">
            <label>Apellido materno</label>
            <input
                type="text"
                class="form-control"
                v-model="profile.apellido_materno"
            />
            <p class="text-danger">
                {{ errors["apellido_materno"] }}
            </p>
        </div>
        <div class="form-group col-md-6">
            <label>Email</label>
            <input type="email" class="form-control" v-model="profile.email" />
            <p class="text-danger">
                {{ errors["email"] }}
            </p>
        </div>
        <div class="form-group col-md-6">
            <label>Ci</label>
            <input type="text" class="form-control" v-model="profile.ci" />
            <p class="text-danger">
                {{ errors["ci"] }}
            </p>
        </div>
        <div class="form-group col-md-6">
            <label>Celular</label>
            <input
                type="number"
                class="form-control"
                v-model="profile.phone"
                autocomplete="no-fill"
            />
            <p class="text-danger">
                {{ errors["phone"] }}
            </p>
        </div>
        <div class="form-group col-md-12 text-center">
            <button class="btn btn-main" @click.prevent="actualizarDatos">
                Guardar cambios
            </button>
        </div>
    </div>
</template>
<script>
export default {
    props: ["errors"],
    mounted(){
        this.profile.name = this.currentUser.name
        this.profile.email = this.currentUser.email
        this.profile.phone = this.currentUser.profile.phone
        this.profile.ci = this.currentUser.profile.ci
        this.profile.apellido_materno = this.currentUser.profile.apellido_materno
        this.profile.apellido_paterno = this.currentUser.profile.apellido_paterno
    },
    data() {
        return {
            profile: {
                name: '',
                email: '',
                ci: '',
                phone: '',
                apellido_materno: '',
                apellido_paterno: '',
            },
        };
    },
    methods: {
        actualizarDatos() {
            this.$emit("actualizar-perfil", this.profile);
        },
    },
};
</script>
