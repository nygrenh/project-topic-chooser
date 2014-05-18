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

## Käynnistys- / käyttöohje

Sovelluksen esittelysivu: [http://hnygren.users.cs.helsinki.fi/tsoha/esittelysivu.html](http://hnygren.users.cs.helsinki.fi/tsoha/esittelysivu.html)
