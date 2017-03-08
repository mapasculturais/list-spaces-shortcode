<?php
/*
Plugin Name: List Spaces Shortcode
Plugin URI: 
Description: Lista espaços da API de Culturaenlinea.uy
Author: leogermani
Version: 1.0
Text Domain:
*/

class ListSpacesShortcode {


    function ListSpacesShortcode() {
    
        add_shortcode('list_spaces', array(&$this, 'shortcode'));
        add_action( 'wp_enqueue_scripts', array(&$this, 'addCSS') );
        
    }
    
    function addCSS() {
        wp_enqueue_style( 'list-spaces-shortcode', plugin_dir_url( __FILE__ ) . '/list-spaces.css' );
    }
    
    function get_api_url() {
        
        // no futuro isso pode ser uma opção
        return 'http://culturaenlinea.uy/api/space/find';
        
    }
    
    function getSpaces($params) {
    
        // implementar cache
        
        $url = add_query_arg($params, $this->get_api_url());
        
             
        $response = wp_remote_get( $url, array('timeout' => 20) );

        return wp_remote_retrieve_response_code($response) == 200 ? wp_remote_retrieve_body($response) : false;
    
    }
    
    function maybePrintAvatar($space) {
        
        if (isset($space->{'@files:avatar.avatarMedium'}) && is_object($space->{'@files:avatar.avatarMedium'}) && isset($space->{'@files:avatar.avatarMedium'}->url)) {
            echo "<img src='".$space->{'@files:avatar.avatarMedium'}->url."' />";
        }
        
    }
    
    function shortcode($atts, $content) {
		
        //if (!is_array($atts)) return;
        
		#$ids = $atts['ids'];
		#$tag = $atts['tag'];
        
        $params = [
            '@select' => 'id,name,shortDescription,En_Estado,singleUrl,type,endereco',
            '@files' => '(avatar.avatarMedium):url'
        ];
        
        if (isset($atts['ids'])) {
            $params['id'] = 'IN(' . $atts['ids'] . ')';
        }
        
        if (isset($atts['departamento'])) {
            $params['En_Estado'] = 'EQ(' . $atts['departamento'] . ')';
        }
        
        $result = $this->getSpaces($params);
        
        if (false === $result)
            return;
        
        $spaces = json_decode($result);
        
        ob_start();
        
        include('template.php');
        
        $html = ob_get_clean();
        
        return $html;
		
	}

}

add_action('init', function() {
    $ListSpacesShortcode = new ListSpacesShortcode;
});


?>
