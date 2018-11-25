<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	</main><!-- #site-content -->

	<footer id="site-footer" role="contentinfo">
	</footer><!-- #site-footer -->

	<!-- js -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/script.js') ?>"></script>

<script type="text/javascript">
/*   function resizeIframe(obj){
     obj.style.height = 0;
     obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  } */

$('.iframe_stgx').on('load', function(){
    this.style.height=parent.contentDocument.body.scrollHeight +'px';
});

</script>
<footer class="footer-home">
	footer
</footer>

</body>
</html>