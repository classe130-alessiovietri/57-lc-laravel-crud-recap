La mia entità è "prodotto"

Devo creare:
1. database -> come mi pare
    -> SUBITO DOPO -> collego nel file .env
    -> se voglio testare il collegamento, eseguo il comando php artisan migrate (perché delle migration ce le ho già)
--- ESEGUENDO IL COMANDO php artisan make:model Product -msr FACCIO IN UN SOL COLPO ----
2. migration -> create_products_table
    -> SUBITO DOPO -> definiamo la struttura della tabella
    -> poi, php artisan migrate
3. model -> Product
    -> SE voglio sfruttare il mass assignment, posso anche già riempire $fillable
4. seeder -> ProductSeeder / ProductsTableSeeder
    -> SE voglio semplificare l'esecuzione del mio seeder, lo inserisco con $this->call() in DatabaseSeeder
5. controller -> ProductController
----------------------------------------------------------------------------------------
5. view (4) -> products/index/show/create/edit.blade.php
5. route (7) -> products.index/show/create/store/edit/update/destroy
