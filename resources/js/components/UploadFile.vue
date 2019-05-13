<template>
    <form class="Form row">
        <div class="col-8 p-l-12">
            <div class="row middle-items m-t-12">
                <label class="col-6 is-text-center" for="category_id">Categoría</label>
                <div class="col-10">
                    <select name="category_id" id="category_id">
                        <option value="">Seleccione una categoría</option>
                        <option v-for="category in categories" :value="category.name">{{category.name}}</option>
                    </select>
                </div>
            </div>
            <div class="row middle-items m-t-12">
                <label class="col-6 is-text-center" for="url">Carpeta</label>
                <div class="col-10">
                    <select name="url" id="url">
                        <option value="">Seleccione una carpeta</option>
                        <option v-for="directory in directories" :value="directory">{{directory}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-8 p-l-12">
            <div class="row middle-items m-t-12">
                <label class="col-6 is-text-center" for="months">Mes</label>
                <div class="col-10">
                    <select name="month" id="months">
                        <option value="">Seleccione el mes</option>
                        <option v-for="month in months" :value="month">{{month}}</option>
                    </select>
                </div>
            </div>
            <div class="row middle-items m-t-12">
                <label class="col-6 is-text-center" for="year">Año</label>
                <div class="col-10">
                    <select name="year" id="year">
                        <option value="">Seleccione el año</option>
                        <option v-for="year in years" :value="year">{{year}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="dropzone row justify-center col-16 m-t-24"></div>
    </form>
</template>

<script>
    import swal from 'sweetalert';
    import axios from 'axios';
    import uploadFiles from '../Services/uploadFiles';
    import {getYears, getMounths} from '../Services/dates';

    export default {

        name: 'UploadFile',
        props: ['categories', 'directories'],

        data: function () {
            return {
                years: getYears(),
                months: getMounths()
            }
        },
        mounted: function () {
            uploadFiles();
        },
        methods: {}
    }
</script>
