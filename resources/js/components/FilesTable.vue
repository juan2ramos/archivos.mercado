<template>
    <div>
        <div class="Crumbs m-t-32">
            <span> Ruta: <a :href="'/admin/usuarios/' + client.nit">{{client.nit}}</a> </span>
            <span v-for="param in params">
               >
                <a :href="'/admin/usuarios/' + client.nit + '?route_files=' + param.url">
                    {{param.name}}
                </a>
            </span>
        </div>
        <div class="m-t-24 table-container">
            <table class="">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Fecha</th>
                    <th class=" is-text-center">Acción</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(file, index)  in filesLocal" :key="index">
                    <td>
                        <div class="row middle-items">
                            <img class="m-r-20"
                                 :src=" (file.type === 'directory')
                                  ? '/images/iconcarpeta.svg': typeFile(file.type)"
                                 alt="">

                            <span v-show="!file.editing">{{file.name}}</span>
                            <form @submit.prevent="updateFolder(file)"
                                  v-show="file.editing" class="row middle-items  FormEdit">
                                <input class="col-10" type="text" v-model="file.name">
                                <div class="m-l-4  is-text-center">
                                    <a :class="[file.updating ? 'disabled' : '', 'FormEdit-link' ] "
                                       @click.prevent="updateFolder(file)">✓</a>
                                </div>
                                <div class="m-l-4   is-text-center">
                                    <a class="FormEdit-link cancel" @click.prevent="editFolderCancel(file)">X</a>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td> {{file.category}}</td>
                    <td> {{file.date}}</td>
                    <td class="row justify-center">
                        <a :href="'/admin/usuarios/' + client.nit + '?route_files=' + routeFiles + file.name"
                           class="m-r-20" v-if="file.type === 'directory'">
                            <svg width="29px" height="26px" viewBox="0 0 29 26" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-250.000000, -157.000000)">
                                        <g id="iconcarpeta2" transform="translate(250.000000, 157.000000)">
                                            <path d="M28.2608696,7.12173913 C28.2608696,5.31304348 26.7913043,3.73043478 24.8695652,3.73043478 L16.5043478,3.73043478 C16.2782609,2.14782609 14.8086957,0.904347826 13.226087,0.904347826 L3.39130435,0.904347826 C1.5826087,0.904347826 0,2.37391304 0,4.29565217 L0,24.1913043 C0,24.7565217 0.452173913,25.2086957 1.0173913,25.2086957 L27.3565217,25.2086957 C27.9217391,25.2086957 28.373913,24.7565217 28.373913,24.1913043 L28.373913,7.12173913 L28.2608696,7.12173913 Z M26.3391304,23.173913 L1.92173913,23.173913 L1.92173913,4.29565217 C1.92173913,3.50434783 2.6,2.82608696 3.39130435,2.82608696 L13.226087,2.82608696 C14.0173913,2.82608696 14.6956522,3.50434783 14.6956522,4.29565217 L14.6956522,4.74782609 C14.6956522,5.2 15.0347826,5.65217391 15.6,5.65217391 L24.8695652,5.65217391 C25.6608696,5.65217391 26.3391304,6.33043478 26.3391304,7.12173913 L26.3391304,23.173913 Z"
                                                  id="Shape" fill="#A4C49A" fill-rule="nonzero"></path>
                                            <path d="M14.4522947,9.2884058 C14.2890097,9.12512077 14.1257246,9.04347826 13.9624396,9.04347826 C13.7991546,9.04347826 13.5542271,9.12512077 13.4725845,9.2884058 L9.22717391,13.8603865 C8.98224638,14.1869565 8.98224638,14.5951691 9.22717391,14.9217391 C9.55374396,15.1666667 9.96195652,15.1666667 10.2885266,14.9217391 L13.3092995,11.7376812 L13.3092995,19.6570048 C13.3092995,20.0652174 13.6358696,20.3917874 14.0440821,20.3917874 C14.4522947,20.3917874 14.7788647,20.0652174 14.7788647,19.6570048 L14.7788647,11.7376812 L17.7996377,14.9217391 C18.0445652,15.2483092 18.5344203,15.2483092 18.8609903,14.9217391 C19.1875604,14.6768116 19.1875604,14.1869565 18.8609903,13.8603865 L14.4522947,9.2884058 Z"
                                                  id="Path" fill="#444242"
                                                  transform="translate(14.074698, 14.717633) rotate(90.361459) translate(-14.074698, -14.717633) "></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a class="m-r-20" target="_blank" :href="`/admin/archivos/visualizar/${file.id}`" v-else>
                            <svg width="20px" height="26px" viewBox="0 0 20 26" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-503.000000, -451.000000)">
                                        <g id="icondescargar" transform="translate(503.000000, 451.000000)">
                                            <path d="M9.60555556,17.4777778 C9.89444444,17.7666667 10.3277778,17.7666667 10.6166667,17.4777778 L13.7944444,14.3 C14.0833333,14.0111111 14.0833333,13.5777778 13.7944444,13.2888889 C13.5055556,13 13.0722222,13 12.7833333,13.2888889 L10.8333333,15.1666667 L10.8333333,9.82222222 C10.8333333,9.38888889 10.4722222,9.1 10.1111111,9.1 C9.67777778,9.1 9.38888889,9.46111111 9.38888889,9.82222222 L9.38888889,15.1666667 L7.51111111,13.2888889 C7.22222222,13 6.78888889,13 6.42777778,13.2888889 C6.13888889,13.5777778 6.13888889,14.0111111 6.42777778,14.3 L9.60555556,17.4777778 Z"
                                                  id="Path" fill="#444242"></path>
                                            <path d="M13.2888889,19.4277778 L6.93333333,19.4277778 C6.5,19.4277778 6.21111111,19.7888889 6.21111111,20.15 C6.21111111,20.5833333 6.57222222,20.8722222 6.93333333,20.8722222 L13.2888889,20.8722222 C13.7222222,20.8722222 14.0111111,20.5111111 14.0111111,20.15 C14.0111111,19.7166667 13.7222222,19.4277778 13.2888889,19.4277778 Z"
                                                  id="Path" fill="#444242"></path>
                                            <path d="M17.2611111,0.361111111 L6.13888889,0.361111111 C5.92222222,0.361111111 5.77777778,0.433333333 5.63333333,0.577777778 L0.866666667,5.34444444 C0.722222222,5.48888889 0.65,5.63333333 0.65,5.85 L0.65,23.3277778 C0.65,24.6277778 1.66111111,25.6388889 2.96111111,25.6388889 L17.2611111,25.6388889 C18.5611111,25.6388889 19.5722222,24.6277778 19.5722222,23.3277778 L19.5722222,2.67222222 C19.5722222,1.44444444 18.5611111,0.361111111 17.2611111,0.361111111 Z M6.21111111,2.09444444 L6.21111111,5.05555556 C6.21111111,5.48888889 5.85,5.92222222 5.34444444,5.92222222 L2.38333333,5.92222222 L6.21111111,2.09444444 Z M18.1277778,23.3277778 C18.1277778,23.7611111 17.7666667,24.1944444 17.2611111,24.1944444 L2.96111111,24.1944444 C2.52777778,24.1944444 2.09444444,23.8333333 2.09444444,23.3277778 L2.09444444,7.43888889 L5.34444444,7.43888889 C6.64444444,7.43888889 7.65555556,6.42777778 7.65555556,5.12777778 L7.65555556,1.87777778 L17.2611111,1.87777778 C17.6944444,1.87777778 18.1277778,2.23888889 18.1277778,2.74444444 L18.1277778,23.3277778 Z"
                                                  id="Shape" fill="#A4C49A" fill-rule="nonzero"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a v-if="file.type === 'directory' && isFileCreated" @click.prevent="editFolder(file)">
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
                        <a v-if="isFileCreated" @click.prevent="deleteFile(file,index)" href="">

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
        </div>
        <form @submit.prevent="createFile()" v-if="isFileCreated" class="Form m-t-60">
            <h3>Crear un nueva carpeta </h3>
            <div class="row middle-items m-t-12">
                <label class="col-m-5 col-16 is-text-center" for="name-folder">Nombre de la carpeta</label>
                <div class="col-m-7  col-16">
                    <input name="name" v-model="name" id="name-folder" placeholder="Ingrese el nombre de la carpeta">
                </div>
                <button class="col" :disabled="disabled">Crear</button>
            </div>
        </form>
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
        name: "FilesTable",
        props: ['client', 'files', 'token', 'isFileCreated'],

        data: function () {
            return {
                filesLocal: [],
                name: '',
                url: {},
                routeFiles: '',
                params: {},
                routePath: '',
                disabled: false,
            }
        },
        mounted: function () {
            console.log(this.files)
            this.url = new URL(window.location.href);
            this.routeFiles = this.url.searchParams.get("route_files");

            if (this.routeFiles) {
                const routeFiles = this.routeFiles.split('/');
                this.params = routeFiles.reduce((obj, str, index) => {
                    const urlAnt = (obj[index - 1]) ? obj[index - 1].url + '/' : '';
                    obj[index] = {'name': str, 'url': urlAnt + str};
                    return obj;
                }, {});
                this.routeFiles += '/'
            } else {
                this.routeFiles = '';
            }
            this.filesLocal = Object.assign([], this.filesLocal, this.files.map((item) =>
                ({
                    'id': item.id,
                    'name': item.name,
                    'nameBack': item.name,
                    'type': item.type,
                    'date': item.date,
                    'category': item.category,
                    'editing': false,
                    'updating': false,
                    'path': item.path,
                })))

        },
        methods: {
            createFile() {
                this.disabled = true;
                axios.post('/admin/directorios/', {
                    '_token': this.token,
                    'name': this.name,
                    'nit': this.client.nit,
                    'path': this.routeFiles,
                }).then((response) => {

                    this.disabled = false;
                    this.filesLocal.push({
                        'name': response.data.name,
                        'path': response.data.path,
                        'type': 'directory',
                        'nameBack': response.data.name,
                        'editing': false,
                        'updating': false
                    });
                    this.name = '';
                }).catch((error) => {
                    this.disabled = false;
                    if (error.response.status === 422) {
                        const errors = error.response.data.errors;
                        let messages = '';
                        for (let key in errors) {
                            messages += errors[key] + ' ';
                        }
                        swal("upps algo ha sucedido", messages, "error");
                    }
                });
            },
            deleteFile(file, index) {

                swal({
                    title: "Estas seguro ?",
                    text: "Recuerda que se ya no prodrás recuper la información.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        this.disabled = true;
                        axios.post(`/admin/directorios/delete`, {
                            'name': file.name,
                            'nit': this.client.nit,
                            'path': this.routeFiles,
                            'id': file.id,
                            'isDirectory': file.type === 'directory'
                        }).then((response) => {
                            this.disabled = false;
                            if (response.data.success) {
                                this.filesLocal.splice(index, 1);
                                swal("Archivo eliminado", {icon: "success",});
                                return
                            }
                            swal("Hubo un error! Vuelve a intentarlo", {icon: "error",});
                        }).catch(() => this.disabled = false);
                    }
                });

            },
            typeFile(type) {
                const types = {
                    png: 'iconimagen.svg',
                    jpg: 'iconimagen.svg',
                    jpeg: 'iconimagen.svg',
                    pdf: 'iconpdf.svg',
                    rar: 'iconrar.svg',
                    zip: 'iconrar.svg',
                };
                return '/images/' + types[type]
            },
            updateFolder(folder) {
                folder.updating = true;
                this.disabled = true;
                axios.put(`/admin/directorios/${folder.name}`, {
                    '_token': this.token,
                    'name': folder.name,
                    'nameBack': folder.nameBack,
                    'path': this.routeFiles,
                    'nit': this.client.nit,
                }).then((response) => {
                    folder.editing = false;
                    folder.name = response.data;
                    folder.updating = false;
                    this.disabled = false;
                }).catch((error) => {
                    this.disabled = false;
                    folder.updating = false;
                    if (error.response.status === 422) {
                        this.errors = error.response.data;
                        folder.name = category.nameBack;
                        folder.editing = false;
                        folder.updating = true;
                    }
                });
            },
            editFolderCancel(folder) {
                folder.name = folder.nameBack;
                folder.editing = false;
            },
            editFolder(folder) {
                folder.nameBack = folder.name;
                folder.editing = true;
            },
        }
    }

</script>

<style scoped lang="scss">
    .Crumbs {
        a {
            color: #FAA41B !important;
            text-decoration: underline;
        }
    }
</style>
