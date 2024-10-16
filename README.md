## FlevoPlant

Installeren

```php
composer install
```

```php
npm run dev && php artisan serve
```

Migreren en Seeden van artikelen en batches in de database

```php
php artisan migrate
```

```php
php artisan db:seed ArticleSeeder
```

## Wat heb ik gebruikt
- Laravel
- TailwindCSS
- Breeze (Gebruikt zodat ik niet weer een hele layout zelf moest bouwen)

## Functionaliteiten
- Aanmaken/updaten/verwijderen
- Bij het verwijderen van een artikel worden ook de onderliggende batches verwijderdn.
- Bij het updaten van een artikel word van alle batches ook het juiste artikel nummer gewijzigd.
- 

  
  
