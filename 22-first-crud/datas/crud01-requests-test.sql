# tests de nos requêtes

# Sélection de tous les champs de la table thearticle.
SELECT * FROM thearticle;

# Sélection de tous les champs de la table theuser.
SELECT * FROM theuser;

# Sélection de tous les champs de la table thearticle classé par thearticledate descendant.
SELECT * FROM thearticle 
		ORDER BY thearticledate DESC;
        
# Sélection de tous les champs de la table thearticle classé par thearticledate descendant. On doit récupérer idtheuser et theuserlogin en jointure interne  depuis  
# la table theuser - càd l'utilisateur qui a écrit l'article.
SELECT thearticle.* , theuser.idtheuser, theuser.theuserlogin
		FROM thearticle
			INNER JOIN  theuser
            ON theuser.idtheuser = thearticle.theuser_idtheuser
		ORDER BY thearticle.thearticledate DESC;
        
 # Sélection de tous les champs de la table thearticle SAUF theuser_idtheuser classé par thearticledate descendant. On doit récupérer idtheuser et theuserlogin en jointure interne  depuis  
# la table theuser - càd l'utilisateur qui a écrit l'article.
SELECT thearticle.idthearticle, thearticle.thearticletitle, thearticle.thearticletext, thearticle.thearticledate , 
				theuser.idtheuser, theuser.theuserlogin
		FROM thearticle
			INNER JOIN  theuser
            ON theuser.idtheuser = thearticle.theuser_idtheuser
		ORDER BY thearticle.thearticledate DESC;       
        
# Sélection de tous les champs de la table thearticle SAUF theuser_idtheuser classé par thearticledate descendant. On doit récupérer idtheuser et theuserlogin en jointure interne  depuis  
# la table theuser - càd l'utilisateur qui a écrit l'article. ! UTILISATION d'alias de table, je ne mets pas le mot clef AS (pratique personnelle) , car je l'utilise pour les alias de sorties
SELECT a.idthearticle, a.thearticletitle, a.thearticletext, a.thearticledate,
				u.idtheuser, u.theuserlogin
		FROM thearticle a
			INNER JOIN  theuser u 
            ON u.idtheuser = a.theuser_idtheuser
		ORDER BY a.thearticledate DESC;        
        
# Sélection de tous les champs de la table thearticle SAUF theuser_idtheuser classé par thearticledate descendant. On doit récupérer idtheuser et theuserlogin en jointure interne  depuis  
# la table theuser - càd l'utilisateur qui a écrit l'article. ! UTILISATION d'alias de table, je ne mets pas le mot clef AS (pratique personnelle) , car je l'utilise pour les alias de sorties, 
# je veux récuper qu'un résultat (le dernier article), utilisation du LIMIT 1 (1 seul résultat, la clef '0') -- équivalent à LIMIT 0 (départ), 1 (nombre à prendre)
SELECT a.idthearticle, a.thearticletitle, a.thearticletext, a.thearticledate,
				u.idtheuser, u.theuserlogin
		FROM thearticle a
			INNER JOIN  theuser u 
            ON u.idtheuser = a.theuser_idtheuser
		ORDER BY a.thearticledate DESC
        LIMIT 1;               -- equal to LIMIT 0, 1
        
 # Sélection de tous les champs de la table thearticle SAUF theuser_idtheuser classé par thearticledate descendant. Le thearticletext doit être coupé à 250 caractères :
 # SUBSTR(a.thearticletext,1,250) AS thearticletext. J'utilise le AS pour voir clairement le nom des variables de sorties, SUBSTR(a.thearticletext,1,250) dans un tableau associatif 
 # est un problème comme nom de variable de sortie. On doit récupérer idtheuser et theuserlogin en jointure interne  depuis  
# la table theuser - càd l'utilisateur qui a écrit l'article. ! UTILISATION d'alias de table, je ne mets pas le mot clef AS (pratique personnelle) , car je l'utilise pour les alias de sorties
SELECT a.idthearticle, a.thearticletitle, SUBSTR(a.thearticletext,1,250) AS thearticletext, a.thearticledate,
				u.idtheuser, u.theuserlogin
		FROM thearticle a
			 INNER JOIN  theuser u 
            ON u.idtheuser = a.theuser_idtheuser
		ORDER BY a.thearticledate DESC;  
        
        
# Sélection de tous les champs de la table thearticle SAUF theuser_idtheuser.       
# On doit récupérer idtheuser et theuserlogin en jointure interne  depuis  
# la table theuser - càd l'utilisateur qui a écrit l'article.
# La condition sera lorsque l'ID de l'article vaut ... (int) par exemple 2   
SELECT a.idthearticle, a.thearticletitle, a.thearticletext, a.thearticledate,
				u.idtheuser, u.theuserlogin
		FROM thearticle a
			INNER JOIN  theuser u 
            ON u.idtheuser = a.theuser_idtheuser
		WHERE a.idthearticle = 2 ;  
        
 
#  On veut récupérer les utilisateurs et on va prendre les articles, seulement si il y a un lien (jointure interne)  
# , seulement si il y a des articles pour ces utilisateurs (abscence d'un utilisateur)
SELECT	u.idtheuser, u.theuserlogin,
				a.idthearticle, a.thearticletitle, SUBSTR(a.thearticletext,1,250) AS thearticletext, a.thearticledate
			FROM theuser u
				INNER JOIN thearticle a
				ON u.idtheuser = a.theuser_idtheuser; 
 
#  On veut récupérer les utilisateurs et on va prendre les articles, si il y en a (jointure externe LEFT)   
#  Car on veut pouvoir afficher un auteur même si il n'a pas écrit d'article !
SELECT	u.idtheuser, u.theuserlogin,
				a.idthearticle, a.thearticletitle, SUBSTR(a.thearticletext,1,250) AS thearticletext, a.thearticledate
			FROM theuser u
				LEFT JOIN thearticle a
				ON u.idtheuser = a.theuser_idtheuser;
                
#  On veut récupérer les utilisateurs et on va prendre les articles, si il y en a (jointure externe RIGHT)   
#  Car on veut pouvoir afficher un article même si il n'a pas d'auteur !
SELECT	u.idtheuser, u.theuserlogin,
				a.idthearticle, a.thearticletitle, SUBSTR(a.thearticletext,1,250) AS thearticletext, a.thearticledate
			FROM theuser u
				RIGHT JOIN thearticle a
				ON u.idtheuser = a.theuser_idtheuser;  
                
# Pour la page user.php, on va sélectionner l'auteur, et tous les articles 
# qu'il a écrit, si il en a écrit (mais donc pas obligatoire)
# Mais on a un problème, on a 3 lignes de résultats alors qu'on en souhaiterait
# qu'une seule, classé par date d'article descendant

SELECT	u.idtheuser, u.theuserlogin,
		a.idthearticle, a.thearticletitle, SUBSTR(a.thearticletext,1,150) AS thearticletext, a.thearticledate
			FROM theuser u
				LEFT JOIN thearticle a
				ON u.idtheuser = a.theuser_idtheuser
			WHERE u.idtheuser = 1
		ORDER BY a.thearticledate DESC;  
    
# pour éviter ça, on peut utiliser un GROUP BY , mais on perd les articles
# séléctionnés ! pour n'en avoir plus qu'un   
SELECT	u.idtheuser, u.theuserlogin,
		a.idthearticle, a.thearticletitle, SUBSTR(a.thearticletext,1,150) AS thearticletext, a.thearticledate
			FROM theuser u
				LEFT JOIN thearticle a
				ON u.idtheuser = a.theuser_idtheuser
			WHERE u.idtheuser = 1
		GROUP BY u.idtheuser
		ORDER BY a.thearticledate DESC; 

# on va utiliser des GROUP_CONCAT pour concaténer les champs de l'article entre eux et utiliser le SEPARATOR choisi (par défaut "," suffisant pour les id), ici le choix est "|||". le ORDER BY dans le group_concat doit, si il est utilisé,  être mis dans tous les champs pour qu'ils correspondent toujours entre eux     
SELECT	u.idtheuser, u.theuserlogin,
		GROUP_CONCAT(a.idthearticle ORDER BY a.thearticledate DESC) AS idthearticle, 
        GROUP_CONCAT(a.thearticletitle ORDER BY a.thearticledate DESC SEPARATOR '|||') AS thearticletitle,
        GROUP_CONCAT(SUBSTR(a.thearticletext,1,150) ORDER BY a.thearticledate DESC SEPARATOR '|||') AS thearticletext, 
        GROUP_CONCAT(a.thearticledate ORDER BY a.thearticledate DESC SEPARATOR '|||') AS thearticledate
			FROM theuser u
				LEFT JOIN thearticle a
				ON u.idtheuser = a.theuser_idtheuser
			WHERE u.idtheuser = 1
		GROUP BY u.idtheuser
		;        