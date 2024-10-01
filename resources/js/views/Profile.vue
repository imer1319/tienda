<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <Modal>
                    <FormProfile
                        :errors="errors"
                        @actualizar-perfil="handleActualizarPerfil"
                    />
                </Modal>
                <div class="dashboard-wrapper dashboard-user-profile">
                    <div class="media">
                        <div class="media-body">
                            <ul class="user-profile-list">
                                <h2 class="text-center">
                                    <b>Datos personales</b>
                                </h2>
                                <li>
                                    <span>Nombre completo:</span
                                    >{{ currentUser.name }}
                                    {{ currentUser.profile?.apellido_paterno }}
                                    {{ currentUser.profile?.apellido_materno }}
                                </li>
                                <li>
                                    <span>Ciudad:</span
                                    >{{ currentUser.profile.ciudad }}
                                </li>
                                <li>
                                    <span>Email:</span>{{ currentUser.email }}
                                </li>
                                <li>
                                    <span>Celular:</span
                                    >{{ currentUser.profile.phone }}
                                </li>
                                <li>
                                    <span>Fecha de nacimiemto:</span
                                    >{{ currentUser.profile.fecha_nacimiento }}
                                </li>
                                <li>
                                    <a
                                        @click.prevent="editarPerfil"
                                        class="btn btn-warning"
                                        >editar datos</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <ul class="user-profile-list">
                                <h2 class="text-center">
                                    <b>Cambiar contraseña</b>
                                </h2>
                                <li>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            autocomplete="off"
                                            v-model="user.password"
                                        />
                                        <p class="text-danger">
                                            {{ errors["password"] }}
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group">
                                        <label>Confirmar contraseña</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            autocomplete="off"
                                            v-model="user.password_confirmation"
                                        />
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group">
                                        <button
                                            class="btn btn-main"
                                            @click.prevent="actualizarPassword"
                                        >
                                            Guardar cambios
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Modal from "../components/Modal.vue";
import FormProfile from "../components/FormProfile.vue";
export default {
    components: {
        Modal,
        FormProfile,
    },
    data() {
        return {
            user: {
                password: "",
                password_confirmation: "",
                user_id: null,
            },
            errors: {},
        };
    },
    methods: {
        editarPerfil() {
            $("#product-modal").modal("show");
        },
        handleActualizarPerfil(nuevosDatos) {
            nuevosDatos.user_id = this.currentUser.id;
            axios
                .post("/api/actualizar-datos-usuario", nuevosDatos)
                .then(() => {
                    this.$toastr.s(
                        "Los datos fueron actualizados correctamente"
                    );
                    window.location.reload();
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = {};
                        Object.keys(error.response.data.errors).forEach(
                            (key) => {
                                this.errors[key] =
                                    error.response.data.errors[key][0];
                            }
                        );
                    } else {
                        console.error(
                            "Error al actualizar la contraseña:",
                            error.response.data.message
                        );
                    }
                });
        },
        actualizarPassword() {
            this.user.user_id = this.currentUser.id;
            axios
                .post("/api/actualizar-password", this.user)
                .then(() => {
                    this.user.password = "";
                    this.user.password_confirmation = "";
                    this.$toastr.s("La contraseña se modifico exitosamente");
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = {};
                        Object.keys(error.response.data.errors).forEach(
                            (key) => {
                                this.errors[key] =
                                    error.response.data.errors[key][0];
                            }
                        );
                    } else {
                        console.error(
                            "Error al actualizar la contraseña:",
                            error.response.data.message
                        );
                    }
                });
        },
    },
};
</script>
