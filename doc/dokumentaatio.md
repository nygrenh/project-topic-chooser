# Tietokantasovellus - dokumentaatio

## Johdanto

Työn on tarkoitus toimia harjoitustyön aiheen valintaa helpoittavana työkaluna. Sivulla listataan harjoitustyön aiheita. Sivulla näytetään kuinka monta kertaa työ on tehty, kuinka paljon siihen on kulunut aikaa ja mikä arvosana työstä on annettu. Sovelluksessa on mahdollista hallita töiden aiheita ja suoritustietoja.

Ajattelin kirjoittaa softan PHP:llä ja laittaa sen laitoksen users-palvelimelle. Tietokantana käytän PostgreSQL:ää. En aio tukea muita kantoja.

En ajatellut kirjoittaa javascriptiä tai mitään muuta erikoista sovelluksessa, eli käyttäjän selaimen ei tarvitse tukea mitään erikoista.

## Yleiskuva järjestelmästä

### Käyttötapauskaavio

\ ![Käyttötapauskaavio käyttäjä](use_case_diagram_user.png)

\ ![Käyttötapauskaavio opettaja](use_case_diagram_teacher.png)

\ ![Käyttötapauskaavio ylläpito](use_case_diagram_administration.png)

### Käyttäjäryhmät

* Opiskelija: Henkilö, joka etsii harjoitustyönsä aihetta. Järjestelmä olettaa, että kaikki kirjautumattomat käyttäjät ovat opiskelijoita.
* Opettaja: Sisään kirjautunut käyttäjä, joka hallinnoi aiheita ja suoritustietoja.
* Ylläpitäjä: Etuoikeutettu käyttäjä, joka voi hallinnoi muiden tietoja.

### Käyttötapaukset

#### Opiskelija

* Selaa töitä: Käy läpi töiden listaa.
* Hae töitä: Suodattaa töitä luokittelutekijöiden mukaisesti
* Katso työn tietoja: Näyttää kuinka paljon yksittäinen työ on keskimäärin kestänyt, mikä on työn keskimääräinen arvosana ja keskeytysten lukumäärä.

#### Opettaja

* Lisää uusi työaihe: Lisätä uusi aihe opiskelijoille valittavaksi.
* Muokkaa työaihetta: Muokata töaiheen tietoja.
* Poista työaihe: Poista työaihe.
* Kirjaa suoritustieto: Kirjaa opiskelijan suorituksen tiedot.
* Muokkaa suoritustietoa: Muuta suoritusta.
* Poista suoritustieto: Poista suoritus.
* Katso työn yksityiskohtaiset tiedot: Näyttää samat tiedot kuin opiskelijalle, mutta yksityiskohtaisemmin.
* Kirjaudu sisään
* Kirjaudu ulos
* Katso yhteenveto töiden käytöstä: Näyttää hienoja tilastoja kaikista töistä

#### Ylläpitäjä

* Muokkaa käyttäjätunnusten tietoja: hallinnoi ja luo käyttäjätunnuksia.
* Kirjaudu sisään
* Kirjaudu ulos

## Järjestelmän tietosisältö

### Käsitekaavio

\ ![Käsitekaavio](kasitediagram.png)

### Tietokohteet

* Account

|Attribuutti|Arvojoukko|Kuvaus|
|-----------|----------|------|
| Name | Merkkijono, max 20 merkkiä | Tunnuksen nimi |
| Admin | boolean | Onko tunnus ylläpitäjä |
| Password | Merkkijono, max 20 merkkiä | Tunnuksen salasana |

Tunnuksella voi olla useita kursseja.

* Course

|Attribuutti|Arvojoukko|Kuvaus|
|-----------|----------|------|
| Name | Merkkijono, max 20 merkkiä | Kurssin nimi |

Kurssi voi kuulua useammalle tunnuksella ja kursilla voi olla useita aiheita.

* Topic

|Attribuutti|Arvojoukko|Kuvaus|
|-----------|----------|------|
| Name | Merkkijono, max 20 merkkiä | Aiheen nimi |
| Course id | Kokonaisluku | Kurssin id, mihin aihe kuuluu |
| Summary | Merkkijono, max 20 merkkiä | Tiivistelmä aiheesta |
| Description | Merkkijono, max 1000 merkkiä | Aiheen kuvaus |

Aihe kuuluu yhteen kurssiin ja sillä on useita projekteja.

* Project

|Attribuutti|Arvojoukko|Kuvaus|
|-----------|----------|------|
| Topic id | integer | Aiheen id, mihin projekti kuuluu |
| Student | Merkkijono, max 20 merkkiä | Projektin tehneen oppilaan nimi |
| Hours | Kokonaisluku| Kuinka monta tuntia projektiin on käytetty |
| Työstä annettu arvosana | Kokonaisluku, 1-5 | Työstä saatu arvosana |

Projekti on yksi aiheen suoritus. Se kuuluu yhteen aiheeseen.

## Relaatiotietokantakaavio

\ ![Relaatiotietokantakaavio](relational_database_design_diagram.jpg)

## Järjestelmän yleisrakenne

Sovellus perustuu MVC-malliin. Kontrollerit sijaitsevat projektin juuressa.
Näkumät sijaitsevat kansiossa views. Mallit sijaitsevat kansiossa lib/models. Muut apukirjastot ovat kansiossa lib.

Kaikki tiedostonimet ovat kirjoitettu pienellä. Nimistä on yritetty saada mahdollisimman selkeitä. Tiedoston nimessä on tietokohteen nimi ja mahdollisesti etuliite (new, edit, update, destroy). Tästä poikkeuksena index.php, joka näyttää listauksen kursseista.

Sovellus käyttää istuntoa kirjautumiseen ja viestien muistamiseen. Viestit asetetaan tiedostosta lib/common.php löytyvillä metodeilla setError() ja setNotice().

## Käyttöliittymä

\ ![Sivukartta](sivukartta.png)

## Asennustiedot

Asenna sovellus kopioimalla sen tiedostot johonkin sellaiseen kansioon, mistä PHP:tä ymmärtävä palvelimesi löytää sen (esim. /var/www). Varmista,  että palvelinohjelmistollasi on tarvittavat oikeudet tiedostoihin. Koska sovellus käyttää PostgreSQL:ää, tietokannan asetuksia ei tarvitse määritellä erikseen.

## Käynnistys- / käyttöohje

Sovelluksen osoite: [http://hnygren.users.cs.helsinki.fi/tsoha/](http://hnygren.users.cs.helsinki.fi/tsoha/)

Sovelluksen esittelysivu: [http://hnygren.users.cs.helsinki.fi/tsoha/esittelysivu.html](http://hnygren.users.cs.helsinki.fi/tsoha/esittelysivu.html)

### Tunnukset kirjautumista varten

#### Järjestelmänvalvoja

* nimi: smith
* salasana: password

#### Opettaja

* nimi: johnson
* salasana: gary
