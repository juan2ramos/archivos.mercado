@if(auth()->check())
    <header class="Header row justify-between middle-items ">
        <div>
            <div class="row middle-items Nav-headerLogo">
                <svg width="39px" height="37px" viewBox="0 0 39 37" version="1.1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Group-2">
                            <path d="M35.8963597,21.6963597 C35.8963597,21.7963597 35.7963597,21.8963597 35.7963597,21.9963597 C33.0963597,30.1963597 24.2963597,34.6963597 16.0963597,31.9963597 C7.89635974,29.2963597 3.39635974,20.4963597 6.09635974,12.2963597 C8.79635974,4.09635974 17.5963597,-0.403640256 25.7963597,2.29635974 C27.3963597,2.79635974 28.7963597,3.49635974 29.9963597,4.39635974 C28.2963597,2.89635974 26.1963597,1.69635974 23.7963597,0.896359744 C14.2963597,-2.20364026 3.99635974,2.99635974 0.896359744,12.4963597 C-2.20364026,21.9963597 2.99635974,32.2963597 12.4963597,35.3963597 C21.9963597,38.4963597 32.2963597,33.2963597 35.3963597,23.7963597 C35.5963597,23.0963597 35.7963597,22.3963597 35.8963597,21.6963597 Z"
                                  id="Path" fill="#48783A"></path>
                            <path d="M22.9336327,24.4936071 C22.9336327,24.4936071 19.6336327,21.5936071 20.0336327,16.9936071 C20.4336327,12.3936071 26.7336327,6.7936071 38.7336327,9.8936071 C37.1336327,10.8936071 34.2336327,13.0936071 33.1336327,16.2936071 C32.0336327,19.5936071 30.7336327,25.6936071 25.4336327,26.1936071 C23.2336327,24.7936071 24.2336327,20.7936071 24.2336327,20.4936071 C24.2336327,20.1936071 26.0336327,14.7936071 30.4336327,12.8936071 C28.2336327,13.6936071 24.9336327,15.5936071 23.7336327,19.0936071 C22.6336327,22.2936071 22.9336327,24.4936071 22.9336327,24.4936071 Z"
                                  id="Path" fill="#FAA41B"></path>
                            <path d="M17.1340801,23.3 C17.1340801,23.3 13.9340801,24.5 11.4340801,21.7 C8.93408014,18.9 9.23408014,10.8 16.1340801,6 C15.8340801,7.5 15.9340801,10.3 17.2340801,12.8 C18.5340801,15.3 21.0340801,18.4 19.0340801,22.4 C16.9340801,22.8 15.1340801,20.1 15.0340801,19.8 C14.9340801,19.6 13.9340801,17.5 14.2340801,13.4 C13.4340801,15.1 13.6340801,17.8 13.9340801,19.2 C14.3340801,21.5 17.1340801,23.3 17.1340801,23.3 Z"
                                  id="Path" fill="#FAA41B"></path>
                        </g>
                    </g>
                </svg>
                <div class="Nav-button m-l-12" id="ButtonOpen">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <h1>Sístema de archivos MyB</h1>
        </div>

        <div class="row middle-items ">
            <div class="row middle-items">
                <p class="col-16 is-text-right margin-0" style="line-height: 1em">{{auth()->user()->name}}</p>
                <i class="col-16  is-text-right" style="font-size: 11px; line-height: 1em">
                    Último ingreso: {{auth()->user()->last_login}} - IP: {{auth()->user()->last_login_ip}}
                </i>
            </div>
            <a class="button Nav-logoutLarge" href="{{route('logout')}}">Cerrar sesión</a>

            <a href="{{route('logout')}}" class="Nav-logoutSmall m-l-20">
                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="exit-to-app-button" fill="#2C552B" fill-rule="nonzero">
                            <path d="M9.46666667,16.8 L11.3333333,18.6666667 L18,12 L11.3333333,5.33333333 L9.46666667,7.2 L12.9333333,10.6666667 L0,10.6666667 L0,13.3333333 L12.9333333,13.3333333 L9.46666667,16.8 Z M21.3333333,0 L2.66666667,0 C1.2,0 0,1.2 0,2.66666667 L0,8 L2.66666667,8 L2.66666667,2.66666667 L21.3333333,2.66666667 L21.3333333,21.3333333 L2.66666667,21.3333333 L2.66666667,16 L0,16 L0,21.3333333 C0,22.8 1.2,24 2.66666667,24 L21.3333333,24 C22.8,24 24,22.8 24,21.3333333 L24,2.66666667 C24,1.2 22.8,0 21.3333333,0 Z"
                                  id="Shape"></path>
                        </g>
                    </g>
                </svg>
            </a>
        </div>
    </header>
@endif
