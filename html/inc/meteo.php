
<h3>Météo</h3>
<ul class="listeInfo"></ul>
<p class="listeInfo"></p>

        <script>
// URL API AJAX
var urlApiAjax = 'http://api.openweathermap.org/data/2.5/weather?lat=43.3&lon=5.4&units=metric&appid=ee3abf652133c6c47b5daef91a31b166';
// https://developer.mozilla.org/fr/docs/Web/API/Fetch_API/Using_Fetch
fetch(urlApiAjax)
.then(function(data){
    // DEBUG
    console.log(data);
    // ON VEUT RECEVOIR UN OBJET JAVASCRIPT
    return data.json();
})
.then(function(objetJS){
    console.log(objetJS);
    // CA Y'EST J'AI UN OBJET JS AVEC TOUTES INFOS PLANQUEES DEDANS...
    // IL FAUT ALLER RECUPERER LES INFOS QUI NOUS INTERESSENT
    // objet.propriete OU objet["propriete"]
    // BOUCLE POUR PARCOURIR LES INFOS UNE PAR UNE
    var city = objetJS.name
    var weatherCondition = objetJS.weather.mean;
    var tempMax = objetJS.main.temp_max;
    var tempMin = objetJS.main.temp_min;
    var windSpeed = objetJS.wind.speed;
    var tableauWeather = objetJS['weather'];
    for(var index=0; index < tableauWeather.length; index++) {
        var infoWeather = tableauWeather[index];
        console.log(objetJS);
        var icon = infoWeather.icon;

        var baliseUl = document.querySelector("ul.listeInfo");
        // DOM Document Object Model
        // AJOUTER UNE BALISE li
        var codeHtmlLi =  '<li>'
                            + '<h4>' + city + '</h4>'
                          + '</li>' +
                          '<li>'
                            + '<img src="https://openweathermap.org/img/w/'+ icon + '.png">'
                          + '</li>' +
                          '<li>'
                            + '<h4>' + 'max :' + ' ' + tempMax + '°C' + '</h4>'
                          + '</li>' +
                          '<li>'
                            + '<h4>' + 'min :' + ' ' + tempMin + '°C' + '</h4>'
                          + '</li>' +
                          '<li>'
                            + '<h4>' + ' vent : '+ (windSpeed * 3.6) + ' ' + 'km/h' + '</h4>'
                          + '</li>' ;

// AJOUTER NOTRE CODE POUR LA BALISE li DANS LA BALISE ul
        baliseUl.innerHTML += codeHtmlLi;

    }

})
        </script>