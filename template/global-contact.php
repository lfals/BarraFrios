<?php
$setores = get_field("ht_contact_area", "options");
?><div class="contact">
  <div class="contact__wrapper">
    <h2 class="title title--dark contact__title">Envie-nos um E-mail</h2>
    <form class="contact__form" method="post">
      <div class="contact__group">
        <label class="contact__label">
          Nome Completo
          <input
          type="text"
          name="<?php print md5("ht-name") ?>"
          class="contact__field"
          placeholder="Ex: Antônio Rodrigues"
          required>
        </label>
      </div>
      <div class="contact__group">
        <label class="contact__label">
          E-mail
          <input
          type="email"
          name="<?php print md5("ht-email") ?>"
          class="contact__field"
          placeholder="Ex: exemplo@gmail.com"
          required>
        </label>
      </div>
      <div class="contact__group">
        <label class="contact__label">
          Telefone
          <input
          type="tel"
          name="<?php print md5("ht-phone") ?>"
          class="contact__field ht-mask__cel"
          placeholder="Ex: exemplo@gmail.com"
          required>
        </label>
      </div>
      <div class="contact__group contact__group--subject">
        <label class="contact__label">
          Assunto
          <input
          type="text"
          name="<?php print md5("ht-phone") ?>"
          class="contact__field">
        </label>
      </div>
      <div class="contact__group">
       
      </div>
      <div class="contact__group contact__group--message">
        <label class="contact__label">
          Mensagem
          <textarea
          name="<?php print md5("ht-message") ?>"
          class="contact__field contact__field--textarea"
          cols="8"></textarea>
        </label>
      </div>
      <div class="contact__group contact__group--submit">
        <button
        type="submit"
        name="<?php print md5("ht-enviar") ?>"
        class="button contact__submit">Enviar formulário <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22.3187 11.5573L4.61041 3.22401C4.43209 3.1401 4.23363 3.1085 4.03807 3.13288C3.84252 3.15725 3.65788 3.2366 3.50562 3.3617C3.35335 3.48681 3.2397 3.65254 3.17786 3.83966C3.11601 4.02678 3.10852 4.2276 3.15624 4.4188L4.41874 9.46984L12.5 12.5001L4.41874 15.5303L3.15624 20.5813C3.10762 20.7726 3.11449 20.9739 3.17605 21.1615C3.2376 21.3491 3.3513 21.5152 3.50384 21.6406C3.65638 21.7659 3.84146 21.8452 4.03742 21.8692C4.23338 21.8932 4.43213 21.8609 4.61041 21.7761L22.3187 13.4428C22.4977 13.3586 22.649 13.2253 22.755 13.0584C22.861 12.8914 22.9173 12.6978 22.9173 12.5001C22.9173 12.3023 22.861 12.1087 22.755 11.9417C22.649 11.7748 22.4977 11.6415 22.3187 11.5573Z" fill="white"/>
</svg>
 </button>
        <input type="hidden" name="<?php print md5("ht-action") ?>" value="<?php print md5("ht-contato") ?>">
      </div>
    </form>
  </div>
  <div class="ht__global-newsletter">
    <h1>Receba Novidades</h1>
    <p>Cadastre seu contato para receber novidades sempre!</p>
    <input type="text" name="contato" placeholder="E-mail ou Número de Telefone">
    <button>Cadastrar Contato</button>
</div>
</div>
