<template>
    <div v-if="clients.length">
        <table>
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>NIT</th>
                <th class="is-text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(client, index) in  clientsLocal">
                <td>{{client.business_name}}</td>
                <td>{{client.user.email}}</td>
                <td>{{client.full_nit}}</td>
                <td class="row justify-center middle-items">
                    <a @click.prevent="alert(client.nit, index)" class="m-r-16">
                        <svg width="25px" height="25px" viewBox="0 0 25 25" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-536.000000, -288.000000)">
                                    <g id="iconeliminar" transform="translate(536.000000, 288.000000)">
                                        <path d="M12.5,25 C5.6,25 0,19.4 0,12.5 C0,5.6 5.6,0 12.5,0 C19.4,0 25,5.6 25,12.5 C25,19.4 19.4,25 12.5,25 Z M12.5,2.1 C6.8,2.1 2.1,6.8 2.1,12.5 C2.1,18.2 6.7,22.9 12.5,22.9 C18.2,22.9 22.9,18.3 22.9,12.5 C22.9,6.7 18.2,2.1 12.5,2.1 Z"
                                              id="Shape" fill="#778E70" fill-rule="nonzero"></path>
                                        <path d="M16.7,7.2 L7.2,16.7 C6.9,17 6.9,17.5 7.2,17.8 C7.5,18.1 8,18.1 8.3,17.8 L17.8,8.3 C18.1,8 18.1,7.5 17.8,7.2 C17.5,6.9 17,6.9 16.7,7.2 Z"
                                              id="Path" fill="#444242"></path>
                                        <path d="M7.2,8.3 L16.7,17.8 C17,18.1 17.5,18.1 17.8,17.8 C18.1,17.5 18.1,17 17.8,16.7 L8.3,7.2 C8,6.9 7.5,6.9 7.2,7.2 C6.9,7.5 6.9,8 7.2,8.3 Z"
                                              id="Path" fill="#444242"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <a :href="`/admin/usuarios/${client.nit}`" class="m-r-16">
                        <svg width="26px" height="23px" viewBox="0 0 26 23" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-503.000000, -264.000000)" fill="#778E70"
                                   fill-rule="nonzero">
                                    <g id="iconcarpeta2" transform="translate(503.000000, 264.000000)">
                                        <path d="M25,6.3 C25,4.7 23.7,3.3 22,3.3 L14.6,3.3 C14.4,1.9 13.1,0.8 11.7,0.8 L3,0.8 C1.4,0.8 0,2.1 0,3.8 L0,21.4 C0,21.9 0.4,22.3 0.9,22.3 L24.2,22.3 C24.7,22.3 25.1,21.9 25.1,21.4 L25.1,6.3 L25,6.3 Z M23.3,20.5 L1.7,20.5 L1.7,3.8 C1.7,3.1 2.3,2.5 3,2.5 L11.7,2.5 C12.4,2.5 13,3.1 13,3.8 L13,4.2 C13,4.6 13.3,5 13.8,5 L22,5 C22.7,5 23.3,5.6 23.3,6.3 L23.3,20.5 Z"
                                              id="Shape"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <a :href="`/admin/usuarios/${client.nit}/editar`">
                        <svg width="25px" height="26px" viewBox="0 0 25 26" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-693.000000, -182.000000)" fill="#778E70"
                                   fill-rule="nonzero">
                                    <g id="iconeditar" transform="translate(693.000000, 182.000000)">
                                        <path d="M23.4,2.6 C21.2,0.4 17.7,0.4 15.6,2.6 L1.3,16.9 C1.2,17 1.1,17.2 1.1,17.3 L0,25.2 C0,25.4 0,25.6 0.2,25.8 C0.3,25.9 0.5,26 0.7,26 C0.7,26 0.8,26 0.8,26 L5.5,25.4 C5.9,25.3 6.2,25 6.1,24.6 C6,24.2 5.7,23.9 5.3,24 L1.5,24.5 L2.3,19 L8.1,24.8 C8.2,24.9 8.4,25 8.6,25 C8.8,25 9,24.9 9.1,24.8 L23.4,10.4 C24.4,9.4 25,8 25,6.5 C25,5 24.4,3.7 23.4,2.6 Z M15.9,4.4 L18.3,6.8 L5.2,19.8 L2.8,17.4 L15.9,4.4 Z M8.6,23.2 L6.3,20.9 L19.3,7.8 L21.6,10.1 L8.6,23.2 Z M22.6,9.1 L16.9,3.4 C17.6,2.8 18.5,2.5 19.5,2.5 C20.6,2.5 21.6,2.9 22.4,3.7 C23.2,4.5 23.6,5.5 23.6,6.6 C23.6,7.5 23.2,8.4 22.6,9.1 Z"
                                              id="Shape"></path>
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
        No hemos encontrado ningun cliente con el término de búsqueda {{isSearch}}
    </div>
</template>

<script>
    import swal from 'sweetalert';
    import axios from 'axios';
    import isSearchQuery from '../Services/getQueryVariable';

    export default {

        name: 'ClientsTable',
        props: ['clients', 'token'],

        data: function () {
            return {
                isSearch: isSearchQuery('search'),
                clientsLocal: this.clients
            }
        },
            methods: {
            alert: function (nit, index) {
                swal({
                    title: "Estas seguro ?",
                    text: "Recuerda que se ya no prodrás recuper la información.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {

                    if (willDelete) {
                        axios.delete('/admin/usuarios/' + nit, {
                            _token: this.token
                        }).then((response) => {
                            console.log(response.data)
                            if (response.data.success) {
                                this.clientsLocal.splice(index, 1);
                                swal("usuario Eliminado eliminado", {icon: "success",});
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
