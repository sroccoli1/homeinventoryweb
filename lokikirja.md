# Home Inventory Web - 2020 Lokikirja

**Nettisivun kehityksen matkan lokikirjani**

## Sisällysluettelo
- [Home Inventory Web project](https://github.com/sroccoli1/homeinventoryweb)
- [2020 Milestones](https://github.com/sroccoli1/homeinventoryweb/edit/master/2020_milestones.md)
- [2019 Milestones](https://github.com/sroccoli1/homeinventoryweb/edit/master/2019_milestones.md)
- [2020 Full Log](https://github.com/sroccoli1/homeinventoryweb/blob/master/2020_log_full.md)
- [2020 Log](https://github.com/sroccoli1/homeinventoryweb/blob/master/2020_log.md)

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
- Etsi laatikko –sivulla viikonloppuna aloitin PHP ja JS koodin uudistamisen. Tavoitteena on muokata palvelimen PHP koodi, jotta se lähettää välttämätöntä raakaa JSON dataa, lisätä JS koodaus, jotta se formatoisi JSON datan serveriltä tauluksi. 

- Tilanne: Palvelin formatoi vähän dataa tauluksi ja lähettää sen selaimelle. Mutta sitten selaimella tarvitaan edelleen formatoimista ja enemmän dataa palvelimesta ja vaikeita koodauksen lauseita.  

- Toivo: Olisi yksinkertaisempaa, että, palvelin lähettäisi tarpeellista raakaa dataa selaimeen, joka formatoisi sen tauluksi ja edelleen.  

- Tavoite: Tavoitteena on muokata palvelimen PHP koodausta, jotta se lähettää välttämätöntä raakaa JSON dataa, ja selaimen kohdalla lisätä JS koodaus, jotta se formatoisi tauluksi JSON datan serveriltä. 

**Ajatukset:** Ei voi tietää etukäteen JSON-datan muotoa, aika hämmentävää. Pitää koko ajan tarkistaa, mitä datan muotoa koodi vaatii (mm. taulukko, olio, string) kun käytetään JS DOM ja menelmää, JSON.parse() esim. ja omia funktioita. Ainakin nämä verkkosivustot auttavat [developer.mozilla.org](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference) ja [W3Schools.com](https://www.w3schools.com/jsref/default.asp). 

**Linkki Tweetille:** 

**Linkki teoksille:** 
- [Commit 2020.05.12](https://github.com/sroccoli1/homeinventoryweb/commit/ac8df4b428c61e2932fe8a7a68c9564e47b143ec)
