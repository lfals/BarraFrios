    </main>
    <?php wp_footer(); ?>
    <?php if( function_exists('acf_add_options_page') ) {
        $scriptFim = get_field('ht_site_scripts_fim', 'option');
        if (!empty($scriptFim)) echo $scriptFim;
    } ?>
    <?php
      if(!empty($_SESSION["success"]))
      {
        ?>
        <script type="text/javascript">
        Swal.fire(
          'Tudo certo!',
          '<?php print $_SESSION["success"]; ?>',
          'success'
        )
        </script>
        <?php

        $_SESSION["success"] = null;
        unset($_SESSION["success"]);
      }
    ?>
</body>
</html>
