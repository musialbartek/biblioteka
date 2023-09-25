<?php
    require_once('partials/_head.php');
    require_once('partials/_body.php');
?>

<div class="container h-100 text-center">
  <h1 class="napisTytuł">Panel zarządzania książkami</h1>
  <div class="users-table">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Lp.</th>
          <th scope="col">Tytuł</th>
          <th scope="col">Imię</th>
          <th scope="col">Nazwisko</th>
          <th scope="col">Rok wyd.</th>
          <th scope="col">Nr ISBN</th>
          <th scope="col">Wybór</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Przygoda na skraju</td>
          <td>Wojciech</td>
          <td>Sczęsny</td>
          <td>1985</td>
          <td>ISBN-2564</td>
          <td><input name="check" type="radio" /></td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Skrajnie ale ładnie</td>
          <td>Clara</td>
          <td>Jackson</td>
          <td>2013</td>
          <td>ISBN-2562</td>
          <td><input name="check" type="radio" /></td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Ciągle iść</td>
          <td>Stephen</td>
          <td>Curry</td>
          <td>1115</td>
          <td>ISBN-25232</td>
          <td><input name="check" type="radio" /></td>
        </tr>
      </tbody>
    </table>
    <div class="d-flex justify-content-end">
      <button class="btn btn-primary mr-2" type="button">Usuń</button>
      <button class="btn btn-primary mr-2" type="button">Edytuj</button>
      <button class="btn btn-primary" type="button">
        Dodaj nową książkę
      </button>
    </div>
  </div>
</div>

<?php
    require_once('partials/_bodyEnd.php');
    require_once('partials/_headEnd.php');
?>