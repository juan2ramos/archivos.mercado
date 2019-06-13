<template>
    <div>
        <div class="row justify-between-m justify-center BarTop middle-items p-8">
            <form action="" @submit.prevent="filterFiles()" method="get" class="row col ">
                <label for="" class="col-16 col-m-5 m-r-8">
                    <input type="search" v-model="search" placeholder="Por nombre" name="search" class="row">
                </label>
                <label for="" class="col-16 col-m-3 m-r-8">
                    <select name="" id="" v-model="category">
                        <option value="">Por Categoria</option>
                        <option v-for="category in categories" :value="category.id">{{category.name}}</option>
                    </select>
                </label>
                <label for="" class="col-m-2 col-16  m-r-8">
                    <select name="year" id="year" v-model="year">
                        <option value="">Por año</option>
                        <option v-for="year in years" :value="year">{{year}}</option>
                    </select>
                </label>
                <label for="" class="col-m-3 col-16 m-r-8">
                    <select name="month" id="months" v-model="month">
                        <option value="">Por mes</option>
                        <option v-for="month in months" :value="month">{{month}}</option>
                    </select>
                </label>
                <button style="min-width: 14.2rem; border-radius: 4px;" :disabled="disabled" type="submit">Filtrar
                </button>
            </form>

        </div>
        <div class="m-t-24 table-container" v-if="Object.keys(files).length !== 0 && files.constructor !== Object">
            <table class="">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>NIT Cliente</th>
                    <th>Fecha</th>
                    <th class=" is-text-center">Ver</th>
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
                    <td>{{file.client.nit}}</td>
                    <td>{{`${file.month} - ${file.year}`}}</td>
                    <td class="row justify-center">
                        <a target="_blank" :href="file.path">
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
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div v-else-if="isSearch">
            No hemos encontrado ningun registro con el término de búsqueda
        </div>
        <div class="Loading " v-show="disabled">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import {getYears, getMounths} from '../Services/dates';
    import ajax from 'axios';
    import isSearchQuery from '../Services/getQueryVariable';

    export default {
        props: ['categories', 'getFiles', 'getSearch'],
        name: "FilesAll",
        data: function () {
            return {
                years: getYears(),
                months: getMounths(),
                category: '',
                year: '',
                month: '',
                search: (this.getSearch) ? this.getSearch : '',
                files: (this.getFiles) ? this.getFiles : {},
                disabled: false,
                isSearch: isSearchQuery('search'),
            }
        },
        methods: {
            filterFiles() {

                const url = new URL(window.location),
                    query_string = url.search,
                    search_params = new URLSearchParams(query_string);
                search_params.set('search', this.search);
                url.search = search_params.toString();
                window.history.replaceState("", "", url);

                this.disabled = true;
                ajax.get('/admin/filter-products', {
                    params: {
                        'search': this.search,
                        'category': this.category,
                        'year': this.year,
                        'month': this.month,
                    }
                }).then((response) => {
                    this.disabled = false;
                    this.files = response.data;
                    this.isSearch = Object.keys(this.files).length === 0;
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
