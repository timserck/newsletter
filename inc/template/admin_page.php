
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Newsletter</h1>
        <p>Gestionnaire de la newsletter</p>
        
      </div>

      <div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#red" data-toggle="tab">user</a></li>
        <li><a href="#orange" data-toggle="tab">update</a></li>
        <li><a href="#delete" data-toggle="tab">delete</a></li>

    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="red">
            <h2>Liste des utilisateurs</h2>
            <?php foreach ($all_mail as $key => $value) {
             foreach ($all_mail[$key] as $key => $value) {
              echo "<h3>".$key."</h3><p>".$value."</p><hr/>";
             }
            } ?>
           
        </div>
        <div class="tab-pane" id="orange">
            <h2>Mise a jour des utilisateurs</h2>

           <form action="" method="POST">
  
            <div class="form-group">

             <label  for="id">id</label>
            <input class="form-control" type="text" id="id" name="id">
   
          </div>
              <div class="form-group">

           
            <label for="mail">mail</label>
            <input class="form-control" type="mail" id="mail" name="mail">

            </div>
               <div class="form-group">

            <label for="date">date</label>
            <input class="form-control" type="date" id="date" name="date">
            </div>
               <div class="form-group">
            <label for="date">privilege</label>
            <select class="form-control" name="privilege" id="privilege">
              <option value="admin">admin</option>
              <option value="client">client</option>
            </select>
            </div>
               <div class="form-group">
            <input type="submit" value="mettre à jour l'utilisateur" class="btn btn-primary">
             </div>
           </form>
        </div>
        <div class="tab-pane" id="delete">
            <h2>supprimer des utilisateurs</h2>

       <form action="user_delete.php" method="POST">
          <div class="form-group">
              <label  for="id">id</label>
            <input class="form-control" type="text" id="id" name="id">
            </div>
               <div class="form-group">
            <input type="submit" value="supprimer l'utilisateur" class="btn btn-primary">
            </div>
        </form>
        </div>
 
    </div>
</div>