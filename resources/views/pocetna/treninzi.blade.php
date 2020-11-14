<div class="container-fluid" id="treninzi">
    <div>
        <p class="treninzi-naslov pl-3">Treninzi</p>
        </b>
    </div>
    <div class="row row-cols-1 row-cols-md-2 mt-5 pt-3 px-md-5 mx-md-5">

        @for($i = 0; $i < 4; $i++)
        <div class="col  mb-4">
            <div class="card  h-100">
                <img src="img/d11.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>