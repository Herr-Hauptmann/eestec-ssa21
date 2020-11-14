<div class="container-fluid mb-5" id="kontakt">
    <div class="row">
        <!-- SVG oblaci -->
        <div class="col-md-4 col-5 order-1">
            <svg class="oblak-kontakt" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="946.294" height="1040.774" viewBox="100 0 946.294 1040.774">
                <defs>
                    <linearGradient id="linear-gradient" x1="0.473" y1="-0.214" x2="0.389" y2="0.893" gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="#19e8c1" />
                        <stop offset="1" stop-color="#00a393" />
                    </linearGradient>
                </defs>
                <g id="Group_334" data-name="Group 334" transform="translate(-38.843 19.671) rotate(-3)">
                    <path id="Path_497" data-name="Path 497" d="M106.417,756.166s335.062,75.948,448.27,0-22.044-160.881,4.56-303.79c26.1-140.193,88.491-167.522,101.844-262.85S581.945-6.909,446.063.371,106.417,78.11,106.417,78.11A106.417,106.417,0,0,0,0,184.527V649.749A106.417,106.417,0,0,0,106.417,756.166Z" transform="matrix(0.883, 0.469, -0.469, 0.883, 370.845, 44.733)" fill="#54049a" />
                    <path id="Path_498" data-name="Path 498" d="M109.362,758.333s335.062,75.948,448.27,0-22.044-160.881,4.56-303.79c26.1-140.193,95.781-128.648,109.134-223.977S609.5,5.665,449.008,2.538s-242.1-9.6-358.029,26.687S2.945,127.922,2.945,186.694V651.916A106.417,106.417,0,0,0,109.362,758.333Z" transform="matrix(0.883, 0.469, -0.469, 0.883, 375.854, 0)" fill="url(#linear-gradient)" />
                </g>
            </svg>

        </div>
        <!-- forma -->
        <div class="col-md-4 order-3 order-md-2">
            <div class="peding-kontakt">
                <form class="pl-3 pr-3 pb-3 pt-3 kontakt-forma pt-5"  method="post" enctype="multipart/form-data">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                <label for="name">
                                    Ime i prezime*</label>
                                <input type="text" class="form-control{{ $errors->has('ime') ? ' has-error' : ''}}" id="name" name="ime" minlength="3" value="{{ old('ime') }}"  required />

                                <p class="error"></p>

                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email*</label>
                                <input type="email" class="form-control " id="email" name="email" value="{{ old('email') }}" required="" />

                                <p class="error"></p>

                            </div>
                            <div class="form-group">
                                <label for="name">
                                    Poruka*</label>
                                <textarea name="poruka" id="message" class="form-control " rows="7" cols="25" required>{{ old('poruka') }}</textarea>

                                <p class="error"></p>

                            </div>

                        </div>

                        <div class="col-md-12">
                            <button type="submit" name="send" class="btn btn-primary btn-info pull-right" id="btnContactUs">
                                Pošalji</button>
                        </div>
                    </div>
                </form>
            </div>
            @if ($message = Session::get('success'))
            <p class="confMessage">{{ $message }}</p>
            @endif
        </div>

        <!-- DESNI TEKST -->
        <div class="col-7 col-md-4 d-flex align-content-center flex-wrap order-2 order-md-3 overflow-fix">
            <div>
                <div>
                    <h1 class="kontakt-naslov mr-5 pr-5 mr-md-1 pr-md-1">
                        Let's talk about
                        <br>
                        everything!
                    </h1>

                </div>

                <div class="pt-5">
                    <p class="kontakt-tekst mr-5 pr-5 mr-md-1 pr-md-1">
                        U slučaju bilo kakvih nejasnoća ili ukoliko Vam je potrebno više informacija vezanih za bilo šta u vezi EESTEC-a,
                        načina organizacije Soft Skills Academy Sarajevo ili same radionice, molimo Vas da ne oklijevate da nas kontaktirate.
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>
