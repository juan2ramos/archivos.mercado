<template>
    <div>
        <div class="row justify-between-m justify-center BarTop middle-items p-8">
            <form action="" @submit.prevent="filterFiles()" method="get" class="row col ">
                <label for="" class="col-5 m-r-8">
                    <input type="search" v-model="search" placeholder="Por nombre" name="search" class="row">
                </label>
                <label for="" class="col-3 m-r-8">
                    <select name="" id="" v-model="category">
                        <option value="">Por Categoria</option>
                        <option v-for="category in categories" :value="category.id">{{category.name}}</option>
                    </select>
                </label>
                <label for="" class="col-2 m-r-8">
                    <select name="year" id="year" v-model="year">
                        <option value="">Por año</option>
                        <option v-for="year in years" :value="year">{{year}}</option>
                    </select>
                </label>
                <label for="" class="col-3 m-r-8">
                    <select name="month" id="months" v-model="month">
                        <option value="">Por mes</option>
                        <option v-for="month in months" :value="month">{{month}}</option>
                    </select>
                </label>
                <button style="min-width: 14.2rem; border-radius: 4px;" :disabled="disabled" type="submit">Filtrar</button>
            </form>

        </div>
        <div class="m-t-24" v-if="Object.keys(files).length !== 0 && files.constructor !== Object">
            <table class="">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Fecha</th>
                    <th class=" is-text-center">Acción</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="file in files">
                    <td>
                        <div class="row middle-items">
                            <img class="m-r-20"
                                 :src="typeFile(file.extension)"
                                 alt="">
                            <span>{{file.name}}</span>
                        </div>
                    </td>
                    <td>{{file.category.name}}</td>
                    <td>{{`${file.month} - ${file.year}`}}</td>
                    <td class="row justify-center">

                        <a class="m-r-20" target="_blank" :href="file.path">
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

                        <a href="">

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
    </div>
</template>

<script>
    import {getYears, getMounths} from '../Services/dates';
    import ajax from 'axios';

    export default {
        props: ['categories'],
        name: "FilesAll",
        data: function () {
            return {
                years: getYears(),
                months: getMounths(),
                category: '',
                year: '',
                month: '',
                search: '',
                files: {},
                disabled: false
            }
        },
        methods: {
            filterFiles() {
                this.disabled= true;
                ajax.get('/admin/filter-products', {
                    params: {
                        'search': this.search,
                        'category': this.category,
                        'year': this.year,
                        'month': this.month,
                    }
                }).then((response) => {
                    this.disabled= false;
                    console.log(response.data)
                    this.files = response.data
                })
            },
            typeFile(type) {
                const types = {
                    png: 'iconimagen.svg',
                    jpg: 'iconimagen.svg',
                    jpeg: 'iconimagen.svg',
                    pdf: 'iconpdf.svg',
                    rar: 'iconrar.svg',
                };
                return '/images/' + types[type]
            }
        }
    }
</script>

<style scoped>

</style>
