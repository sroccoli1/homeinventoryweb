# Home Inventory Web - 2020 Lokikirja

**Nettisivun kehityksen matkan lokikirjani**

## Sisällysluettelo
- [Home Inventory Web project](https://github.com/sroccoli1/homeinventoryweb)
- [2020 Milestones](https://github.com/sroccoli1/homeinventoryweb/edit/master/2020_milestones.md)
- [2019 Milestones](https://github.com/sroccoli1/homeinventoryweb/edit/master/2019_milestones.md)
- [2020 Full Log](https://github.com/sroccoli1/homeinventoryweb/blob/master/2020_log_full.md)
- [2020 Weekly Log](https://github.com/sroccoli1/homeinventoryweb/blob/master/2020_log.md)

## Viikko 17 - 2020.5.4 

**Viikon edistys:** 
  - Ratkaisin tietokannan yhteyden ongelman Lubuntu 16:sta Win 10:n muutoksen jälkeen. Tajusin, että yhteyden muuttuja oli väärin
       
              $servername = "localhost:3308"; //Correct port used by MySQL on Win 10
  - Kirjoitin skriptin siinä tapauksessa, että tulee tietokannan ongelmien selvittämistä.
  - Keksin tietokannan hallinnoinnin käyttötapauksen. 
![DB Admin Use Case](https://github.com/sroccoli1/homeinventoryweb/blob/c9e8030ebff22532918b2787b1ff4864f6940c84/A04-DB-admin-uc-02.PNG)

**Ajatuksia:** Tuntuu, että oli rankka selvitysten viikko ja tuntui, että olin kykenemätön
pääsemään eteenpäin. Koska koko viikon tutkin, mitkä asiat aiheuttavat vian.
Onneksi viikonloppuna korjasin vian pois ja keksin koodin, joka voisi auttaa siinä tapauksessa, että
tulisi vika taas. Toisaalta, [**Struggle is a sign of progress**](https://twitter.com/js_tut/status/1241764474866012165) Taistelu on merkki edistymisestä, niin kuin
Javascript Teacher sanoi.

**Linkki tweetille:** [@SRoccoli Viikko 17](https://twitter.com/SRoccoli/status/1263352878770651136?s=20)

**Linkki teoksille:** 
- HomeInventoryWeb May 2, 2020 [Commit](https://github.com/sroccoli1/homeinventoryweb/commit/272ff0908963f6065edb6f94b122c1160a30435f)
- HomeInventoryWeb May 2, 2020 [Commit](https://github.com/sroccoli1/homeinventoryweb/commit/87ed033f4a6f6a9299a08a2488706b3736041b0b)

## Viikko 18 - 2020.5.9 

**Viikon edistys:** 
- Kuvasin sitä, miten Etsi Laatikko -sivu etsii ja näyttää laatikkoa, kaavio keskittyy nykyiseen AJAX arkkitehtuuriin. Kaavio näyttää yleiskuvaa sivusta Etsi Laatikko ja auttaa ymmärtämään, miten koodata Laatikko-olion näkymä.
![Design-Gui-Livesearch-01](https://github.com/sroccoli1/homeinventoryweb/blob/be50fe3406ac4f70a9d6d94f239c94d36363c485/design-gui-livesearch-01.PNG)
![Design-Gui-Livesearch-02](https://github.com/sroccoli1/homeinventoryweb/blob/assets/design-gui-livesearch-02.PNG)

- Aloitin Aloitin HTLM ja CSS puhdistamisen ja uudistamisen Etsi laatikko -sivulla.

**Ajatukset:** Mallinnuksen avulla näen helpommin, miten olen sen koodannut, mitä kohtaa saa tai ei
saa muokata, jotta saavuttaisin sivun ulkoasun mallin.

**Linkki Tweetille:** [@SRoccoli, Viikko 19](https://twitter.com/SRoccoli/status/1263373750101131264?s=20)

**Linkki teoksille:** [HomeInventoryWeb, 9.5.2020 Commit](https://github.com/sroccoli1/homeinventoryweb/commit/5f381a0fc37459b513f2fc48cc89708cd2f966b4)

## Viikko 19 - 2020.5.12 

**Viikon edistys:** 
- Etsi laatikko –sivulla jatkoin sivun muotoilua: nyt kun painaa laatikko-kuvakkeella voi näyttää tai piilottaa laatikko-näkymän. 
![Week 19 Gif](https://media.giphy.com/media/JsQHjIe6Sn4g2Lgr2b/giphy.gif)

- Etsi laatikko –sivulla viikonloppuna aloitin PHP ja JS koodin uudistamisen.

  - Tilanne: Palvelin formatoi vähän dataa tauluksi ja lähettää sen selaimelle. Mutta sitten selaimella tarvitaan edelleen formatoimista ja enemmän dataa palvelimesta, eli enemmän AJAX-pyyntöä ja muita vaikeita koodauksen lauseita.  

  - Toivo: Olisi yksinkertaisempaa, että, palvelin lähettäisi tarpeellista raakaa dataa selaimeen, joka formatoisi sen tauluksi ja edelleen.  
 
  - Tavoite: Tavoitteena on muokata palvelimen PHP koodausta, jotta se lähettää välttämätöntä raakaa JSON-dataa, ja selaimen kohdalla lisätä JS koodaus, jotta se formatoisi tauluksi JSON datan serveriltä. 

**Ajatukset:** Aika hämmentävää, että ei voi tietää etukäteen JSON-datan muotoa. Pitää koko ajan tarkistaa, mitä datan muotoa koodi vaatii (mm. taulukko, olio, string) kun käytetään JS DOM ja menelmää, `JSON.parse()` esim. ja omia funktioita. Ainakin nämä verkkosivustot auttavat [developer.mozilla.org](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference) ja [W3Schools.com](https://www.w3schools.com/jsref/default.asp). 

**Linkki Tweetille:** [@SRoccoli](https://twitter.com/SRoccoli/status/1267337341384847361?s=09) 

**Linkki teoksille:** 
- [Commit 2020.05.12](https://github.com/sroccoli1/homeinventoryweb/commit/ac8df4b428c61e2932fe8a7a68c9564e47b143ec)
- [Commit 2020.05.11](https://github.com/sroccoli1/homeinventoryweb/commit/e2d0beeeffcbb5c7ad286ecd301ef85371c1208f)

## Viikko 20 - 2020.5.16   

**Viikon edistys** 
- Onnistuin muuttaa PHP ja JS koodia, nyt PHP lähettää vain JSON-dataa tietokannalta verkkoselaimelle ja JS formatoi taulukoksi, olen saavuttanut viime viikon asetetun tavoitteen. 
- Olen aloittanut tehdä sivu reagoivaksi. Nyt olion taulukko on reagoiva JS ja CSS -avulla.  
![Week 20 Gif](https://media.giphy.com/media/YpeCk5jn3WGMEUdMcQ/giphy.gif) 

Asettelutavoite on näin:
![design-gui-livesearch-04.PNG](https://github.com/sroccoli1/homeinventoryweb/blob/assets/design-gui-livesearch-04.PNG). 

- Kirjoitin ja lähetin hakemuksen H2C:n koulutukseen [H2C.fi](https://h2c.fi/)

**Ajatukset:** Tuntuu hyvältä, että olen tajunnut, miten käsitellään JSON-dataa JavaScriptin avulla, ja että nyt pääsen muokkaamaan sivun ulkoasua... 

**Linkki Tweetille**: [@SRoccoli](https://twitter.com/SRoccoli/status/1271320828055924742?s=20)

**Linkki töille:** [Commit 20200517](https://github.com/sroccoli1/homeinventoryweb/commit/52355dab706680d042197f5cfa76184665851acc)

## Viikko 21 - 2020.5.24 

**Viikon edistys**
- Olen etsinyt web-kehityksen sanastoa suomenkielisiltä nettisivuilta ja olen kirjoittanut loppuun kertomukset viikosta. 
- Olen päivittänyt Home Inventory Webin tiedoston rakenteen. 
- Olen etsinyt parempaa muotoa / rakennetta Home Inventory Webin päiväkirjalle Githubissa ja muuttanut sen. 
- Esti laatikko -sivulla olen jatkanut Laatikko-olion näkymän tyylin muotoilua, muokannut fontin tyyliä ja valia. 

![Week 21 Gif](https://media.giphy.com/media/PkS9eV0dtaCp2JayLa/giphy.gif) 

**Ajatukset:** Komentokehotteesta. Haluaisin käyttää vain komentokehotteessa Git-komentoja jotta päivittäisin tiedoston rakenteen. Mutta ei se onnistunut. Miksi piti tuhlata tunti, että löysin cmd.exe:n komennon, joka siirtää kaikki tiedostot ylempään kansioon? Muistan, että DEV communityssä, joku sanoi, että *huono koodari sanoo, että hän tietää. Mutta hyvää koodari sanoo, että hän ei tietää mitään.* 

**Linkki Tweetille:** [@SRoccoli](https://twitter.com/SRoccoli/status/1271324433186091011?s=20)

**Linkki töille:** [Commit 20200525](https://github.com/sroccoli1/homeinventoryweb/commit/81691cb9815e2d06fccb08c1d5474cbdbbd4ef17)

## Sisällysluettelo
- [Home Inventory Web project](https://github.com/sroccoli1/homeinventoryweb)
- [2020 Milestones](https://github.com/sroccoli1/homeinventoryweb/edit/master/2020_milestones.md)
- [2019 Milestones](https://github.com/sroccoli1/homeinventoryweb/edit/master/2019_milestones.md)
- [2020 Full Log](https://github.com/sroccoli1/homeinventoryweb/blob/master/2020_log_full.md)
- [2020 Weekly Log](https://github.com/sroccoli1/homeinventoryweb/blob/master/2020_log.md)
