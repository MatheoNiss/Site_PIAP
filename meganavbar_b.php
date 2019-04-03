<?php
if(isset($_GET['page'])) $page = '?page=' . $_GET['page'];
else $page = '';
?>
<nav class="navbar navbar-inverse navbar-fixed-bottom meganav_b" role="navigation">
 <div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->

  <?php if(!$adminMode){ ?>

   <ul class="nav navbar-nav navbar-left">
    <li class="dropdown-grid">
      <a class="dropdown-toggle hidden-xs" href="javascript:;" data-toggle="dropdown"><i class="fa fa-lock"></i><span class="caret"></span></a>
     <div class="dropdown-grid-wrapper" role="menu">
      <ul class="dropdown-menu hidden-xs col-sm-10 col-md-8 col-lg-7 formulaire_connection">
       <li>
        <div class="carousel slide" id="carousel-example-account">
         <div class="row">
          <div class="col-lg-1 col-md-1 col-sm-1"></div>
          <div class="col-lg-10 col-md-10 col-sm-10">
           <div class="carousel-inner">
            <div class="item active">
             <h3 class="text-right">
              <i class="fa fa-lock"></i> Connection
             </h3><br />
             <form class="form-horizontal" role="form" method="post" action="login.php<?=$page?>" >
              <div class="form-group">
               <label class="col-sm-3 control-label" for="inputEmail3">
                Nom d'utilisateur
               </label>
               <div class="col-sm-9">
                <input class="input-sm form-control" id="inputEmail3" type="text" name="login" />
               </div>
              </div>
              <div class="form-group">
                
               <label class="col-sm-3 control-label mdp" for="inputPassword3">
                Mot de passe
               </label>
               <div class="col-sm-9">
                <input class="input-sm form-control" id="inputPassword3" type="password" name="mdp" />
               </div>
              </div>
              <div class="form-group">
               <div class="col-sm-offset-3 col-sm-9">         
                <button class="btn btn-default pull-right" type="submit">
                 <i class="fa fa-unlock-alt"></i> Connection
                </button>
               </div>
              </div>
             </form>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
           </div>
          </div>
         </div>
        </div>
       </li>
      </ul>
     </div>
    </li>
   </ul>

  <?php }else{ ?>
   <a class="navbar-link navbar-left" href="index.php?page=accueil&deconnect=yes"><i class="fa fa-unlock-alt"></i> <span>Déconnection</span></a>
  <?php } ?>

   <a class="navbar-link navbar-left" href="#"><i class="fa fa-gavel"></i> <span>Mentions légales</span></a>

   <div class="nav navbar-nav navbar-right copyright">
    <i class="fa fa-copyright"></i> Niss Mathéo - 2018/2019
   </div>
  </div>
 </div>
</nav>
