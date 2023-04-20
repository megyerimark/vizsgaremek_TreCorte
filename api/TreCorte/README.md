

# Vizsgaremek
# Projekt neve :TreCorte
# Készítette : Megyeri Márk Máté 
# Verzió : 1.0.

# A projektről 

* Egy étteremláncnak a nyilvántartás készítése, mely biztosítja az étterem és
a vendégek számára a zökkenőmentes adminisztrációs munkákat.


# Felhasznált technológiák 

* Angular
* Laravel
* MYSQL szerver  

## A projekt kezdéséhez szükségünk lesz magára a projektre itt elérhető:
[TreCorte](https://github.com/megyerimark/vizsgaremek_TreCorte).  Itt elérhető! 

A projekt futtatásához szükség lesz a NodeJS-re, mivel használnunk kell az npm telepítőcsomagot.

* npm
```
https://nodejs.org/en/
```
```
npm install npm@latest -g
```

Szükségünk lesz egy git parancsra  , hogy le tudjuk klónozni vagy tölteni a .zip filet.
*git letöltése 
```
https://git-scm.com/downloads
```


# A projekt használatba vétele
 > Ha van total commandered akkor állj abba a mappába ahova szerenéd, hogy a projekt létrejöjjön.
 > Ha viszont nem rendelkezel  Total Commanderrel  akkor az alábbi linre kattintva letöltheted 
[Total Commander letöltése](https://www.ghisler.com/download.htm)

>> Ha sikeresen letöltöttük a total commandert, akkor bele navigáljuk magunkat a megfelelő helyre, majd klónozzuk le a projektet 
```
https://github.com/megyerimark/vizsgaremek_TreCorte
```
Telepítsük az npm függőségeket. 
```
npm install
```
>> Ha sikeresen leklónuztuk a projektet ügyeljünk arra, hogy a .env.example mellett legyen .env kiterjesztésű file is , mivel így fogod tudni elérni at adatbázisod.
> Ha megvan a .env file, akkor meghet a követkerő parancs:
```
composer install 
```
>>Ez a parancs telepíti a laravel alap funkcióit ami nélkül az egész projekt el sem fog indulni.

>>Szükségünk lesz egy XAMPP-ra mely letölthető az alábbi linkre kattintva .
[XAMPP letöltése](https://www.apachefriends.org/download.html)

>>Sikeres telepítés után indítsuk el a XAMPP-ot, majd belépve a projektbe kérünk egy új terminált.
```
CTRL + SHIFT + Ö 
```
>>A táblák migrálásához a következő parancsot adjuk ki.
```
php artisan migrate
```
>> Ha létezik már az adatbázis, de teljesen ki szeretnénk üríteni akkor a következő parancsra lehet szükségünk,
```
php artisan migrate:fresh

```
>>Sikeres migrálás után  eltudjuk indítani a szervert a következő parancs segítségével.
```
php artisan serv
```
>>A szerver sikeres elinduálsa után megnyitjuk az INSOMNIA nevezetű appot. erről részeletes  információ fejleszői  dokumentációban található . 

>INSOMNIA letöltése
```
https://insomnia.rest/download
```



## Roadmap/Tervezet

- [x] Projekt elnevezése
- [x] Weblap elkészítése
- [] Mobilos Applikáció elkészítése
  - [x] REST API kommunikáció az adatbázissal 
  - [ ] Autentikáció hozzáadása
  - [ ] Funkciók bővítése
 - [ ] Nyelvek hozzáadása 
    - [] Angol
    - [x] Magyar
   



