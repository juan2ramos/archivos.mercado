
    <div class="row justify-between-m justify-center BarTop middle-items ">
        <div style="min-height: 44px;">
            @if (auth()->user()->isAdmin())


            <a href="{{route('client.uploadFile', $client->nit)}}" class="row middle-items BarTop-link">
                <svg width="19px" height="25px" viewBox="0 0 19 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Artboard" transform="translate(-291.000000, -111.000000)" fill="#232323">
                            <g id="iconanadirarchivo" transform="translate(291.000000, 111.000000)">
                                <path d="M3.1,21.5 L3.1,22.1 C3.1,22.7 3.5,23.1 4.1,23.1 L8.3,23.1 C8,22.6 7.8,22 7.7,21.5 L3.1,21.5 Z" id="Path"></path>
                                <path d="M17.1,4.1 C17.1,3.5 16.7,3.1 16.1,3.1 L15.5,3.1 L15.5,13.6 C16.1,13.7 16.6,13.9 17.1,14.2 L17.1,4.1 Z" id="Path"></path>
                                <path d="M7.5,19.9 C7.5,18.2 8.2,16.5 9.4,15.3 C10.6,14.1 12.3,13.4 14,13.4 L14,1 C14,0.4 13.6,0 13,0 L6.6,0 L6.6,4.2 C6.6,4.4 6.6,4.7 6.5,4.9 C6.3,5.7 5.6,6.3 4.8,6.6 C4.6,6.6 4.4,6.7 4.1,6.7 L0,6.7 L0,19 C0,19.6 0.4,20 1,20 L7.5,19.9 C7.5,20 7.5,20 7.5,19.9 Z" id="Path"></path>
                                <path d="M4.1,5.2 C4.7,5.2 5.1,4.8 5.1,4.2 L5.1,0 L0,5.2 L4.1,5.2 Z" id="Path"></path>
                                <path d="M14,15 C11.2,15 9,17.2 9,20 C9,22.8 11.2,25 14,25 C16.8,25 19,22.8 19,20 C19,17.2 16.8,15 14,15 Z M16.3,20.7 L14.7,20.7 L14.7,22.3 C14.7,22.7 14.4,23 14,23 C13.6,23 13.3,22.7 13.3,22.3 L13.3,20.7 L11.7,20.7 C11.3,20.7 11,20.4 11,20 C11,20 11,20 11,20 C11,19.6 11.3,19.3 11.7,19.3 L13.3,19.3 L13.3,17.7 C13.3,17.3 13.6,17 14,17 C14.4,17 14.7,17.3 14.7,17.7 L14.7,19.3 L16.3,19.3 C16.7,19.3 17,19.6 17,20 C17,20.4 16.7,20.7 16.3,20.7 Z" id="Shape" fill-rule="nonzero"></path>
                            </g>
                        </g>
                    </g>
                </svg>
                <span class="BarTop-span">Añadir archivo</span>
            </a>
            @endif
        </div>
        <form action="{{route('filterFiles')}}" method="get" class="row BarTop-form">
            <input  type="search" placeholder="Buscar" name="search" class="BarTop-input ">
            <button type="submit" class="BarTop-button">
                <svg width="21px" height="21px" viewBox="0 0 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Artboard" transform="translate(-478.000000, -146.000000)" fill="#000000"
                           fill-rule="nonzero">
                            <g id="iconbuscar" transform="translate(478.000000, 146.000000)">
                                <path d="M19.9,18.7 L15.1,13.7 C16.3,12.2 17,10.4 17,8.5 C17,4 13.4,0.4 8.9,0.4 C4.4,0.4 0.8,4 0.8,8.5 C0.8,13 4.4,16.6 8.9,16.6 C10.6,16.6 12.2,16.1 13.5,15.1 L18.3,20.1 C18.5,20.3 18.8,20.4 19.1,20.4 C19.4,20.4 19.6,20.3 19.8,20.1 C20.3,19.8 20.3,19.1 19.9,18.7 Z M8.9,2.6 C12.2,2.6 14.9,5.3 14.9,8.6 C14.9,11.9 12.2,14.6 8.9,14.6 C5.6,14.6 2.9,11.9 2.9,8.6 C2.9,5.3 5.6,2.6 8.9,2.6 Z"
                                      id="Shape"></path>
                            </g>
                        </g>
                    </g>
                </svg>
            </button>
        </form>
    </div>
