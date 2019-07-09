
    <div class="row justify-between-m justify-center BarTop middle-items">
        <div>
            <a href="{{route('users.create.admin')}}" class="row middle-items BarTop-link">
                <svg width="23px" height="25px" viewBox="0 0 23 25" version="1.1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Artboard" transform="translate(-561.000000, -206.000000)" fill="#232323">
                            <g id="iconanadirusuario" transform="translate(561.000000, 206.000000)">
                                <path d="M9.9,13.3 C13.6,13.3 16.5,10.3 16.5,6.7 C16.5,3 13.5,0.1 9.9,0.1 C6.2,2.22044605e-16 3.3,3 3.3,6.6 C3.3,10.3 6.2,13.3 9.9,13.3 Z"
                                      id="Path"></path>
                                <path d="M18.3,15.1 C17.9,14.4 17.5,13.6 16.9,12.9 C16.6,12.5 16,12.1 15.5,11.8 C14.1,13.4 12.1,14.3 9.9,14.3 C7.7,14.3 5.7,13.3 4.3,11.8 C3.8,12.1 3.2,12.5 2.9,12.9 C1.9,14.1 0.5,16.5 0.2,19.8 C0.2,20.5 0.5,21.5 1,21.9 C2.1,22.7 4.4,23.6 9.3,23.6 C11,23.6 12.4,23.5 13.6,23.3 C13.1,22.5 12.8,21.5 12.8,20.5 C13,17.6 15.3,15.2 18.3,15.1 Z"
                                      id="Path"></path>
                                <path d="M18.3,16.1 C15.8,16.1 13.9,18.1 13.9,20.5 C13.9,22.9 15.9,24.9 18.3,24.9 C20.7,24.9 22.7,22.9 22.7,20.5 C22.7,18.1 20.7,16.1 18.3,16.1 Z M20.5,21.4 L18.8,21.4 L18.8,23.1 C18.8,23.4 18.6,23.6 18.3,23.6 C18,23.6 17.8,23.4 17.8,23.1 L17.8,21.4 L16.1,21.4 C15.8,21.4 15.6,21.2 15.6,20.9 C15.6,20.6 15.8,20.4 16.1,20.4 L17.8,20.4 L17.8,18.7 C17.8,18.4 18,18.2 18.3,18.2 C18.6,18.2 18.8,18.4 18.8,18.7 L18.8,20.4 L20.5,20.4 C20.8,20.4 21,20.6 21,20.9 C21,21.1 20.8,21.4 20.5,21.4 Z"
                                      id="Shape" fill-rule="nonzero"></path>
                            </g>
                        </g>
                    </g>
                </svg>
                <span class="BarTop-span">Añadir usuario</span>
            </a>
        </div>
        <form action="{{route('users.index')}}" method="get" class="row BarTop-form ">
            <input type="search" placeholder="Buscar" name="search" class="BarTop-input">
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
    <div class="row justify-end">
        <a href="{{route('validate.user')}}" style="color: #37542f; padding: 10px 0; text-decoration: underline">Validar usuarios</a>
    </div>
