<?php

?>

<script>$('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal');});
</script>
<!-- Modal start-->

<!-- Modal end-->

<script>$('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal');});
 </script>
<!-- Modal start-->

<!-- Modal end-->

<script>$('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal');});
  </script>
<nav class="navbar navbar-olive-dark" id="navbar_h" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar_id">
        <span class="sr-only couleur">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
      </button> 
      <a class="navbar-brand couleur" href="index.php?page=accueil"><i class="fa fa-home "></i> PIAP jeune</a>
      <a class="navbar-brand couleur" href="index.php"><i class="fa fa-info"></i> Qui sommes nous?</a>

      <span>
        <a data-toggle="dropdown" href="javascript:void(0);" id="ddshort" class="navbar-brand couleur" aria-expanded="true"><i class="fa fa-bars"></i>&nbsp;<span class="hidden-sm hidden-md reverse"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quelle problématique?</font></font></span><span class="caret"></span></a>

        <ul class="dropdown-menu liste_problematiques">
          <li><a href="index.php?page=recherche_structure&prob=harcelement">Harcelement</a></li>
          <li><a href="index.php?page=recherche_structure&prob=consomation">Consomation</a></li>
        </ul>
      </span>
    </div>
    <div class="collapse navbar-collapse" id="navbar_id">
      <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav navbar-left">
          <li>
            <form class="navbar-form-expanded navbar-form" role="search">
              <div class="input-group">
                <span class="input-group-btn"> 
                  <button class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                </button>
                </span>
                <input class="form-control" type="text" placeholder="Rechercher" />
              </div>
            </form>
          </li>
        </ul>
      </ul>
    </div>
  </div>
</nav>
<script src="./js/meganavbar_h.js"></script>