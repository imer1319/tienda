<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <Modal>
                    <FormProfile></FormProfile>
                </Modal> -->
                <div class="dashboard-wrapper dashboard-user-profile">
                    <div class="media">
                        <div class="media-body">
                            <ul class="user-profile-list">
                                <h2>Datos personales</h2>
                                <li>
                                    <span>Nombre completo:</span
                                    >{{ currentUser.name }}
                                    {{ currentUser.profile.apellido_paterno }}
                                    {{ currentUser.profile.apellido_materno }}
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
                                    <span>Fecha de cumpleaños:</span
                                    >{{ currentUser.profile.fecha_nacimiento }}
                                </li>
                                <li>
                                    <!-- <a
                                        @click.prevent="editarPerfil"
                                        class="btn btn-warning"
                                        >editar datos</a
                                    > -->
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="media-body">
                            <ul class="user-profile-list">
                                <h2>Cambiar contraseña</h2>
                                <li>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                        />
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group">
                                        <label>Confirmar contraseña</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                        />
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group">
                                        <button class="btn btn-main">
                                            Guardar cambios
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
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
    methods: {
        editarPerfil() {
            $("#product-modal").modal("show");
        },
    },
};
</script>
