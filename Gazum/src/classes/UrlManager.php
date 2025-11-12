<?php 
namespace Gazum\App\classes;

class UrlManager
{
    /** @var string L'URL de base (avec schéma et hôte), ex: https://www.monsite.com/dossier/ */
    private $baseUrl;

    /**
     * Constructeur pour définir l'URL de base.
     * * @param string $baseUrl L'URL absolue de la page actuelle.
     */
    public function __construct(string $baseUrl)
    {
        // Nettoyer l'URL de base pour s'assurer qu'elle se termine par un slash (si c'est un répertoire)
        // et qu'elle est bien formatée.
        $this->baseUrl = $this->cleanBaseUrl($baseUrl);
    }

    /**
     * Nettoie et normalise l'URL de base.
     * * @param string $url L'URL de base à nettoyer.
     * @return string L'URL de base nettoyée.
     */
    private function cleanBaseUrl(string $url): string
    {
        // Supprime l'éventuelle partie "query" ou "fragment"
        $parts = parse_url($url);
        if (isset($parts['query'])) unset($parts['query']);
        if (isset($parts['fragment'])) unset($parts['fragment']);
        
        // Reconstruit l'URL sans la requête/fragment
        $baseUrl = (isset($parts['scheme']) ? $parts['scheme'] . '://' : '') .
                   (isset($parts['host']) ? $parts['host'] : '') .
                   (isset($parts['path']) ? $parts['path'] : '');

        // S'assure que si l'URL se termine par un fichier, on ne conserve que le répertoire
        if (substr($baseUrl, -1) !== '/') {
            $baseUrl = dirname($baseUrl) . '/';
        }

        return $baseUrl;
    }

    /**
     * Convertit une URL relative ou racine-relative en URL absolue.
     * * @param string $relativeUrl L'URL relative à convertir.
     * @return string L'URL absolue complète.
     */
    public function toAbsolute(string $relativeUrl): string
    {
        // 1. L'URL est déjà absolue (commence par http://, https:// ou //)
        if (preg_match('/^(http|https|ftp):\/\//i', $relativeUrl) || substr($relativeUrl, 0, 2) === '//') {
            return $relativeUrl;
        }

        // 2. L'URL est racine-relative (commence par /)
        if (substr($relativeUrl, 0, 1) === '/') {
            $baseParts = parse_url($this->baseUrl);
            $domain = (isset($baseParts['scheme']) ? $baseParts['scheme'] . '://' : '') .
                      (isset($baseParts['host']) ? $baseParts['host'] : '');
            
            // Si la base est simple (ex: https://monsite.com/), on ajoute l'URL relative.
            return $domain . $relativeUrl;
        }

        // 3. L'URL est relative au répertoire (ex: page.html ou ../page.html)
        $absoluteUrl = $this->baseUrl . $relativeUrl;

        // Gérer les notations de répertoire parent (../) et courant (./)
        // Ceci est une implémentation simplifiée. Pour une robustesse complète (RFC 3986),
        // il faudrait une librairie dédiée.
        
        $parts = explode('/', $absoluteUrl);
        $stack = [];
        
        foreach ($parts as $part) {
            if ($part === '' || $part === '.') {
                continue; // Ignorer les parties vides ou '.'
            }
            if ($part === '..') {
                // Remonter d'un niveau si possible
                if (count($stack) > 1) { // Conserver le domaine/schéma initial
                    array_pop($stack);
                }
            } else {
                $stack[] = $part;
            }
        }
        
        
        // Reconstruire l'URL à partir du tableau de segments
        $finalUrl = implode('/', $stack);
        
        // Assurer que le schéma (http://) et le slash initial du chemin sont corrects
        // La première partie contient normalement le schéma et l'hôte
        $schemeAndHost = array_shift($stack);
        
        return $schemeAndHost . (empty($stack) ? '' : '/' . implode('/', $stack));
    }
    // public static function Build($link)
    // {
    //     $base = 'http://' . getenv('SERVER_NAME');

    //     // Si HTTP_SERVER_PORT est défini et différent de la valeur par défaut
    //     if (defined('HTTP_SERVER_PORT') && HTTP_SERVER_PORT != '80') {
    //         // Ajoute le port du serveur
    //         $base .= ':' . HTTP_SERVER_PORT;
    //     }

    //     // Construit le lien absolu
    //     $link = $base . VIRTUAL_LOCATION . $link;

    //     // Échappe le HTML (pour la sécurité)
    //     return htmlspecialchars($link, ENT_QUOTES);
    // }
}