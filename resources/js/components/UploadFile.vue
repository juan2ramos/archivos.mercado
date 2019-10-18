<template>
    <form class="Form row" @submit="save" action="/admin/archivos" method="post">
        <div class="col-m-8 col-16 p-l-12">
            <div class="row middle-items m-t-12">
                <label class="col-6 is-text-center" for="category_id">Categoría</label>
                <div class="col-10">
                    <select name="category_id" id="category_id">
                        <option value="">Seleccione una categoría</option>
                        <option v-for="category in categories" :value="category.id">{{category.name}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-m-8 col-16 p-l-12">

            <div class="row middle-items m-t-12">
                <label class="col-6 is-text-center" for="directory">Carpeta</label>
                <div class="col-10">
                    <select name="directory" id="directory">
                        <option value="">Seleccione una carpeta</option>
                        <option v-for="directory in directories" :value="directory">{{directory}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="dropzone row justify-center middle-items col-16 m-t-24"></div>
        <div class="justify-center row m-t-40 is-full-width m-b-20">
            <button type="submit" :disabled="disabledButton">Guardar archivo</button>
        </div>
        <input type="hidden" name="mime" :value="mime">
        <input type="hidden" name="extension" :value="extension">
        <input type="hidden" name="path" :value="path">
        <input type="hidden" name="name" :value="name">
        <input type="hidden" name="client_id" :value="client.id">
        <input type="hidden" name="_token" :value="token">
        <div class="Loading " v-show="disabledButton">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </form>
</template>

<script>

    import {getYears, getMounths} from '../Services/dates';
    import uploadFiles from '../Services/uploadFiles';
    import swal from 'sweetalert';

    export default {

        name: 'UploadFile',
        props: ['categories', 'directories', 'token', 'client'],

        data: function () {
            return {
                years: getYears(),
                months: getMounths(),
                dropZone: {},
                disabledButton: false,
                name: '',
                path: '',
                extension: '',
                mime: ''
            }
        },
        mounted: function () {
            this.dropZone = uploadFiles(this.token);
            this.dropZone.on("addedfile", () => this.disabledButton = true);
            this.dropZone.on("success", (file, response) => {
                this.disabledButton = false;
                this.path = response.path;
                this.extension = response.extension;
                this.mime = response.mime;
                this.name = response.name;
            });
            this.dropZone.on("maxfilesexceeded", (file) => {
                this.dropZone.removeFile(file);
                swal("Solo se permite un archivo", {icon: "warning",});
                this.disabledButton = false
            });

        },
        methods: {
            save() {
                this.disabledButton = true
            }
        }
    }
</script>
