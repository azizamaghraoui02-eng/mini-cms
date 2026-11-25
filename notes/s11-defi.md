# Session 11 - Défi

/mes-articles ne montre que mes articles, brouillons compris : oui
Un visiteur qui ouvre /mes-articles arrive sur /connexion : oui
Le cookie remember_web_ apparaît quand la case est cochée : oui
Les deux nouveaux tests passent et php artisan test est vert : oui

Pourquoi partir de $request->user()->posts() plutôt que de Post::where('user_id', $request->user()->id) ?
Parce que la relation hasMany du modèle User est déjà filtrée sur user_id : elle donne exactement les articles de l'utilisateur connecté, sans répéter la clé étrangère à la main, et sans risque de faute ou d'oubli du where.

Pourquoi la case remember ne doit-elle pas être dans le tableau passé à Auth::attempt() ?
Ce tableau sert à chercher un utilisateur en comparant chaque clé à une colonne de la table users. "remember" n'est pas une colonne d'identifiant : c'est un comportement de session. Il se passe donc en deuxième argument (booléen), qui déclenche le cookie remember_web_.