**Galerie fotek**

Jednoduchá galerie fotek vytvořená v Laravelu. Umožňuje přidávat, vyhledávat a mazat obrázky podle názvu.
![image](https://github.com/user-attachments/assets/ff272411-6af6-446d-be63-5324691fed8a)


**Instalace a spuštění**
Naklonujte si repozitář

```bash
git clone [https://github.com/tvuj-repozitar.git](https://github.com/Kapralc/albumos.git)
cd nazev-projektu
```
Nainstalujte závislosti

```bash
composer install
npm install && npm run dev
```
Nastavte .env soubor



```bash
cp .env.example .env
```

```bash
php artisan key:generate
```
Nastavte databázi (upravte .env a spusťte migrace)


```bash
php artisan migrate
```


a potom
```bash
php artisan serve
```
A teď už stačí otevřít http://127.í)ú.0.1:8000 a galerie je připravena k použití! 🎉

