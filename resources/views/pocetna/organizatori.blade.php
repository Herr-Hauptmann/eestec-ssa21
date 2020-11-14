<div class="container" id="organizatori">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="manji-naslov">
                Meet The Team
            </h1>
        </div>
    </div>

    <div class="row" style="position:relative">
        <div class="col-12 text-center">
            <h1 class="veci-naslov">
                Meet the key people for this year
            </h1>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 mt-5 pt-3">

    @for($i = 0; $i < 6; $i++)
        <div class="col mb-4">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title card-text-organizatori">Ime i prezime organizatora</h5>
                    <p class="card-text-organizatori-uloga">Uloga</p>
                    <p class="card-text-organizatori">mail</p>
                    <p class="card-text-organizatori">telefon</p>
                </div>
            </div>
        </div>
    @endfor
    </div>
</div>