<?php
/**
 * Fotofolio 1.0.6
 * Moozaic
 * http://ich.schrei.be
 */

$themename = 'BohemeStudio 3.0';
$shortname = 'ftfl';

$options = array (
	array(  "name" => "Title",
            "desc" => "the title of your fotofolio website",
            "id"   => $shortname."_welcome_title",
            "std"  => $themename,
            "type" => "text"),
	array(  "name" => "Logo",
            "desc" => "Enter URL for your Logo",
            "id"   => $shortname."_welcome_logo",
            "std"  => wptp_getopt('home_logo', 0),
            "type" => "text"),
	array(  "name" => "Message",
            "desc" => "Brief introduction into your fotofolio theme",
            "id"   => $shortname."_welcome_message",
            "std"  => wptp_getopt('home_msg', 0),
            "type" => "textarea"),
	array(  "name" => "Full Name",
            "desc" => "your Full Name eg. Pupung Budi Purnama",
            "id"   => $shortname."_full_name",
            "std"  => wptp_getopt('author', 0),
            "type" => "text"),
	array(  "name" => "Short Biography",
            "desc" => "Your short biography",
            "id"   => $shortname."_short_bio",
            "std"  => wptp_getopt('bio', 0),
            "type" => "textarea"),
	array(  "name" => "Your Email",
            "desc" => "your email, for displaying gravatar, register in gravatar.com",
            "id"   => $shortname."_email",
            "std"  => wptp_getopt('email', 0),
            "type" => "text"),
	array(  "name" => "Homepage Slideshow",
            "desc" => "Category to play on homepage slideshow",
            "id"   => $shortname."_home_slideshow",
            "std"  => wptp_getopt('slide_cat', 0),
            "type" => "select",
            "options" => mooz_get_categories()),
	array(  "name" => "Slideshow Number",
            "desc" => "Number of Slideshow, Best is 5, Think about loading time!",
            "id"   => $shortname."_num_slideshow",
            "std"  => wptp_getopt('slide_num', 0),
            "type" => "select",
            "options" => array('1' => "1","2","3","4","5","6","7")),
	array(  "name" => "Latest Additions number",
            "desc" => "Latest additions number show on homepage",
            "id"   => $shortname."_num_latest",
            "std"  => wptp_getopt('latest_num', 0),
            "type" => "select",
            "options" => array('1' => "1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16")),
    array ( "name" => "JS RollOver OFF",
            "desc" => "Turn OFF JavaScript rollover effect",
            "id"   => $shortname."_norollover_js",
            "std"  => wptp_getopt('norolljs', 0),
            "type" => "checkbox"),
	array(  "name" => "Enable Comment",
            "desc" => "Enable Comment Feature",
            "id"   => $shortname."_comment",
            "std"  => wptp_getopt('comment', 0),
            "type" => "checkbox"),
    array ( "name" => "TimThumb Use URL",
            "desc" => "Use URL to generate image. Try switching this option if you have problem displaying image<br />Default is to use <strong>PATH</strong> (recommended)",
            "id"   => $shortname."_timthumb_url",
            "std"  => wptp_getopt('tim_url', 0),
            "type" => "checkbox"),
	array(  "name" => "Image Resize",
            "desc" => "MAX WIDTH - To calculate aspect ratio. If set to 0, it will use default value, which is <strong>450</strong>px",
            "id"   => $shortname."_resize_width",
            "std"  => wptp_getopt('img_width', 0),
            "type" => "text"),
	array(  "name" => "",
            "desc" => "MAX HEIGHT - To calculate aspect ratio. If set to 0, it will use default value, which is <strong>600</strong>px",
            "id"   => $shortname."_resize_height",
            "std"  => wptp_getopt('img_height', 0),
            "type" => "text"));

$tmp_array = array (
    array ( "name" => "Show Properties",
            "desc" => "EXIF: Camera Model",
            "id"   => $shortname."_exif_cam",
            "std"  => 0,
            "type" => "checkbox"),
    array ( "name" => "",
            "desc" => "EXIF: Exposure",
            "id"   => $shortname."_exif_shu",
            "std"  => 0,
            "type" => "checkbox"),
    array ( "name" => "",
            "desc" => "EXIF: Aperture",
            "id"   => $shortname."_exif_ape",
            "std"  => 0,
            "type" => "checkbox"),
    array ( "name" => "",
            "desc" => "EXIF: Focal Length",
            "id"   => $shortname."_exif_foc",
            "std"  => 0,
            "type" => "checkbox"),
    array ( "name" => "",
            "desc" => "EXIF: ISO Speed",
            "id"   => $shortname."_exif_iso",
            "std"  => 0,
            "type" => "checkbox"));

if(extension_loaded('exif'))
    $options = mooz_load_exif_option();

function mooz_fotofolio_init() {
    global $themename, $shortname, $options;
    if(isset($_GET['page']) && $_GET['page'] == basename( __FILE__ )) {
        if(isset($_REQUEST['action']) && 'save' == $_REQUEST['action']) {
            check_admin_referer('fotofolio-setting');
            foreach($options as $value) {
                if(isset($_REQUEST[$value['id']]))
                    update_option($value['id'], $_REQUEST[$value['id']]);
                else
                    delete_option($value['id']);
            }
            header("Location: themes.php?page=functions.php&saved=true");
            die;
        } elseif(isset($_REQUEST['action']) && 'reset' == $_REQUEST['action']) {
            check_admin_referer('fotofolio-setting');
            foreach($options as $value) {
                delete_option($value['id']);
            }
            header("Location: themes.php?page=functions.php&reset=true");
            die;
        }
    }
    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename( __FILE__ ), 'fotofolio_panel');
}

function mooz_load_exif_option() {
    global $options, $tmp_array;
    for($i = 0; $i < count($tmp_array); ) { $options[] = $tmp_array[$i]; $i++; }
    return $options;
}

function fotofolio_panel() {
    global $themename, $shortname, $options;
    if(isset($_REQUEST['saved']) && ($_REQUEST['saved'])) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if(isset($_REQUEST['reset']) && ($_REQUEST['reset'])) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>
<form method="post">
<?php wp_nonce_field('fotofolio-setting'); ?>
        <table width="100%" border="0" style="background-color:#efefef; padding:5px 10px;">
            <tr>
                <td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;">Theme Settings</h3></td>
            </tr>
            <table width="100%" border="0" style="padding:10px;">
                <tr>
                    <td width="20%" rowspan="1" style="padding-top:10px" valign="middle"></td>
                </tr>
<?php foreach($options as $value) {
    switch ($value['type']) {
        case 'text': ?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if(get_option($value['id']) != "") { echo trim(stripcslashes(strip_tags(get_option($value['id'])))); } else { echo $value['std']; } ?>" /></td>
        </tr>
        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr>
        <tr>
            <td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
		<?php break;
		case 'textarea': ?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:100px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if(get_option($value['id']) != "") { echo trim(stripcslashes(get_option($value['id']))); } else { echo $value['std']; } ?></textarea></td>
        </tr>
        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr>
        <tr>
        <td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
		<?php break;
		case 'select': ?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php $default = $value['std']; if(!get_option($value['id'])) { $selected = $default; } else { $selected = get_option($value['id']); } foreach($value['options'] as $key => $val) { ?><option value="<?php echo $val ?>"<?php if($val == $selected) echo 'selected="selected"'; ?>><?php echo $key; ?></option><?php } ?></select></td>
        </tr>
        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr>
        <tr>
            <td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <?php break;
        case "checkbox": ?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else { $checked = ''; } ?>
            <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="1" <?php echo $checked; ?> />
            </td>
        </tr>
        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr>
        <tr>
            <td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <?php break;
        }
    } ?>
        <tr>
            <td width="20%" style="padding-top:10px" valign="middle"><input type="submit" name="save" value=" Save Changes " class="button-primary" /><input type="hidden" name="action" value="save" /></form></td>
            <td width="80%" style="padding-top:10px" valign="middle"><form method="post"><?php wp_nonce_field('fotofolio-setting'); ?><input name="reset" id="reset" type="submit" value="Reset" class="button" /><input type="hidden" name="action" id="reset" value="reset" /></form></td>
        </tr>
        </table><br />
<!--</table>-->
<p class="donate">
<strong>Enjoying the theme? Please <a href="http://wordspop.com/donate/" target="_blank">donate the author.</a></strong>
</p>
<?php
}

function wptp_has_img() {
	global $id;
	$post_id = (int) $id;
    $attachment_id = wptp_get_image_attachment($post_id);
    if(empty($attachment_id))
        return false;
    return true;
}

function wptp_getopt($what, $echo = true) {
    global $shortname, $themename, $version;
    if(empty($what)) return;
    switch($what) {
        case 'header_desc';
            $data = get_option('blogdescription');
            if(empty($data)) $data = '&nbsp;';
        break;
        case 'home_title':
            $data = trim(stripcslashes(get_option($shortname.'_welcome_title')));
            if(empty($data)) $data = get_option('blogname');
        break;
        case 'home_logo':
            $data = get_option($shortname.'_welcome_logo');
            if(empty($data)) $data = get_template_directory_uri().'/images/logo.png';
        break;
        case 'home_msg':
            $data = trim(stripcslashes(get_option($shortname.'_welcome_message')));
            if(empty($data)) $data = 'Welcome to '.wptp_getopt('author', 0).' blog!';
        break;
        case 'author':
            $data = trim(stripcslashes(strip_tags(get_option($shortname.'_full_name'))));
            if(empty($data)) $data = "Author Name";
        break;
        case 'email':
            $data = strip_tags(get_option($shortname.'_email'));
            if(empty($data)) $data = 'youname@youremail.com';
        break;
        case 'bio':
            $data = trim(stripcslashes(get_option($shortname.'_short_bio')));
            if(empty($data)) $data = 'Author information';
        break;
        case 'slide_cat':
            $data = (int) get_option($shortname.'_home_slideshow');
            if(empty($data)) $data = 1;
        break;
        case 'slide_num':
            $data = (int) get_option($shortname.'_num_slideshow');
            if(empty($data)) $data = 2;
        break;
        case 'latest_num':
            $data = (int) get_option($shortname.'_num_latest');
            if(empty($data)) $data = 4;
        break;
        case 'norolljs':
            $data = (int) get_option($shortname.'_norollover_js');
            if(empty($data)) $data = 0;
        break;
        case 'comment':
            $data = (int) get_option($shortname.'_comment');
            if(empty($data)) $data = 0;
        break;
        case 'tim_url':
            $data = (int) get_option($shortname.'_timthumb_url');
            if(empty($data)) $data = 0;
        break;
        case 'img_width':
            $data = (int) get_option($shortname.'_resize_width');
            if(empty($data) || 0 == $data) $data = 450;
        break;
        case 'img_height':
            $data = (int) get_option($shortname.'_resize_height');
            if(empty($data) || 0 == $data) $data = 600;
        break;
    }
    if($echo)
        echo $data;
    return $data;
}

function mooz_get_categories() {
    $ftfl_categories = get_categories();
    $ftfl_categories_list = array();
    foreach( $ftfl_categories as $ftflcat ){
        $ftfl_categories_list[$ftflcat->name] = $ftflcat->cat_ID;
    }
    return $ftfl_categories_list;
}

/* Forget to mention. This code was originally taken from Exifer library (Jake Olefsky). */
function ConvertToFraction($v, &$n, &$d) {
    $MaxTerms = 15;
    $MinDivisor = 0.000001;
    $MaxError = 0.00000001;
    $f = $v;
    $n_un = 1;
    $d_un = 0;
    $n_deux = 0;
    $d_deux = 1;
    for($i = 0; $i<$MaxTerms; $i++) {
        $a = floor($f);
        $f = $f - $a;
        $n = $n_un * $a + $n_deux;
        $d = $d_un * $a + $d_deux;
        $n_deux = $n_un;
        $d_deux = $d_un;
        $n_un = $n;
        $d_un = $d;
        if($f < $MinDivisor)
            break;
        if(abs($v - $n/$d) < $MaxError)
            break;
        $f = 1 / $f;
	}
}

function mooz_get_meta($attachment_id) {
    global $shortname;
    $metas = array();
    $attachment_id = (int) $attachment_id;
    if(!$attachment_id) return $metas;
    $imgmt = wp_get_attachment_metadata($attachment_id);
    if(empty($imgmt['image_meta'])) return $metas;

    if(get_option($shortname.'_exif_cam')) {
        $metas['cam'] = array(
            "key" => "Camera",
            "val" => $imgmt['image_meta']['camera']);
    }
    if(get_option($shortname.'_exif_shu')) {
        $xshu = $imgmt['image_meta']['shutter_speed'];
        if($xshu > 1) $xshu = floor($xshu);
        if($xshu > 0) {
            $n=0; $d=0;
            ConvertToFraction($xshu, $n, $d);
            if($n >= 1 && $d == 1) $num = $n;
            else $num = $n.'/'.$d;
        } else {
            $num = $num;
        }
        $metas['shu'] = array(
            "key" => "Exposure",
            "val" => $xshu." sec (".$num.")");
    }
    if(get_option($shortname.'_exif_ape')) {
        $metas['ape'] = array(
            "key" => "Aperture",
            "val" => 'f/'.$imgmt['image_meta']['aperture']);
    }
    if(get_option($shortname.'_exif_foc')) {
        $metas['foc'] = array(
            "key" => "Focal Length",
            "val" => $imgmt['image_meta']['focal_length'].' mm');
    }
    if(get_option($shortname.'_exif_iso')) {
        $metas['iso'] = array(
            "key" => "ISO speed",
            "val" => $imgmt['image_meta']['iso']);
    }
    if(count($metas) > 0) {
        foreach($metas as $value) {
	        echo "<strong>".$value['key'].":</strong> ".$value['val']."<br />";
        }
    }
}

function mooz_get_ratio($id, $max_width = '', $max_height = '') {
	$img_data = wp_get_attachment_metadata($id);
	if(empty($img_data) || 0 == $img_data) return false;
	$width = $img_data['width'];
	$height = $img_data['height'];
    if($max_width > $width) $max_width = $width;
    if($max_height > $height) $max_height = $height;
    $xscale = $width/$max_width;
    $yscale = $height/$max_height;
    if($yscale > $xscale) {
        $new_width  = round($width * (1/$yscale));
        $new_height = round($height * (1/$yscale));
    } else {
        $new_width  = round($width * (1/$xscale));
        $new_height = round($height * (1/$xscale));
    }
    return array('w' => $new_width, 'h' => $new_height);
}

function mooz_get_base_path($id) {
    $doc_root = $_SERVER['DOCUMENT_ROOT'];
    $doc_root = str_replace('\\', '/', $doc_root);
    $xpath = get_attached_file($id);
    $xpath = str_replace('\\', '/', $xpath);
    return $base_img = str_replace($doc_root, '', $xpath);
}

function mooz_get_base_url($id) {
	global $wpdb;
	$post_id = (int) $id;
    return $url = $wpdb->get_var("SELECT guid FROM $wpdb->posts WHERE ID = $post_id");
}

function wptp_get_image_attachment($post_id) {
    global $wpdb;
    $post_id = (int) $post_id;
    if(0 == $post_id) return;
    return $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_parent = $post_id AND post_type = 'attachment' AND post_mime_type LIKE 'image%' ORDER BY post_date ASC LIMIT 1");
}

function mooz_image_predata($post_id) {
	$post_id = (int) $post_id;
	if(!$post_id) return false;
	$max_width = wptp_getopt('img_width', 0);
	$max_height = wptp_getopt('img_height', 0);
	$switch = wptp_getopt('tim_url', 0);
    $image['id'] = wptp_get_image_attachment($post_id);
    if(empty($image['id'])) return false;
    if(empty($switch))
        $image['path'] = mooz_get_base_path($image['id']);
    else
        $image['path'] = mooz_get_base_url($image['id']);
    $image['size'] = mooz_get_ratio($image['id'], $max_width, $max_height);
    if(false == $image['size'])
        return false;
    return $image;
}

add_action('admin_menu', 'mooz_fotofolio_init');
/*Activation to display thumbnails*/
add_theme_support('post-thumbnails');

/*Crop medium size thumbnails instead of keep proportions*/
if(false === get_option("medium_crop")) {
    add_option("medium_crop", "1");
} else {
    update_option("medium_crop", "1");
}

?>