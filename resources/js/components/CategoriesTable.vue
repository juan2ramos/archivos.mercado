<template>
    <div class="table-container m-t-36">
        <form @submit.prevent="createFile()" class="Form m-b-60">
            <h3>Crear categoria </h3>
            <div class="row middle-items m-t-12">
                <label class="col-m-5 col-16 is-text-center" for="name-folder">Nombre de la categoria</label>
                <div class="col-m-7  col-16 " >
                    <input name="name" v-model="name" id="name-folder" placeholder="Ingrese el nombre de la categoria">
                </div>
                <button class="col" :disabled="disabled">Crear</button>
            </div>
        </form>
        <table>
            <thead>
            <tr>
                <th>Nombre</th>
                <th class="is-text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(category, index) in categoriesLocal">
                <td>
                    <div v-show="!category.editing">{{category.name}}</div>
                    <form @submit.prevent="updateCategory(category)"
                          v-show="category.editing" class="row middle-items  FormEdit">
                        <input class="col-10" type="text" v-model="category.name">
                        <div class="m-l-4  is-text-center">
                            <a :class="[category.updating ? 'disabled' : '', 'FormEdit-link' ] "
                               @click.prevent="updateCategory(category)">✓</a>
                        </div>
                        <div class="m-l-4   is-text-center">
                            <a class="FormEdit-link cancel" @click.prevent="editCategoryCancel(category)">X</a>
                        </div>
                    </form>
                </td>
                <td class="row justify-center">
                    <a href="" @click.prevent="editCategory(category)">
                        <svg class="m-r-20" width="25px" height="26px" viewBox="0 0 25 26" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-168.000000, -152.000000)" fill="#778E70"
                                   fill-rule="nonzero">
                                    <g id="iconeditar" transform="translate(168.000000, 152.000000)">
                                        <path d="M23.4,2.6 C21.2,0.4 17.7,0.4 15.6,2.6 L1.3,16.9 C1.2,17 1.1,17.2 1.1,17.3 L0,25.2 C0,25.4 0,25.6 0.2,25.8 C0.3,25.9 0.5,26 0.7,26 C0.7,26 0.8,26 0.8,26 L5.5,25.4 C5.9,25.3 6.2,25 6.1,24.6 C6,24.2 5.7,23.9 5.3,24 L1.5,24.5 L2.3,19 L8.1,24.8 C8.2,24.9 8.4,25 8.6,25 C8.8,25 9,24.9 9.1,24.8 L23.4,10.4 C24.4,9.4 25,8 25,6.5 C25,5 24.4,3.7 23.4,2.6 Z M15.9,4.4 L18.3,6.8 L5.2,19.8 L2.8,17.4 L15.9,4.4 Z M8.6,23.2 L6.3,20.9 L19.3,7.8 L21.6,10.1 L8.6,23.2 Z M22.6,9.1 L16.9,3.4 C17.6,2.8 18.5,2.5 19.5,2.5 C20.6,2.5 21.6,2.9 22.4,3.7 C23.2,4.5 23.6,5.5 23.6,6.6 C23.6,7.5 23.2,8.4 22.6,9.1 Z"
                                              id="Shape"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <a href="" @click.prevent="deleteCategory(category, index)">
                        <svg width="22px" height="26px" viewBox="0 0 22 26" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-201.000000, -154.000000)" fill="#444242">
                                    <g id="iconeliminar" transform="translate(201.000000, 154.000000)">
                                        <path d="M20.085,2.925 L15.275,2.925 L15.275,1.43 C15.275,0.65 14.625,0 13.845,0 L8.45,0 C7.67,0 7.02,0.65 7.02,1.43 L7.02,2.925 L2.015,2.925 C1.04,2.925 0.26,3.705 0.26,4.68 C0.26,5.655 1.04,6.435 2.015,6.435 L2.47,6.435 L3.315,23.335 C3.38,24.83 4.615,26 6.11,26 L16.12,26 C17.615,26 18.85,24.83 18.915,23.335 L19.76,6.435 L20.085,6.435 C21.06,6.435 21.84,5.655 21.84,4.68 C21.84,3.705 21.06,2.925 20.085,2.925 Z M7.995,1.43 C7.995,1.17 8.19,0.975 8.45,0.975 L13.845,0.975 C14.105,0.975 14.3,1.17 14.3,1.43 L14.3,2.925 L8.06,2.925 L8.06,1.43 L7.995,1.43 Z M17.875,23.27 C17.81,24.245 17.03,24.96 16.12,24.96 L6.11,24.96 C5.135,24.96 4.42,24.245 4.355,23.27 L3.51,6.435 L18.72,6.435 L17.875,23.27 Z M20.085,5.395 L2.015,5.395 C1.625,5.395 1.3,5.07 1.3,4.68 C1.3,4.29 1.625,3.9 2.015,3.9 L20.02,3.9 C20.475,3.9 20.8,4.29 20.8,4.68 C20.8,5.07 20.475,5.395 20.085,5.395 Z"
                                              id="Shape" fill-rule="nonzero"></path>
                                        <path d="M11.05,22.945 C11.83,22.945 12.415,22.36 12.415,21.58 L12.415,15.535 C12.415,15.275 12.22,15.015 11.895,15.015 C11.635,15.015 11.375,15.21 11.375,15.535 L11.375,21.58 C11.375,21.775 11.245,21.905 11.05,21.905 C10.855,21.905 10.66,21.775 10.66,21.58 L10.66,9.36 C10.66,9.165 10.79,9.035 11.05,9.035 C11.31,9.035 11.375,9.165 11.375,9.36 L11.375,11.505 C11.375,11.765 11.635,12.025 11.895,12.025 C12.155,12.025 12.415,11.83 12.415,11.505 L12.415,9.36 C12.415,8.58 11.83,7.995 11.05,7.995 C10.27,7.995 9.685,8.58 9.685,9.36 L9.685,21.58 C9.685,22.36 10.27,22.945 11.05,22.945 Z"
                                              id="Path"></path>
                                        <path d="M5.395,20.995 C5.395,21.385 5.59,21.71 5.85,21.97 C6.11,22.23 6.435,22.295 6.76,22.295 C6.76,22.295 6.825,22.295 6.825,22.295 C7.215,22.295 7.54,22.1 7.8,21.84 C8.06,21.58 8.19,21.19 8.125,20.865 L7.605,10.4 C7.605,10.01 7.41,9.685 7.15,9.425 C6.89,9.165 6.5,9.1 6.175,9.1 C5.395,9.165 4.81,9.815 4.875,10.53 L5.395,20.995 Z M6.24,10.14 C6.24,10.14 6.24,10.14 6.24,10.14 C6.37,10.14 6.435,10.14 6.5,10.205 C6.565,10.27 6.63,10.335 6.63,10.465 L7.15,20.93 C7.15,20.995 7.15,21.125 7.085,21.19 C7.02,21.255 6.955,21.32 6.825,21.32 C6.76,21.32 6.63,21.32 6.565,21.255 C6.5,21.19 6.435,21.125 6.435,20.995 L5.85,10.53 C5.85,10.335 6.045,10.14 6.24,10.14 Z"
                                              id="Shape" fill-rule="nonzero"></path>
                                        <path d="M15.275,22.295 C15.275,22.295 15.34,22.295 15.34,22.295 C16.055,22.295 16.705,21.71 16.705,20.995 L17.225,10.53 C17.225,10.14 17.095,9.815 16.9,9.555 C16.64,9.295 16.315,9.1 15.925,9.1 C15.535,9.1 15.21,9.23 14.95,9.425 C14.69,9.685 14.495,10.01 14.495,10.4 L13.975,20.865 C13.91,21.645 14.495,22.295 15.275,22.295 Z M14.95,20.93 L15.47,10.465 C15.47,10.4 15.535,10.27 15.6,10.205 C15.665,10.14 15.73,10.14 15.86,10.14 C15.86,10.14 15.86,10.14 15.86,10.14 C15.925,10.14 16.055,10.205 16.12,10.27 C16.185,10.335 16.185,10.4 16.185,10.53 L15.665,20.995 C15.665,21.19 15.47,21.32 15.275,21.32 C15.08,21.32 14.95,21.125 14.95,20.93 Z"
                                              id="Shape" fill-rule="nonzero"></path>
                                        <path d="M11.895,13 C11.635,13 11.375,13.26 11.375,13.52 C11.375,13.78 11.635,14.04 11.895,14.04 C12.155,14.04 12.415,13.845 12.415,13.52 C12.415,13.26 12.22,13 11.895,13 Z"
                                              id="Path"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="Loading " v-show="disabled">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import swal from 'sweetalert';
    export default {
        name: 'CategoriesTable',
        props: ['categories', 'token'],
        data: function () {
            return {
                name: '',
                disabled: false,
                categoriesLocal: []
            }
        },
        mounted: function () {
            this.categoriesLocal = Object.assign([], this.categoriesLocal, this.categories.map((item) =>
                ({'id': item.id, 'name': item.name, 'nameBack': item.name, 'editing': false, 'updating': false})))
        },
        methods: {
            createFile() {
                this.disabled = true;
                axios.post('/admin/categorias/', {
                    '_token': this.token,
                    'name': this.name,
                }).then((response) => {
                    this.disabled = false;
                    this.categoriesLocal.push(
                        {
                            'id': response.data.id,
                            'name': response.data.name,
                            'nameBack': response.data.name,
                            'editing': false,
                            'updating': false
                        }
                    );
                    swal("Categoria ha sido  creada", {icon: "success",});
                    this.name = '';
                }).catch((error) => {
                    console.log(error);
                    this.disabled = false;
                    if (error.response.status === 422) {
                        this.errors = error.response.data;
                        console.log(this.errors);
                    }
                });
            },
            editCategory(category) {
                category.nameBack = category.name;
                category.editing = true;
            },
            editCategoryCancel(category) {
                category.name = category.nameBack;
                category.editing = false;
            },
            updateCategory(category) {
                category.updating = true;
                axios.put(`/admin/categorias/${category.id}`, {
                    '_token': this.token,
                    'name': category.name,
                }).then((response) => {
                    category.editing = false;
                    category.name = response.data.name;
                    category.updating = false;
                }).catch((error) => {
                    this.disabled = false;
                    if (error.response.status === 422) {
                        this.errors = error.response.data;
                        category.name = category.nameBack;
                        category.editing = false;
                    }
                });
            },

            deleteCategory(category, index) {
                swal({
                    title: "Estas seguro ?",
                    text: "Recuerda que se ya no prodrás recuper la información.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {
                        axios.delete(`/admin/categorias/${category.id}`)
                            .then((response) => {
                                if (response.data.success) {
                                    this.categoriesLocal.splice(index, 1);
                                    swal("Categoria ha sido  eliminada", {icon: "success",});
                                    return
                                }
                                swal("Hubo un error! Vuelve a intentarlo", {icon: "error",});
                            });
                    }
                });

            }
        }

    }
</script>

