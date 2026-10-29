---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  section {
    font-family: Inter, system-ui, sans-serif;
    font-size: 25px;
    padding: 42px 58px;
    background: #0b1120;
    color: #e2e8f0;
  }
  section.light {
    background: #f8fafc;
    color: #0f172a;
  }
  section.lead {
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  h1 { color: #38bdf8; font-size: 2em; }
  h2 { color: #a5b4fc; border-bottom: 2px solid #334155; padding-bottom: 8px; }
  section.light h1 { color: #0369a1; }
  section.light h2 { color: #4338ca; border-color: #cbd5e1; }
  p, li { line-height: 1.4; }
  code { color: #38bdf8; background: #1e293b; }
  pre {
    background: #0f172a !important;
    border: 1px solid #334155;
    border-radius: 10px;
    padding: 14px;
  }
  pre code { color: #f1f5f9 !important; font-size: 0.78em; }
  table { width: 100%; border-collapse: collapse; font-size: 0.86em; }
  th, td { border-bottom: 1px solid #475569; padding: 8px 12px; text-align: left; }
  th { color: #38bdf8; }
  section.light th { color: #0369a1; }
---

<!-- _class: lead -->

# Rédiger un prompt de tâche efficace
Encadrant : ES-SARRAJ Fouad

---

<!-- _class: light -->

## Lab Plan

1. Introduction
2. Problems Encountered
3. Solutions Implemented

---

## Introduction

Un **prompt de tâche** décrit un travail à confier à un assistant IA ou à un agent de développement. Un bon prompt réduit les suppositions et permet de vérifier le résultat.

À la fin du lab, vous saurez :

- transformer une demande vague en objectif concret ;
- préciser le contexte, le périmètre et les contraintes ;
- écrire des critères d’acceptation vérifiables ;
- demander une validation et un compte rendu utiles.

---

<!-- _class: light -->

## Problems Encountered

Les demandes trop courtes laissent des décisions importantes à l’agent :

- **Objectif flou :** « améliore le formulaire » ne précise pas le résultat attendu.
- **Contexte absent :** la page, le framework ou les conventions du projet ne sont pas indiqués.
- **Périmètre illimité :** « refactorise tout » peut entraîner des changements sans rapport.
- **Succès invérifiable :** « fais quelque chose de propre » n’est pas un test.

Conséquence : une réponse plausible peut ne pas correspondre au besoin.

---

## Solutions Implemented

Pour lever ces ambiguïtés, le lab utilise un cadre simple :

1. **Contexte** — où et dans quel environnement intervenir ?
2. **Objectif** — quel résultat observable obtenir ?
3. **Périmètre** — que modifier, et que laisser intact ?
4. **Contraintes** — quelles règles ou conventions respecter ?
5. **Acceptation** — comment confirmer que la tâche est terminée ?
6. **Validation et compte rendu** — quoi tester et quoi résumer ?

---

<!-- _class: light -->

## Anatomie d’un prompt de tâche

| Partie | Question à laquelle répondre | Exemple |
|:---|:---|:---|
| Contexte | Dans quel projet / quelle zone ? | Formulaire de création d’un produit |
| Objectif | Quel changement précis ? | Valider le nom et le prix côté serveur |
| Périmètre | Où agir ? | Contrôleur et tests concernés |
| Contraintes | Quelles règles respecter ? | Garder les conventions existantes |
| Acceptation | Quel résultat prouve la réussite ? | Cas valides et invalides couverts |
| Validation | Que faut-il exécuter ? | Lancer les tests ciblés |

Ne renseignez que les informations utiles ; ne recopiez pas tout le projet dans le prompt.

---

## Un prompt vague

Exemple illustratif pour une application web :

```text
Ajoute la validation du formulaire produit et améliore le code.
```

Ce prompt ne dit pas :

- quels champs sont concernés ni quelles règles appliquer ;
- où se trouve le formulaire ou la validation ;
- si l’interface, la base de données ou d’autres pages peuvent changer ;
- comment vérifier que le travail est correct.

---

<!-- _class: light -->

## Réécriture : rendre la demande vérifiable

```text
Dans l’application Laravel existante, ajoute la validation serveur
au formulaire de création d’un produit.

Règles : le nom est obligatoire et limité à 100 caractères ;
le prix est numérique et supérieur ou égal à 0.

Respecte les conventions déjà utilisées dans le projet. Limite les
changements à ce flux et à ses tests ; ne modifie pas les autres écrans.

Acceptation :
- un nom vide ou de plus de 100 caractères est refusé ;
- un prix non numérique ou négatif est refusé ;
- des données valides sont acceptées ;
- les erreurs sont présentées selon le mécanisme existant.

Exécute les tests ciblés. Dans ta réponse, résume les fichiers modifiés
et les validations effectuées. N’effectue pas de commit.
```

---

## Bonnes pratiques

- **Décrire le résultat, pas une solution supposée :** indique le comportement attendu avant d’imposer l’implémentation.
- **Rester précis et proportionné :** ajoute les contraintes nécessaires, évite les détails sans effet sur le résultat.
- **Délimiter les changements :** nomme les zones à toucher et les comportements à préserver.
- **Écrire des critères observables :** préfère « le prix négatif est refusé » à « la validation est robuste ».
- **Demander une vérification réelle :** indique les tests ou contrôles pertinents, sans prétendre qu’ils ont réussi.

---

<!-- _class: light -->

## Exercice pratique

Transformez cette demande en prompt de tâche complet :

> « Ajoute une recherche dans la liste des clients. »

Votre prompt doit préciser :

1. le champ recherché et les règles de correspondance ;
2. la partie de l’application concernée et ce qui reste hors périmètre ;
3. le résultat attendu pour une recherche vide et sans résultat ;
4. au moins trois critères d’acceptation vérifiables ;
5. les tests à lancer et le compte rendu demandé.

**Défi :** relisez votre prompt et repérez toute décision qui reste à deviner.

---

## Vérifier avant d’envoyer

- [ ] La tâche demande-t-elle un résultat précis et utile ?
- [ ] Le contexte permet-il de trouver la bonne zone du projet ?
- [ ] Le périmètre et les comportements à préserver sont-ils clairs ?
- [ ] Les critères peuvent-ils être vérifiés sans interprétation ?
- [ ] La validation demandée est-elle adaptée à la tâche ?
- [ ] Ai-je évité d’inclure des secrets ou des données sensibles ?

Si une réponse est « non », complétez le prompt avant de le transmettre.

---

<!-- _class: light lead -->

## À retenir

**Contexte + objectif + périmètre + contraintes + critères vérifiables + validation**

Un prompt efficace n’est pas nécessairement long : il rend explicites les décisions importantes et laisse le moins possible à deviner.