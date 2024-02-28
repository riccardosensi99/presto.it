HO ULTIMATO LA USER STORY 6, NON 4!

Comandi necessari per far funzionare il sito:
php artisan serve
npm run dev
php artisan queue:work (necessario per l'inizializzazione del Job per ridimensionare l'immagine)

php artisan migrate:refresh (per refreshare il database)


VERIFICARE SE E' POSSIBILE RADUNARE TUTTI GLI SNIPPET IN UN SINGOLO LAYOUT

presto:makeUserRevisor = Rendi un utente revisore

se modifichii il database fresha tutto

per tntsearch, da sparare sul terminale
php artisan scout:flush "App\Models\Announcement"
php artisan scout:import "App\Models\Announcement"
questi comandi servono a indicizzare gli annunci così si possono cercare anche quelli vecchi

extra:
guardare gsap

!!!!!!!!!!!!!!!!!!!
tradurre le categorie all'interno del dropdown della navbar