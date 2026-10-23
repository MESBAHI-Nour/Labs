const APIURL = 'http://localhost:8000/backend/api/api.php';
const form = document.getElementById('comment-form');
const tbody = document.getElementById('table-categories-body');
const nom = document.getElementById('cat-nom');
const categorie = document.getElementById('cat-cate');

function loadrecipe() {
  fetch(APIURL)
    .then(Response => Response.json())
    .then(recipe => {
      tbody.innerHTML = '';
      recipe.forEach(rec => {
        tbody.innerHTML += `
          <tr>
            <td>${rec.id}</td>
            <td>${rec.nom}</td>
            <td>${rec.categorie}</td>
          </tr>
        `;
      });
    });
}

form.addEventListener('submit', function (event) {
  event.preventDefault();

  const data = {
    nom: nom.value,
    categorie: categorie.value
  };

  fetch('http://localhost:9999/backend/api/api.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data)
  })
    .then(Response => Response.json())
    .then(resultat => {
      displayArticles();
      form.reset();
    });
});

loadrecipe();
