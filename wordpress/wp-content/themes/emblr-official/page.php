<?php

	// Usamos variable global $post y hacemos una redirección a la página principal + slug en el hashtag.
	echo header( 'Location: ' . get_site_url() . '#' . $post->post_name )
	
?>