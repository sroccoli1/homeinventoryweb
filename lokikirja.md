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

**Linkki tweetille:** [@SRoccoli Week 17](https://twitter.com/SRoccoli/status/1259842830421327874?s=20)

**Linkki teoksille:** 
- HomeInventoryWeb May 2, 2020 [Commit](https://github.com/sroccoli1/homeinventoryweb/commit/272ff0908963f6065edb6f94b122c1160a30435f)
- HomeInventoryWeb May 2, 2020 [Commit](https://github.com/sroccoli1/homeinventoryweb/commit/87ed033f4a6f6a9299a08a2488706b3736041b0b)

## Viikko 18 - 2020.5.9 

**Viikon edistys:** 
- Kuvasin sitä, miten Etsi Laatikko -sivu etsii ja näyttää laatikkoa, kaavio keskittyy nykyiseen
AJAX arkkitehtuuriin. Kaavio näyttää yleiskuvaa sivusta Etsi Laatikko ja auttaa ymmärtämään, miten koodata Laatikko-olion näkymä.
- Aloitin Aloitin HTLM ja CSS puhdistamisen ja uudistamisen Etsi laatikko -sivulla.

**Ajatukset:** Mallinnuksen avulla näen helpommin, miten olen sen koodannut, mitä kohtaa saa tai ei
saa muokata, jotta saavuttaisin sivun ulkoasun mallin.

**Linkki Tweetille:**

**Linkki teoksille:** [HomeInventoryWeb, 9.5.2020 Commit](https://github.com/sroccoli1/homeinventoryweb/commit/5f381a0fc37459b513f2fc48cc89708cd2f966b4)

