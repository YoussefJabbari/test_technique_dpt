# DIGITAL PROCESS TOOLS TECHNICAL TEST

Ce mini projet fait partie du test technique demandé à faire pour l'entreprise Digital Process Tools.

Voici le travail demandé:

"Votre client vous propose de développer un software pour faire fonctionner des ascenseurs. Les différents hardwares qui équiperont ces ascenseurs possèdent 2 commandes : goUp() et goDown().

Écrire dans le langage serveur de votre choix le software permettant de faire fonctionner les ascenseurs équipés de ces hardwares."

La solution du test est sous forme d'une API REST, reçoit une requête GET et retourne un json.

La requête GET doit contenir les champs suivants:
 * action          : Valeurs possibles ["goToFloorN"].
 * id              : ID de l'ascenseur.
 * serial_number   : SERIAL NUMBER de l'ascenseur.
 * actual_floor    : L'étage actuel de l'ascenseur.
 * requested_floor : L'étage demandé de l'ascenseur.
 
La requête doit retourner un objet JSON qui contient:
 * status : Valeurs possibles ["failed", "success"].
 
------------------ Cas d'échec :
 * cause : Valeurs possibles ["missing_action", "unknown_action", "missing_attributes", "inexistent_floor"].

------------------ Cas de succès :
 * action : Valeurs possibles ["up", "down", "none"].
 * actual_floor : Etage de l'ascenseur après l'éxecution de l'action.
 * steps : Nombre d'étages passés pendant l'action.