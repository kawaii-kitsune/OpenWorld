<?php require 'controller/connDB.php'; ?>
<aside class="menu column is-3 mt-0" >
  <p class="menu-label has-text-centered">
    General
  </p>
  <ul class="menu-list is-centered">
    <li><a class="button is-link  is-light navbar-item my-1" id="control-add">Add A Point</a></li>
    <li><a class=" navbar-item button is-link  is-light my-1" id="control-add">show Pins</a></li>
  </ul>
  <p class="menu-label has-text-centered">
    Administration
  </p>
  <ul class="menu-list is-centered " id="pins-view">
    <div class="overflow-scroll">
      <?php require 'views/removePinPoints.php' ?>
    </div>
  
</ul>
</aside>

