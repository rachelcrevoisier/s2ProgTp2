/**
TABLES Articles - SESSION 2 - TP2
**/
CREATE TABLE s2tp2_articles(
    id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(150) NOT NULL,
    date date NOT NULL,
    texte VARCHAR(7000),
    visuel VARCHAR(30),
    idJournaliste SMALLINT UNSIGNED NOT NULL,
    FOREIGN KEY(idJournaliste) REFERENCES s2tp2_journalistes(id)
);
CREATE TABLE s2tp2_journalistes(
    id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    identifiant VARCHAR(50) NOT NULL,
    motDePasse VARCHAR(50) NOT NULL
);
CREATE TABLE s2tp2_rubriques(
    rubrique VARCHAR(20) UNSIGNED PRIMARY KEY
);

ALTER TABLE s2tp2_articles
    ADD rubrique VARCHAR(20)
;
ALTER TABLE s2tp2_articles
  ADD CONSTRAINT s2tp2_articles FOREIGN KEY (rubrique) REFERENCES s2tp2_rubriques (rubrique);

UPDATE s2tp2_articles SET rubrique = 'litterature' WHERE id = 1;
UPDATE s2tp2_articles SET rubrique = 'litterature' WHERE id = 2;
UPDATE s2tp2_articles SET rubrique = 'litterature' WHERE id = 3;
UPDATE s2tp2_articles SET rubrique = 'litterature' WHERE id = 4;
UPDATE s2tp2_articles SET rubrique = 'litterature' WHERE id = 5;
UPDATE s2tp2_articles SET rubrique = 'sport' WHERE id = 6;
UPDATE s2tp2_articles SET rubrique = 'techno' WHERE id = 7;
UPDATE s2tp2_articles SET rubrique = 'techno' WHERE id = 8;
UPDATE s2tp2_articles SET rubrique = 'litterature' WHERE id = 9;
UPDATE s2tp2_articles SET rubrique = 'monde' WHERE id = 14;
UPDATE s2tp2_articles SET rubrique = 'litterature' WHERE id = 16;
UPDATE s2tp2_articles SET rubrique = 'musique' WHERE id = 17;
UPDATE s2tp2_articles SET rubrique = 'musique' WHERE id = 18;
UPDATE s2tp2_articles SET rubrique = 'cinema' WHERE id = 45;
UPDATE s2tp2_articles SET rubrique = 'sport' WHERE id = 46;
UPDATE s2tp2_articles SET rubrique = 'musique' WHERE id = 47;
UPDATE s2tp2_articles SET rubrique = 'ecologie' WHERE id = 50;

--Insertion rubriques
INSERT INTO s2tp2_rubriques VALUES("sport"), ("economie"),("litterature"),("musique"),("monde"),("techno"),("cinema"),("ecologie");

--Insertion journalistes
INSERT INTO s2tp2_journalistes VALUES(NULL, "ValRoux", "pa110747?"), (NULL, "DavMouc", "Cjmtqmedec842"),(NULL, "PierreAnto", "Pierredierx3"),(NULL, "RhlCre", "Addclvtnepv3114");


--Insertion articles
INSERT INTO s2tp2_articles VALUES(NULL, "Épisode 1/5 : Protéger les éléphants", "2022-04-05", "Romain Gary évoque les conditions d’écriture et les enjeux de son roman 'Les racines du ciel', prix Goncourt 1956. L’occasion pour l'écrivain de soulever la question écologique, notion quasiment inconnue au moment de la parution de l’ouvrage.
Au début de cet entretien, Patrice Galbeau et Romain Gary reviennent sur le succès du roman Les racines du ciel, traduit dans de nombreuses langues et véritable best-seller lors de sa publication. Un livre complexe et conçu dans la douleur, selon son auteur, l’un des premiers à évoquer la défense de la nature, sur la sauvegarde des éléphants.
Quand j'ai écrit 'Les racines du ciel', c'est de tous les livres celui qui m'a causé le plus de mal, non pas dans sa conception, mais pour des raisons matérielles. C’est que j'étais à cette époque-là à New York, porte-parole de la délégation française à l'ONU, à la télévision et à la radio. J'étais horriblement occupé. J'étais jeune et curieux. Pas encore arrivé, comme on dit, si tant est qu'on arrive jamais.
'La France, un éléphant qui devient une marmotte'
Avec Romain Gary, l’éléphant se fait à la fois représentant de l’extinction animale, symbole des interrogations humaines, figure des problématiques sociales, et métaphore de la puissance étatique. Malgré le succès du livre, il déplore qu’à sa publication le message véhiculé n’ait pas eu la portée espérée. Personne n’ayant compris l’urgence de défendre l’environnement humain. L’écrivain porte un regard visionnaire sur cette situation préoccupante alors exclue des grandes priorités françaises. Il dénonce le manque de réactivité et de considération d’un Etat comme le nôtre vis-à-vis de l’impératif écologique, et y voit l’origine de la perte de son statut de grande puissance. 
Nous allons à l'extinction. C'est une chose qui a été scientifiquement prouvée, c'est une chose qui a été publiée et c'est une chose qui est connue. Mais la France n'a pas élevé la voix. (…) La France est, pour moi, en premier lieu, d’un point de vue historique en Europe, un éléphant qui est en train de subir une étrange mutation sociologique, par laquelle il tend vraiment à devenir une marmotte.
L’Afrique face à la protection de son environnement 
Les racines du ciel permet également à son auteur de s’attarder sur les rapports entretenus en Afrique avec l’écologie, la protection de la faune et de la flore. Par-delà les problèmes liés au braconnage, au trafic d’ivoire mais aussi à l’épineuse question de la chasse pour la consommation de viande, Romain Gary rappelle que les pays africains encouragent une véritable éducation à la protection de la nature. Comme pour sauvegarder une part de leur héritage national. 
J'ai beaucoup d'admiration pour ce qu'ils font dans ce domaine. Vous le voyez par exemple en Tanzanie, des bus dans la jungle avec des enfants sur lesquels est marqué 'Education des enfants sur la protection de la vie sauvage'. Les autobus marqués de ce nom trimballent les gosses des écoles à travers la jungle, pour leur apprendre à aimer leur environnement animal. C'est quand même extraordinaire, admirable, c'est spontané chez eux. Pour écouter le podcast : https://www.radiofrance.fr/franceculture/podcasts/a-voix-nue/proteger-les-elephants-6143489","2022-04-05-romain-gary.jpg", 1),(NULL, "Épisode 2/5 : L'écrivain visionnaire", "2022-06-05", "Romain Gary évoque le caractère, selon lui irréversible, du processus de destruction de notre planète, tandis que la conversation se poursuit autour de son roman 'Les Racines du ciel' qui traite de la protection de la nature, des éléphants, et plus généralement des espèces animales et humaines.
Dans ce deuxième entretien, Romain Gary revient sur le personnage principal de son roman, Morel, qui se voue entièrement à la sauvegarde des éléphants. Drôle de coïncidence, à l’époque de l’écriture du livre, un homme, Raphaël Mata, agit en Afrique pour la même cause. L’auteur ne manque pas de souligner que cette anecdote est représentative d’un certain nombre de choses, curieuses, qui entourent la conception des Racines du ciel. Car ni le protagoniste de l’œuvre, ni Raphaël Mata, n’ont été inspirés l’un par l’autre. L’occasion d’y voir, là encore, le regard visionnaire de Gary.
Raphaël Mata m'a écrit des lettres qui étaient tellement dans le cadre des 'Racines du ciel', que j'ai cru à un canular. J'ai cru qu'un de mes anciens copains, qui était resté en Afrique après la guerre, me faisait marcher parce que c'était trop beau pour être vrai. Et puis, un beau jour, j'ouvre le journal. Je lis que Raphaël Mata a été tué par les tribus, parce qu'il défendait les éléphants contre les chasseurs de cette tribu.
Les grands écrivains auraient-ils le 'don de voyance' ?  
Si Les Racines du ciel a pour vocation de tirer la sonnette d’alarme écologique, ce roman n'en est pas moins le plus optimiste de Gary. Au mitan des années 1950, il l’écrit pour dénoncer l’absurdité et les monstruosités des comportements humains à l’égard des milieux naturels. Il l’écrit car il pense encore pouvoir mettre en garde sur la destruction de notre environnement. Près de vingt ans plus tard, Romain Gary déplore le manque d’attention qui a été prêté à son message. Il ne croit plus pouvoir concevoir d’œuvre similaire, car pour lui, il est trop tard. Et c’est inquiet qu’il envisage cette fin de XXe siècle. 
L'extermination des baleines est une monstruosité. C'est dégueulasse, c'est absolument dégueulasse. Le massacre de bébés phoques aussi.. Quelqu'un qui a regardé dans les yeux un bébé phoque au moment où il est tué, à mon avis, s'il n'est pas traumatisé pour la vie, c'est un candidat pour les SS. L'extermination des espèces, à l'heure actuelle, est une preuve irréfutable de la condamnation de l'humanité à la disparition, par son propre fait.
'L’humanité est devenue un cancer qui se dévore lui-même'
L’écrivain revient sur les raisons pour lesquelles il devient de plus en plus pessimiste en regard des désordres du monde. Issu d’une génération née durant la Première Guerre mondiale, engagé au cours la Seconde, diplomate au moment de la constitution du bloc soviétique, Romain Gary fait le constat d’une époque marquée par les aberrations politiques, auxquelles s’ajoutent l’explosion démographique et la catastrophe écologique. L’humanité souffrirait d’un empoisonnement idéologique et environnemental, dont elle serait à la fois coupable et victime. 
Les atrocités et la violence banalisées qui imprègnent nos sociétés nous engageraient, selon le romancier, dans un processus irréversible. Par la protection de la nature, Romain Gary tend aussi à défendre une “certaine idée de l’homme”. Car pour lui, sans 'réévaluation de la vie humaine', il n’y a pas d’espoir. 
Tant qu'il n'y aura pas une protection de l'humanité et une protection de la nature par une révolutionnaire méthode du contrôle des naissances, nous allons vers le sang, vers l'ordure, de manière irréversible. C'est mon opinion. Elle n'a rien d'optimiste, mais je ne suis pas politicien. Mon rôle ne consiste pas à bercer les peuples de douces illusions et de les tromper sur leur avenir. Pour écouter le podcast : https://www.radiofrance.fr/franceculture/podcasts/a-voix-nue/l-ecrivain-visionnaire-1079821","2022-06-05-romain-gary.jpg", 2), (NULL, "Épisode 3/5 : Fabriquer un roman", "2022-08-05", "Toujours sur 'Les Racines du Ciel', la conversation se poursuit autour de l'invention de deux personnages, le père Fargue et Minna, l’entraîneuse allemande. Malgré les similitudes avec des personnalités qui l’auraient inspiré, le romancier rappelle combien il a tout inventé.
Dans ce troisième entretien, il est toujours question des Racines du ciel. Romain Gary qui a vécu au Yémen, explique que c’est de l’islam, dont il loue les aspects poétiques et littéraires, que lui serait venue l’idée de ce bel intitulé. 
Je suis très attiré par l'islam. Je m'empresse de vous dire que, n'étant pas de tempérament religieux, je suis intéressé par l'islam d'une manière qui déplairait énormément aux fidèles de l'islam. (…) Il est certain que, ayant vécu dans l'Afrique musulmane, dans les pays arabes et y revenant régulièrement je suis frappé par le rapport qu'ils ont avec l'infini, avec le ciel, dans leur méditation.
Le père Fargue
Après Morel, parmi les principaux personnages du roman, on trouve le père Fargue, haut en couleurs. Il serait, selon les dires de l’écrivain, entièrement inventé. Mais s’il ne s’est servi d’aucun modèle, Gary nuance toutefois, car une anecdote attribuée à ce personnage lui serait véritablement arrivée. 
Sur le pont d’un bateau, quand j’étais jeune officier, il y avait une jeune femme qui se prêtait volontiers à charmer notre solitude, à nous tenir compagnie, et ce, sans trop de discrimination pour ne rien vous cacher. Disons-le, tout le monde parmi nous, tout le monde avait couché avec elle. Son mari était civil. Et arrive l'aumônier, qui évidemment, n'était pas le père Fargue. Et à l'époque, l'expression militaire qui est passée de mode, en argot, était : “Bonjour cocu, tu vas bien cocu ?”  Nous étions assis comme ça, en rond, il y avait Madame X et son mari, et nous tous. Alors, il va là et dit : ”Bonjour cocu, bonjour cocu, bonjour cocu, bonjour cocu, bonjour cocu. Bon... Bonjour Monsieur Durand. Bonjour cocu, bonjour cocu...” Il a voulu faire preuve de tact ! Et là, je raconte cette histoire des 'Racines du ciel' qui est la seule histoire véritablement vraie.
Sous le ciel Tchadien 
Le lieu de l’action a aussi été choisi avec soin par le romancier. Le Tchad, qui sert de cadre aux Racines du Ciel, est un pays que Romain Gary “connaît remarquablement bien”, et qui, par l’immensité du ciel qui y est donné à voir, traduisait le mieux le titre du roman. 
II y a une telle présence du ciel, comme une absence de quelqu'un, que cela me paraissait exprimer très clairement le titre même du livre, 'Les Racines du ciel'. Vous sentez, au Tchad, une immense présence de l'horizon et du ciel. Une extraordinaire petitesse de la Terre.
Minna, allemande par fraternité
Minna, l’entraîneuse du café le Tchadien fait également partie des personnages remarquables des Racines du ciel. Dépeinte comme positive et fraternelle, Romain Gary l'a faite allemande, ce qui a son importance, dix ans après la fin de la Seconde Guerre mondiale, dans un livre conçu comme un appel à la sympathie humaine. 
Je l'avais choisie allemande pour plusieurs raisons, étant donné que mon roman constituait tout de même un très grand appel à la sympathie humaine, à la solidarité, à la fraternité, à la générosité. Comme on sortait quand même de la guerre, il m'a paru important de franchir l'abîme. (…) Également, j'ai voulu prendre une victime de l'horreur de Berlin. Berlin a subi un destin atroce. La jeunesse, les jeunes femmes, les jeunes filles, qui n’y étaient pour rien dans de ce qui précédait, dans le nazisme, avaient subi un destin atroce. Pour écouter le podcast : https://www.radiofrance.fr/franceculture/podcasts/a-voix-nue/fabriquer-un-roman-7253047","2022-08-05-romain-gary.jpg", 3),(NULL, "Épisode 4/5 : L'enfant de sa mère", "2022-10-05", "Romain Gary parle de sa mère, figure centrale du roman autobiographique 'La Promesse de l’aube'. Au micro de Patrice Galbeau, il évoque ses rapports avec elle et son enfance à Nice.
Malgré sa naissance en Pologne, ses origines russes, ses voyages diplomatiques, son histoire d’amour américaine et sa vie parisienne, Romain Gary refuse de se définir comme un citoyen du monde. Cette expression, explique-t-il à Patrice Galbeau, autant que la notion de cosmopolitisme, ne trouve guère de résonnance à ses oreilles. Et quand bien même il aurait parcouru le monde entier, il ne se sent chez lui qu’à Nice, ville qui l'a vu grandir. 
J’ai été élevé à Nice, mes premières amitiés se sont faites à Nice, la première fille que j'ai aimée était à Nice. C’est à Nice que je me sens toujours mieux. Je suis très méditerranéen.
Publicité
Mina Kacew, mère “légendaire”
A Nice, sa mère élève seule Romain Gary. Cette histoire d’amour maternelle est le cœur même du roman La Promesse de l’aube qui dépeint un personnage extraordinaire, visionnaire, animé par le dessein qu’elle envisage pour son fils, qui doit “devenir un homme”. Le choix de la France comme terre d’accueil n’est pas un hasard dans des années 1920 très francophiles. Mais pour Mina Kacew, c’est surtout une évidence, la première étape du parcours hors du commun que finit par réaliser Romain Gary et qu’elle avait imaginé pour lui. Pourtant, selon l’écrivain, cette mère n’a rien d’exceptionnel et si elle est “légendaire” ce n’est que par les légendes qu’elle se construit toute seule. Non sans affection, mais dans un ton plein d’humour, Romain Gary en fait, dans ses confidences à Patrice Galbeau, une “emmerdeuse”, qui l’a maintes fois embarrassé.
Quand je me trouvais au lycée, devant un professeur qui m'avait mal noté, ma mère disait : 'Vous êtes un imbécile intégral, vous ne comprenez rien à rien.” Je me souviens de voir devant le lycée de Nice ma mère avec sa canne, arrêtant un professeur malheureux, un professeur de mathématiques. J'étais complètement nullard en mathématiques, il n'y a pas un professeur au monde qui aurait pu tirer quelque chose de moi à cet égard. Ma mère lui est tombée dessus en disant “Ce n'est pas mon fils qui a besoin d'être en quatrième ou en troisième. C'est vous qui devriez y retourner pour apprendre les choses élémentaires que l'on doit enseigner aux enfants.'
Une course contre la vie
Néanmoins, pour Romain Gary, le sujet de la Promesse de l’aube n’est pas tant son rapport à sa mère qu’une question hautement plus personnelle, à savoir son rapport à la vie et sa course contre celle-ci. En raison de l’exposition intime dans ce livre, il explique s'être beaucoup interrogé avant la publication de celui-ci, car cela le confrontait à une certaine vulnérabilité. Il souhaitait en faire le porte-étendard de son combat pour la justice. 
Son adaptation au cinéma, en 1970, par Jules Dassin, est en cela un sujet délicat. Le cinéaste n’aurait pas respecté le contrat autobiographique en attribuant au personnage du jeune Romain Gary des propos qu’il n’aurait jamais tenus. Une “trahison” sur laquelle il revient. 
Il y a une scène entre ma mère et moi, où moi, je dis à ma mère : 'Maman, je ne veux pas être juif.' Excusez-moi, c'est franchement dégueulasse. Si Monsieur Dassin a des problèmes avec sa juiverie, ça le regarde, qui ne me le mette pas sur le dos. Pour écouter le podcast : https://www.radiofrance.fr/franceculture/podcasts/a-voix-nue/l-enfant-de-sa-mere-4178323","2022-10-05-romain-gary.jpg", 4), (NULL, "Épisode 5/5 : Le survivant", "2022-12-05", "Dans ce cinquième et dernier entretien, Romain Gary évoque son expérience de la guerre et l’écriture de son premier ouvrage, 'Education européenne', qui l’a rendu célèbre.
Elevé par une mère comédienne, Romain Gary est initié très jeune au théâtre. Mais si cet univers le passionne, il confie ne pas être bon comédien. En 1941 à Bangui, en plein conflit armé, il est même amené à jouer devant Charles de Gaulle, qui n’a pas la réaction attendue. 
On l'avait jouée deux fois devant le public et on s'était préparé pour la première avec beaucoup d'assurance parce qu'on a eu un succès fou. Les gens se tordaient de rire. Et puis de Gaulle arrive. On fait donc la grande première avec les notables et aussi beaucoup de public et il se met au premier rang. Il nous regarde, et, il n'y a pas eu un seul rire pendant le spectacle. C'était la statue du commandeur qui regardait les libertins sur la scène et qui ne se marrait pas du tout. Les gens de dos ont senti que de Gaulle ne riait pas, et ils ne riaient pas non plus. C'était le bide le plus total. Il les avait glacés par son dos. Je ne sais pas comment il faisait, il devait avoir des rayons spéciaux, mais il a complètement foutu le spectacle en l'air.
Publicité
'Je me suis toujours considéré comme un survivant'
La guerre a profondément marqué Romain Gary, qui souffre du syndrome du survivant. Il s’engage dès 1940 auprès des Forces aériennes libres. Son expérience de l’horreur, qui dure cinq ans, est fondamentale dans la vie du romancier. 
J’ai accumulé un nombre insensé d'horreurs, voir mes camarades tomber ; c’était assez invivable. C'est assez dur de vivre avec. Je ne crois pas du tout qu'on puisse comprendre ma vie si on ne comprend pas que je me suis toujours considéré comme un survivant. Et c'est d'ailleurs à ce titre que j'ai eu des décorations, parce que vraiment, je ne vois pas ce que j’ai fait de plus que les autres. Je suis resté le dernier porte-manteau auquel on pouvait accrocher les décorations. 
'J’ai été assis assez longtemps à l’intérieur de moi-même'
L’écriture de Romain Gary est spontanée, il démarre un roman sans trop savoir où le mener. En cela, il reproche à la critique française de vouloir absolument l’identifier au travers de ses personnages ne laissant par-là que peu de place à l’imagination, qui pourtant, motive son œuvre. 
Vous savez, en France, on ne croit pas au roman. La France n'est pas le pays de la narration, c'est le pays de l'intellect, avant tout. (…) Il y a des romans de moi où on m’identifie dans des personnages qui sont exactement écrits à l'opposé de moi-même, parce que j'ai envie de me fuir, parce que j'ai été assis assez longtemps à l'intérieur de moi-même et que j'ai envie de changer de fauteuil.
'Je suis célèbre'
Education européenne est écrit durant la guerre, la nuit, par un Romain Gary encore inconnu et hanté par l’idée qu’il puisse mourir sans que l’on sache l’écrivain qu’il était. Cette première publication, en 1943, est un triomphe. Le jeune romancier est alors propulsé au rang de célébrité et il ne le quittera jamais plus. 
J’étais à la réanimation de la Salpêtrière pour un petit accident. (…) J’entends l’interne dire aux visiteurs : “Ici nous avons quelqu’un de connu.” Et ma réflexion a été de me dire : 'Merde, il aurait pu dire quelqu’un de célèbre.' C’est assez marrant, non ? Je suis célèbre. La célébrité n’est pas une notion de valeur, c’est une notion de notoriété. Je ne fais pas le modeste, mais je veux dire, précisons quand même. Pour écouter le podcast : https://www.radiofrance.fr/franceculture/podcasts/a-voix-nue/le-survivant-3124543","2022-12-05-romain-gary.jpg", 1),(NULL, "Auger-Aliassime remporte le prix Lionel-Conacher", "2022-12-28", "Félix Auger-Aliassime, qui s’est illustré sur les plus grandes scènes du tennis masculin en 2022, est le lauréat du prix Lionel-Conacher, lequel couronne l’athlète masculin de l’année de La Presse canadienne.
Il est le troisième joueur de tennis de l’histoire à recevoir ce prix, qui est remis annuellement depuis 1932, après Milos Raonic (2013 et 2014) et Denis Shapovalov (2017). De plus, il succède au spécialiste du décathlon Damian Warner, lauréat du trophée en 2021.
Auger-Aliassime, 22 ans, est passé du onzième rang mondial au début de 2022 au sixième à la fin de l’année, un sommet personnel en carrière. Pour y parvenir, il a dû remporter ses quatre premiers titres en carrière, dont trois consécutifs au cours d’une séquence irrésistible de 16 victoires à l’automne — à Florence, à Anvers et à Bâle.
« Ça a été une année formidable ; j’ai réussi à accomplir tous les objectifs que je m’étais fixés, et encore plus. J’avais déjà réalisé de belles performances à la moitié de l’année, mais de finir l’année au Masters de Turin, de gagner la Coupe Davis… Tout, cette année, je suis content de mon évolution en tant que personne, et en tant que joueur. Ça a été une superbe année, donc de recevoir ce prix — une reconnaissance du public et des médias canadiens —, c’est tout un honneur. Ça fait vraiment plaisir », a déclaré Auger-Aliassime, après un entraînement en marge de la World Tennis League, à Dubaï.
Sa conquête du titre à Rotterdam lui a aussi permis de mettre un terme à une série de huit revers en autant de matchs de championnat en carrière sur le circuit de l’ATP.
Le joueur de six pieds quatre pouces et 194 livres aurait pu étoffer davantage son impressionnante récolte de 2022, puisqu’il fut également finaliste au tournoi de Marseille plus tôt cette saison et qu’il a atteint les quarts de finale des Internationaux d’Australie pour une troisième saison de suite.
Il a d’ailleurs dominé le circuit de l’ATP au chapitre des victoires sur le dur (45) et des victoires en salle (31) en 2022, battant au passage le no 1 mondial, Carlos Alcaraz, et les ex-nos 1 mondiaux Novak Djokovic, Andy Murray et Rafael Nadal.
Une première Coupe Davis
Le Québécois a aussi laissé sa marque dans les compétitions par équipe.
En plus d’avoir contribué aux victoires de ses équipes à la Coupe ATP et à la Coupe Laver, il a permis au Canada de remporter la Coupe Davis pour la première fois de son histoire, le mois dernier. Le pays est du même coup devenu le seizième de l’histoire à remporter les grands honneurs de la compétition la plus prestigieuse dans le monde du tennis par équipe.
Une progression si fulgurante que le chef de la performance chez Tennis Canada, Guillaume Marx, a déclaré lors du traditionnel bilan de fin d’année de son organisation ce mois-ci qu’Auger-Aliassime « suit son chemin, je pense, pour remporter un titre du Grand Chelem d’ici les deux prochaines années ».
« Félix mérite absolument ce prestigieux titre [le prix Lionel-Conacher]. […] C’est un joueur de tennis incroyable, mais aussi une personne extraordinaire. Nous sommes fiers de ses exploits réalisés cette année et croyons que ses performances sur le terrain comme à l’extérieur de celui-ci inspireront les prochaines générations de joueurs de tennis canadiens », a renchéri le président et chef de la direction de Tennis Canada, Michael Downey.
Auger-Aliassime a ainsi reçu 20 des 48 votes au scrutin mené auprès des directeurs, des journalistes et des commentateurs sportifs du pays. Et pour eux, l’obtention du prix Lionel-Conacher ne laissait aucun doute.
« Jamais un joueur de tennis canadien n’a connu une année à la mesure de celle que vient de terminer Auger-Aliassime. Il a été dominant en fin d’année », a déclaré le directeur de la rédaction et des nouveaux médias de l’Acadie nouvelle, Gaétan Chiasson.
« L’ascension de Félix dans l’univers du tennis professionnel dans les derniers mois n’a jamais été égalée par un autre Canadien auparavant », a renchéri le chef de la section sports du Toronto Sun, Paul Ferguson.
Le joueur de soccer étoile du Bayern de Munich Alphonso Davies, qui s’est également illustré en devenant le premier buteur de l’histoire du Canada à la Coupe du monde plus tôt ce mois-ci, a terminé au deuxième rang du scrutin avec 10 voix, suivi du défenseur étoile de l’Avalanche du Colorado et membre de la dernière équipe championne de la Coupe Stanley Cale Makar, avec 7.
Le choix d’Auger-Aliassime permet au Québec de faire une razzia des honneurs individuels décernés par La Presse canadienne. Mercredi, la capitaine d’Équipe Canada, la hockeyeuse Marie-Philip Poulin, a remporté le prix de l’athlète canadienne féminine par excellence.
L’équipe de l’année sera dévoilée vendredi.", "2022-12-28-felix-auger.jpg", 2),(NULL, "Les grands disparus technos de 2022", "2022-10-28", "Tout comme les êtres humains, la technologie a son propre cycle de vie. Parfois, sa longévité défie tous les pronostics, et d’autres fois, elle disparaît subitement alors qu’on aurait aimé qu’elle ne nous quitte jamais. Voici sept logiciels, appareils, sites ou jeux vidéo qui sont passés à la trappe en 2022.
Internet Explorer
Le 15 juin 2022 a marqué la mort officielle du mal-aimé Internet Explorer. Le navigateur a été lancé il y a 27 ans par Microsoft et a longtemps été parmi les plus utilisés sur la toile, aux côtés de Safari et de Chrome.
Internet Explorer est devenu au fil des ans la risée des spécialistes en cybersécurité.
Microsoft invite désormais les gens à surfer sur le web avec son navigateur Edge, qui n’arrive pas à la cheville de son prédécesseur pour ce qui est de la popularité. En juin, seulement 4 % des internautes avaient adopté Edge.
Google Hangouts
Le système de messagerie de Google, qui a accompagné plusieurs travailleurs et travailleuses durant la pandémie, a tiré sa révérence en juin 2022 pour laisser la place à son grand frère : Google Chat. 
Google Hangouts a été remplacé par Google Chat cet automne.
Les plus tenaces ont pu utiliser l’interface web de Hangouts jusqu’à la fin du mois de novembre, avant qu’il ne soit entièrement retiré des plateformes de Google.
Le nouveau service, Chat, se veut plus moderne et propose davantage de fonctionnalités, selon Google.
Google Stadia
Le géant du web n’a pas seulement débranché Hangouts en 2022. Stadia, le service de jeux vidéo en nuage (cloud gaming) lancé en 2019, est aussi passé sous le couperet de Google.
Les joueurs et les joueuses qui avaient souscrit au service sont toujours en train de se faire rembourser pour tous les jeux et contenus achetés dans la boutique Stadia, une promesse qu’avait faite le vice-président lors de l’annonce du débranchement de la plateforme à l'automne.
Jade Raymond s'exprime en public.
La Montréalaise Jade Raymond était vice-présidente et directrice de Jeux et divertissement Stadia.
Rappelons que le premier studio de jeux vidéo de la marque avait élu domicile à Montréal et qu'il a été piloté par la Montréalaise Jade Raymond avant sa fermeture, en 2021.
L’arrêt de mort officiel de Google Stadia est prévu le 18 janvier 2023
L’iPhone mini
Apple avait conquis le cœur de plusieurs de ses fans aux petites mains avec l’iPhone mini, dont la première version est sortie en 2020 avec la douzième génération du téléphone intelligent de la marque à la pomme.
L'iPhone 12 mini est doté d'un écran de 5,4 pouces.
Si la mouture mini de l’appareil a été renouvelée pour la treizième génération, elle brillait par son absence lors du dévoilement de la quatorzième, en septembre 2022.
Les ventes de l’iPhone mini n’étaient pas à la hauteur des attentes du géant à la pomme, qui a vendu beaucoup plus de téléphones intelligents à gros écrans ces dernières années, selon le site spécialisé Mashable.
Les téléphones BlackBerry
L’un des grands disparus de 2022 est certainement le téléphone BlackBerry. Son fabricant, l’entreprise canadienne Research in Motion (RIM), a annoncé, au début de l’année, que tous les BlackBerry qui utilisaient son système d’exploitation, mis à jour pour la dernière fois en 2013, allaient être mis hors service le 4 janvier 2022.
Des vieux téléphones BlackBerry, empilés. 
Travailler de partout, et en tout temps, directement sur son téléphone. Ce qui semble aujourd'hui une évidence était loin de l'être en 1999, quand la compagnie canadienne Research in Motion a lancé sur le marché le premier téléphone BlackBerry.
Depuis cette date, leurs propriétaires ne peuvent plus téléphoner, ni recevoir de messages, ni naviguer sur le web, ni même composer le 911.
Les BlackBerry fonctionnant avec le système d’exploitation Android ont toutefois été épargnés par ce grand débranchement. Des téléphones de la marque pourraient donc toujours être en circulation.
Le premier téléphone BlackBerry a vu le jour en 1999. Équipé d’un clavier miniature, d’un accès Internet et d’une boîte courriel, l’appareil a révolutionné le monde du travail à l’époque.
Miniclip.com
Le site de minijeux en ligne Miniclip.com, lancé en 2001, n’est pas entièrement mort, mais il n’existe plus tel que les trentenaires d’aujourd’hui l'ont connu.
En effet, depuis l'automne, il n’affiche plus que deux jeux : 8 Ball Pool et Agar.io. Les autres titres ont migré au cours des dernières années vers des applications mobiles ou encore sur les sites web respectifs de leur développeur.
Capture d'écran du site Miniclip.com affichant le jeu vidéo «Club Penguin», avec beaucoup de pingouin en dessins animés jouant sur des bancs de neige. 
Le monde virtuel «Club Penguin» a connu un grand succès sur le site Miniclip.com.
Miniclip.com s’est aussi transformé en vitrine sur laquelle on peut consulter les nouveautés sur ses jeux mobiles et obtenir d’autres informations sur l’entreprise.
Le grand débranchement de Flash, survenu en janvier 2021, a également eu son rôle à jouer dans la nouvelle vocation de ce site qui a bercé toute une génération de jeunes dans les années 2000.
Overwatch
Le 2 octobre 2022, Activision-Blizzard a procédé au débranchement de son jeu vidéo de tir à succès Overwatch… pour laisser place à sa suite, Overwatch 2, le 4 octobre 2022.
Un personnage de jeu vidéo avec des ailes lance un laser à un autre personnage doté d'ailes dans les airs, devant un paysage urbain. 
«Overwatch» est un jeu de tir à la première personne lancé en 2016.
Pendant deux jours, les adeptes du titre n’ont pu y lancer de parties en ligne. L’attente s’est prolongée quelques jours, puisque le logiciel a été la cible d’une « attaque DDoS massive », qui empêchait les joueurs et joueuses de se connecter aux serveurs, selon le développeur.
Une attaque de ce genre vise à submerger un réseau de serveurs avec une vague de trafic afin de le perturber. Des personnes ont indiqué au site spécialisé Tech Radar avoir été placées en file d'attente pendant quatre heures, avec quelque 50 000 autres joueurs et joueuses. D’autres personnes ont même été déconnectées du site une fois l’attente achevée.
Le logo du jeu vidéo Overwatch 2 est affiché avec terrasse et piscine en arrière-plan.
«Overwatch 2» sera finalement en vente en octobre prochain.
Activision-Blizzard avait d’abord affirmé vouloir faire coexister les deux titres, avant de revenir sur sa promesse. Overwatch 2 a notamment mis fin aux coffres à butins (loot box), critiqués pour leur mécanique semblable aux jeux de hasard et d’argent.", "2022-10-28-disparus-techno.jpg", 3),(NULL, "Netflix se lance dans les vidéos d’exercice physique", "2022-09-28", "Alors que la nouvelle année approche à grands pas, Netflix ajoute à son offre des capsules d’entraînement du Nike Training Club, également offertes sur l’application payante de l’équipementier américain.
Netflix a ajouté vendredi une trentaine d’heures d’entraînement physique, comme du yoga et des exercices d’aérobie, et promet d’ajouter tout autant de contenu en 2023, sans toutefois préciser de date précise. De quoi accompagner les résolutions du Nouvel An de celles et ceux souhaitant se remettre en forme.
Il n'est pas toujours facile de se motiver pour faire de l'exercice, mais avoir l’option de s’entraîner puis de passer directement à l'une de ses émissions préférées a un certain attrait. Et maintenant, c'est exactement ce que vous pouvez faire, écrit Netflix dans un communiqué.
Depuis novembre, un nouvel abonnement Netflix avec publicité est offert au coût de 6 $ par mois. Les forfaits sans publicités commencent plutôt à 10 $ et atteignent 21 $ par mois.", "2022-09-28-neflix.jpg", 4);
