<?php

require "./display.php";
require "./index.php";

$t = [];
$nodes = [7, 3, 10, 8, 2, 4, 3, 9, 5, 1, 6, 11];

function insert($tree, $el)
{
    if (count($tree) === 0) {
        return [
          'value' => $el,
          'left' => [],
          'right' => []
        ];
    }
    if ($el <= $tree['value']) {
        $tree['left'] = insert($tree['left'], $el);
        return $tree;
    }
    
    $tree['right'] =  insert($tree['right'], $el);
    return $tree;
}

function search($tree, $query)
{
    if (count($tree) === 0) {
        return false;
    }

    if ($query < $tree['value']) {
        return search($tree['left'], $query);
    }
    if ($query > $tree['value']) {
        return search($tree['right'], $query);
    }
    return true;
}

function treeMin($tree)
{
    if (count($tree['left']) === 0) {
        return $tree['value'];
    }
    return treeMin($tree['left']);
}

function treeMax($tree)
{
    if (count($tree['right']) === 0) {
        return $tree['value'];
    }
    return treeMax($tree['right']);
}

function supprimer($tree, $el)
{
    if (count($tree) === 0) {
        return [];
    }

    // Tant que la valeur du noeud n'est pas égale à celle qu'on veut supprimer, on cherche dans les fils
    if ($el < $tree['value']) {
        $tree['left'] = supprimer($tree['left'], $el);
        return $tree;
    }
    if ($el > $tree['value']) {
        $tree['right'] = supprimer($tree['right'], $el);
        return $tree;
    }

    // Si on trouve la valeur à supprimer
    if (count($tree['left']) === 0 && count($tree['right']) === 0) { // Si est une Feuille
        return [];
    }
    if (count($tree['left']) === 0) { // Si pas d'enfants à gauche => on retourne celui de droite
        return $tree['right'];
    }
    if (count($tree['right']) === 0) { // Si pas d'enfants à droite => on retourne celui de gauche
        return $tree['left'];
    }

    // Si a un fils à gauche et à droite on récupère le max à gauche (ou min à droite) pour remplacer notre valeur supprimée
    $successor = treeMax($tree['left']); // Or treeMin($tree['right'])
    $tree['value'] = $successor;
    // On supprime l'ancienne valeur qui a succédée à notre noeud supprimé
    $tree['left'] = supprimer($tree['left'], $successor); // Or $tree['right'] = supprimer($tree['right'], $successor['value'])
    
    return $tree;
}

function order($tree)
{
    if (count($tree) === 0) {
        return [];
    }

    return array_merge(
        order($tree['left']),
        [$tree['value']],
        order($tree['right']),
    );
}

foreach ($nodes as $node) {
    $t = insert($t, $node);
}

var_dump("6 dans l'arbre ? ".search($t, 6));
var_dump("47 dans l'arbre ? ".search($t, 47));

printTree($t);

var_dump("min: ".treeMin($t));
var_dump("max: ".treeMax($t));

display(order($t));
