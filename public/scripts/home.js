$(document).ready(function() {
    let naziv = $('.pocetna-naslov').text();
    let _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "/",
        type: "POST",
        data: {
            naziv: naziv,
            _token: _token
        },
        success: function(response) {

            console.log(response.organizatori);
            console.log(response.pozicije);
            $('.pocetna-naslov').text(response.model.naziv);
            $('.preostalo-vrijeme').text(getPreostaloVrijeme(response.model.datum_zatvaranja_prijava));
            $('.pocetna-datum-odrzavanja').text(getDatumOdrzavanja(response.model.datum_pocetka, response.model.datum_kraja));
            $('.ssa-ko').text(koUcestvuje(response.model.broj_ucesnika));
            $('.ssa-rok-prijava').text(getRokZaPrijaveTekst(response.model.datum_zatvaranja_prijava));
            $('.ssa-mjesto-odrzavanja').text(response.model.mjesto_odrzavanja);
            $('.ssa-kada-se-odrzava').text(getKadaSeOdrzava(response.model.datum_pocetka, response.model.datum_kraja));
            $('.ssa-broj-edicija').text(getBrojEdicija(response.brojEdicija));
            prikaziTreninge(response.treninzi);
            prikaziOrganizatore(response.organizatori, response.pozicije);
            prikaziPostignuca(response.postignuca);

            setInterval(function() { ajaxPoziv(); }, 10000);
        },
    });
});

function ajaxPoziv() {
    let naziv = $('.pocetna-naslov').text();
    let _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "/",
        type: "POST",
        data: {
            naziv: naziv,
            _token: _token
        },
        success: function(response) {

            console.log(response.organizatori);
            console.log(response.pozicije);
            $('.pocetna-naslov').text(response.model.naziv);
            $('.preostalo-vrijeme').text(getPreostaloVrijeme(response.model.datum_zatvaranja_prijava));
            $('.pocetna-datum-odrzavanja').text(getDatumOdrzavanja(response.model.datum_pocetka, response.model.datum_kraja));
            $('.ssa-ko').text(koUcestvuje(response.model.broj_ucesnika));
            $('.ssa-rok-prijava').text(getRokZaPrijaveTekst(response.model.datum_zatvaranja_prijava));
            $('.ssa-mjesto-odrzavanja').text(response.model.mjesto_odrzavanja);
            $('.ssa-kada-se-odrzava').text(getKadaSeOdrzava(response.model.datum_pocetka, response.model.datum_kraja));
            $('.ssa-broj-edicija').text(getBrojEdicija(response.brojEdicija));
            prikaziTreninge(response.treninzi);
            prikaziOrganizatore(response.organizatori, response.pozicije);
            prikaziPostignuca(response.postignuca);
        },
    });
}



$('.dropdown-menu li a').click(function() {
    let naziv = $(this).text();
    let _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "/",
        type: "POST",
        data: {
            naziv: naziv,
            _token: _token
        },
        success: function(response) {

            console.log(response.organizatori);
            console.log(response.pozicije);
            $('.pocetna-naslov').text(response.model.naziv);
            $('.preostalo-vrijeme').text(getPreostaloVrijeme(response.model.datum_zatvaranja_prijava));
            $('.pocetna-datum-odrzavanja').text(getDatumOdrzavanja(response.model.datum_pocetka, response.model.datum_kraja));
            $('.ssa-ko').text(koUcestvuje(response.model.broj_ucesnika));
            $('.ssa-rok-prijava').text(getRokZaPrijaveTekst(response.model.datum_zatvaranja_prijava));
            $('.ssa-mjesto-odrzavanja').text(response.model.mjesto_odrzavanja);
            $('.ssa-kada-se-odrzava').text(getKadaSeOdrzava(response.model.datum_pocetka, response.model.datum_kraja));
            $('.ssa-broj-edicija').text(getBrojEdicija(response.brojEdicija));
            prikaziTreninge(response.treninzi);
            prikaziOrganizatore(response.organizatori, response.pozicije);
            prikaziPostignuca(response.postignuca);
        },
    });
});

function getDatum() {
    let danas = new Date();
    let mjesec = danas.getMonth() + 1;
    let dan = danas.getDate();

    let output = danas.getFullYear() + '-' +
        (mjesec < 10 ? '0' : '') + mjesec + '-' +
        (dan < 10 ? '0' : '') + dan;

    return output;
}


function getPreostaloVrijeme(datum) {
    let dateNow = new Date();
    let datumZatvaranja = new Date(datum);
    console.log(datumZatvaranja);
    console.log(dateNow);

    let seconds = Math.floor((datumZatvaranja - dateNow) / 1000);
    let minutes = Math.floor(seconds / 60);
    let hours = Math.floor(minutes / 60);
    let days = Math.floor(hours / 24);

    hours = hours - (days * 24);
    minutes = minutes - (days * 24 * 60) - (hours * 60);
    seconds = seconds - (days * 24 * 60 * 60) - (hours * 60 * 60) - (minutes * 60);

    hours = hours - 1;
    days = days + 1;

    let preostalo = days + "d : " + hours + "h : " + minutes + "min";

    if (days < 0) {
        document.getElementsByClassName("btn-prijava")[0].style.visibility = "hidden";
        return "";
    }
    document.getElementsByClassName("btn-prijava")[0].style.visibility = "visible";
    return preostalo;
}

function getDatumOdrzavanja(datumP, datumK) {
    let datumPocetka = new Date(datumP);
    let datumKraja = new Date(datumK);

    const monthNames = ["Januar", "Februar", "Mart", "April", "Maj", "Juni",
        "Juli", "August", "Septembar", "Oktobar", "Novembar", "Decembar"
    ];

    let datum = datumPocetka.getDate() + "." + "-" + datumKraja.getDate() + ". " + monthNames[datumKraja.getMonth()] + " " + datumKraja.getFullYear();
    return datum;
}

function koUcestvuje(broj) {
    let tekst = "Priliku za učešće na ovoj radionici ima " + broj + " ambicioznih studenata koji su se istakli svojom motivacijom za učešće, ali i u radu u nevladinim organizacijama.";
    return tekst;
}

function getRokZaPrijaveTekst(datum) {
    let datumZatvaranja = new Date(datum);
    let mjesec = datumZatvaranja.getMonth() + 1;
    let tekst = "Prijave traju do " + datumZatvaranja.getDate() + "." + mjesec + "." + datumZatvaranja.getFullYear() + ". godine";
    return tekst;
}

function getKadaSeOdrzava(datumP, datumK) {
    let datumPocetka = new Date(datumP);
    let datumKraja = new Date(datumK);

    const monthNames = ["Januar", "Februar", "Mart", "April", "Maj", "Juni",
        "Juli", "August", "Septembar", "Oktobar", "Novembar", "Decembar"
    ];

    let datum = "Od " + datumPocetka.getDate() + "." + " do " + datumKraja.getDate() + ". " + monthNames[datumKraja.getMonth()] + " " + datumKraja.getFullYear() + " godine";
    return datum;
}

function getBrojEdicija(broj) {
    if (broj % 100 != 11 && broj % 10 == 1)
        return "SSA iza sebe ima " + broj + " uspješnu ediciju, mnoštvo zadovoljnih participanata i veliki broj zadovoljnih saradnika.";

    else if (broj % 100 != 12 && broj % 100 != 13 && broj % 100 != 14 && (broj % 10 == 2 || broj % 10 == 3 || broj % 10 == 4))
        return "SSA iza sebe ima " + broj + " uspješne edicije, mnoštvo zadovoljnih participanata i veliki broj zadovoljnih saradnika.";

    else return "SSA iza sebe ima " + broj + " uspješnih edicija, mnoštvo zadovoljnih participanata i veliki broj zadovoljnih saradnika.";
}

function prikaziTreninge(treninzi) {

    const myNode = document.getElementsByClassName("treninzi-div")[0];
    myNode.innerHTML = '';

    treninzi.forEach(element => {
        let sadrzaj = "<div class='col  mb-4'><div class='card  h-100'>";
        sadrzaj += "<img src='img/d11.jpeg' class='card-img-top' alt='...'>";
        sadrzaj += "<div class='card-body'>";
        sadrzaj += "<h5 class='card-title'>" + element.naziv + "</h5>";
        sadrzaj += "<p class='card-text'>" + element.opis + "</p>";
        sadrzaj += "</div></div></div>";
        $('.treninzi-div').append(sadrzaj);
    });
}

function prikaziOrganizatore(organizatori, pozicije) {
    const myNode = document.getElementsByClassName("organizatori-div")[0];
    myNode.innerHTML = '';
    let i = 0;
    organizatori.forEach(element => {
        let sadrzaj = "<div class='col mb-4'><div class='card h-100'>";
        sadrzaj += "<img src='...' class='card-img-top' alt='...'>";
        sadrzaj += "<div class='card-body text-center'>";
        sadrzaj += "<h5 class='card-title card-text-organizatori'>" + element.ime + " " + element.prezime + "</h5>";
        sadrzaj += "<p class='card-text-organizatori-uloga'>" + pozicije[i].naziv + "</p>";
        sadrzaj += "<p class='card-text-organizatori'>" + element.mail + "</p>";
        sadrzaj += "<p class='card-text-organizatori'>" + element.telefon + "</p>";
        sadrzaj += "</div></div></div>";
        $('.organizatori-div').append(sadrzaj);
        i += 1;
    });
}

function prikaziPostignuca(postignuca) {
    const myNode = document.getElementsByClassName("postignuca-div")[0];
    myNode.innerHTML = '';

    postignuca.forEach(element => {
        let sadrzaj = "<div class='col-5 col-md-2 kolone'>";
        sadrzaj += "<div class='row justify-content-center kolone_red11'>" + element.broj + "</div>";
        sadrzaj += "<div class='row justify-content-center kolone_red2'>" + element.naziv + "</div>";
        sadrzaj += "</div>";
        $('.postignuca-div').append(sadrzaj);
    });
}