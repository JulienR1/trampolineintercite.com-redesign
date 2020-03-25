<?php

    define("NAME", "name");
    define("REF", "ref");
    define("CLASS", "class");
    define("LINK_ID", "linkID");
    define("SUB_MENUS", "subMenus");

    //  -----------------------------------
    //  Definition de la navigation du site
    //  -----------------------------------
    class Navigation{                
        function get(){
            return array(
                createMenuWithTags("Accueil","/","footer-only",NULL,NULL),
                createMenuWithTags("À propos","#","dropdown",NULL,array(
                    createMenu("Règlements","#"),
                    createMenu("Actualités","#"),
                    createMenu("Annonces","#")
                )),
                createMenuWithTags("Activités","#","dropdown",NULL,array(
                    createMenu("Récréatif","#"),
                    createMenu("Fêtes d'enfants","#"),
                    createMenu("Compétitif","#"),
                    createMenu("Comment s'inscrire","#")
                )),
                createMenuWithTags(getLogoImage(),"/","hide-on-cell header-only","logo",NULL),
                createMenuWithTags("Horaire","#","dropdown",NULL,NULL),
                createMenuWithTags("Contact","#","dropdown",NULL,NULL)
            );
        }
    }

    function getLogoImage(){
        return '<img src="/Assets/img/logo.png">';
    }

    function createMenu($name, $ref){
        return createMenuWithTags($name, $ref, NULL, NULL, NULL);
    }

    function createMenuWithTags($name, $ref, $class, $linkId, $subMenus){
        return array(
            constant("NAME") => $name,
            constant("REF") => $ref,
            constant("CLASS") => $class,
            constant("LINK_ID") => $linkId,
            constant("SUB_MENUS") => $subMenus
        );
    }

?>