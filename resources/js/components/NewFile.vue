<template>
    <div>
        <form class="row Form">
            <div class="col-8 p-l-12">
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="category_id">Categoría</label>
                    <div class="col-10">
                        <select name="category_id" id="category_id">
                            <option value="">Seleccione una categoría</option>
                        </select>
                    </div>
                </div>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="agency_id">Agencia</label>
                    <div class="col-10">
                        <select name="agency_id" id="agency_id">
                            <option value="">Seleccione una agencia</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-8 p-l-12">
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="month">Mes</label>
                    <div class="col-10">
                        <select name="month" id="month">
                            <option value="">Seleccione un mes</option>
                        </select>
                    </div>
                </div>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="year">Año</label>
                    <div class="col-10">
                        <select name="year" id="year">
                            <option value="">Seleccione un año</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        name: "NewFile",
        props: ['token'],

        data: function () {
            return {
                filesLocal: this.files
            }
        },
    }

</script>

<style scoped>

</style>
