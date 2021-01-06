<form class="blog__search"  method="get" >
  <div class="search__field">
    <label class="galeria__search">
      <i class="fas fa-search galeria__search--icon"></i>
      <input type="text" class="galeria__search--field" name="s" id="s" value="<?php print $_GET["s"]; ?>">
    </label>
  </div>
  <div class="search__field">
    <button type="submit" name="<?php print md5("ht-submit-search") ?>" class="search__button">Pesquisar</button>
  </div>
</form>
