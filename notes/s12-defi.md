# Session 12 - Défi

1. Pourquoi role n'est-il pas dans #[Fillable], et comment votre contrôleur le modifie-t-il ?
Le contrôleur d'inscription ne passe que name, email et password à create() : un champ role ajouté à la main dans un formulaire serait donc ignoré. Hors de #[Fillable], role reste protégé même si un utilisateur envoie d'autres champs ($request->all(), par exemple) : c'est une protection contre l'assignation de masse. Le contrôleur du niveau 1 affecte lui-même l'attribut, à partir d'une valeur validée et après la vérification (403 si l'administrateur vise son propre compte), puis appelle save().

2. Pourquoi le callback de Gate::before doit-il renvoyer null, et non false, pour un non-administrateur ?
false est une réponse définitive : Laravel refuserait tout à un auteur, même la modification de ses propres articles. null veut dire « pas d'avis » : Laravel continue et demande au Gate ou à la méthode de la policy concernée.