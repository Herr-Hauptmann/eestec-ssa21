<div class="containter-fluid mt-5 pl-5 overflow-fix" id="drugi-o-nama">

  <svg class="slicica overflow-fix" xmlns="http://www.w3.org/2000/svg" width="721.08" height="1254.738" viewBox="0 0 721.08 1254.738">
    <path id="Path_3818" data-name="Path 3818" d="M3397.25,3199.577s-386.112,39.1-687.052-463.3c-1.893-1.955-183.593-316.683,312.3-469.161-3.785,0,329.8-83.081,365.765-321.571C3386.366,1943.6,3397.25,3199.577,3397.25,3199.577Z" transform="translate(-2676.17 -1945.548)" fill="#34c4a9" />
  </svg>

  <div class="container  mb-1">
    <div class="row">
      <div class="col-12 col-sm-8 text-left">
        <h1 class="drugi-o-nama-naslov">
          What People Say About Us?
        </h1>
      </div>

    <!--Controls-->
    <div class="controls-top">
        <a class="btn-floating" href="#carousel-example-multi" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
        <a class="btn-floating" href="#carousel-example-multi" data-slide="next"><i class="fas fa-chevron-right"></i></a>
    </div>
    <!--/.Controls-->

    </div>
    <br>
    <svg class="linija" xmlns="http://www.w3.org/2000/svg" width="100" height="5" viewBox="0 0 100 5">
      <line id="Line_186" data-name="Line 186" x2="100" transform="translate(0 2.5)" fill="none" stroke="#34c4a9" stroke-width="5" />
    </svg>
    <p class="uvodni-tekst front">
      O iskustvima dosadašnjih participanata možete pročitati u nastavku.
    </p>
  </div>


  <div class="container ">
    <div class="row flex-nowrap  overflow-hidden ">
    
    @for ($i = 0; $i < 6; $i++)
    <div class="col-12 col-sm-4 karticaa">
        <div class="card">
          <img class="card-img-top" src="{{ asset('img/drugi-o-nama/2020AzraHeric.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Azra Herić</h5>
            <p class="card-text">Želite da budete uspješni u bilo kojem poslu, da budete dobro organizovani, da znate maksimalno da iskoristite svoje vrijeme, da budete timski igrač i pri tome dobro motivisani? Prijavite se! Upoznat ćete sami sebe, steći mnogo novih poznanstava, naučiti mnogo korisnih stvari i puno se zabaviti u odličnoj atmosferi koja vlada od početka do kraja.</p>
          </div>
        </div>
      </div>
      @endfor

    </div>
  </div>
</div>

