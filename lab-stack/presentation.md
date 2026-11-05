---
marp: true
theme: default
paginate: true
size: 16:9
header: "PROJET TECHNIQUE · STREAMIX"
footer: "Streamix · Plateforme de streaming de films"
style: |
  section {
    background-color: #101827;
    color: #edf2f7;
    font-family: 'Aptos', 'Segoe UI', sans-serif;
    padding: 40px 56px;
  }
  h1, h2, h3 {
    color: #f5b942;
    font-weight: 700;
  }
  h1 { font-size: 2.2em; }
  h2 { font-size: 1.55em; }
  h3 {
    color: #84d9c5;
    font-size: 1.1em;
  }
  section.lead {
    background: #17243a;
    text-align: center;
  }
  section.lead h1 { font-size: 2.6em; }
  section.cover {
    background: #f8fafc;
    color: #101827;
    text-align: center;
  }
  section.cover h1, section.cover h2, section.cover h3 {
    color: #0b5670;
  }
  section.cover img {
    max-height: 88px;
    width: auto;
    vertical-align: middle;
  }
  section.light {
    background: #f8fafc;
    color: #172033;
  }
  section.light h1, section.light h2, section.light h3 {
    color: #075985;
  }
  section table {
    border-collapse: collapse;
    width: 100%;
  }
  section table th {
    background-color: #173c46 !important;
    color: #ffffff !important;
    font-weight: 700;
    text-align: left;
  }
  section table td {
    background-color: #e2e8f0 !important;
    color: #172033 !important;
    border-bottom: 1px solid #94a3b8;
  }
  section table th, section table td {
    padding: 10px 12px;
  }
  section.labs {
    padding: 28px 36px;
  }
  section.labs table {
    font-size: 0.72em;
    line-height: 1.35;
    table-layout: fixed;
  }
  section.labs table th, section.labs table td {
    padding: 7px 8px;
    vertical-align: top;
  }
  section.labs table th { color: #ffffff !important; }
  section.labs table td {
    background-color: #f1f5f9 !important;
    color: #172033 !important;
  }
  blockquote {
    border-left: 4px solid #f5b942;
    color: #cbd5e1;
    padding-left: 18px;
  }
  header, footer {
    color: #9fb3c8;
    font-size: 0.65em;
  }
  section.cover header, section.cover footer,
  section.light header, section.light footer {
    color: #475569;
  }
---

<!-- _class: cover -->

![OFPPT](images/ofppt-logo.png) ![SoliCode](images/solicode-logo.png)

# Streamix

### Projet technique · Plateforme de streaming de films

**Présenté par** : Mesbahi Nour &nbsp; • &nbsp; **Encadré par** : ES-Sarraj Fouad

---

## Projet Technique

Une plateforme pour découvrir et consulter des films.

**Films** · **Réalisateurs** · **Genres cinématographiques**

---

<!-- _class: light -->

## Stack Technique

| Technologie | Rôle |
|:---|:---|
| HTML | Structure des pages |
| JavaScript | Actions et contenu dynamique |
| Tailwind CSS | Style des pages |
| PHP | Traitement côté serveur |
| Fetch API | Échange des données |
| JSON | Stockage des données |

---

<!-- _class: light -->

## Outils du Projet

| Outil | Utilisation |
|:---|:---|
| Git | Suivi des changements |
| GitHub | Dépôt du code |
| Markdown | Documentation |
| Marp | Présentation du projet |

---

## Qu'est-ce que Streamix ?

Une plateforme de films simple.

**Découvrir** · **Consulter** · **Classer**

Les films sont classés par genre et liés à leur réalisateur.

---

<!-- _class: labs -->

## Étapes du Projet

| Phase 1 · Interface | Phase 2 · Données | Phase 3 · Traitement | Phase 4 · Finalisation |
|:---|:---|:---|:---|
| 1. Créer les pages HTML<br>2. Ajouter le style Tailwind CSS<br>3. Ajouter les actions JavaScript | 4. Préparer les données des films<br>5. Préparer les données des réalisateurs<br>6. Préparer les genres cinématographiques | 7. Lire les données avec PHP<br>8. Enregistrer les données en JSON<br>9. Échanger les données avec Fetch API | 10. Relier les trois parties<br>11. Tester les fonctions<br>12. Préparer la présentation |
