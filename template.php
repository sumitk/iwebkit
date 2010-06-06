<?php

/**
 * Force refresh of theme registry.
 * DEVELOPMENT USE ONLY - COMMENT OUT FOR PRODUCTION
 */
drupal_rebuild_theme_registry();

function phptemplate_preprocess_views_view__frontpage(&$variables) {
//  print_r($variables);
}

// Custom Theme Settings - CSS file
$custom_css = drupal_get_path('theme', 'iwebkit').'/themes/'.theme_get_setting('iwebkit_theme').'/css/style.css';

drupal_add_css($custom_css, 'theme', 'all', TRUE);

function iwebkit_textfield($element) {
  $size = empty($element['#size']) ? '' : ' size="'. $element['#size'] .'"';
  $maxlength = empty($element['#maxlength']) ? '' : ' maxlength="'. $element['#maxlength'] .'"';
  $class = array('form-text');
  $extra = '';
  $output = '';

  if ($element['#autocomplete_path'] && menu_valid_path(array('link_path' => $element['#autocomplete_path']))) {
    drupal_add_js('misc/autocomplete.js');
    $class[] = 'form-autocomplete';
    $extra =  '<input class="autocomplete" type="hidden" id="'. $element['#id'] .'-autocomplete" value="'. check_url(url($element['#autocomplete_path'], array('absolute' => TRUE))) .'" disabled="disabled" />';
  }
  _form_set_class($element, $class);

  if (isset($element['#field_prefix'])) {
    $output .= '<span class="field-prefix">'. $element['#field_prefix'] .'</span> ';
  }

  $output .= '<ul class="pageitem"><li class="form"><input placeholder="'.$element['#title'].'" type="text"'. $maxlength .' name="'. $element['#name'] .'" id="'. $element['#id'] .'"'. $size .' value="'. check_plain($element['#value']) .'"'. drupal_attributes($element['#attributes']) .' /></li></ul>';

  if (isset($element['#field_suffix'])) {
    $output .= ' <span class="field-suffix">'. $element['#field_suffix'] .'</span>';
  }

  return theme('form_element', $element, $output) . $extra;
}

function iwebkit_password($element) {
  $size = $element['#size'] ? ' size="'. $element['#size'] .'" ' : '';
  $maxlength = $element['#maxlength'] ? ' maxlength="'. $element['#maxlength'] .'" ' : '';

  _form_set_class($element, array('form-text'));
  $output = '<ul class="pageitem"><li class="form"><input placeholder="'.$element['#title'].'" type="password" name="'. $element['#name'] .'" id="'. $element['#id'] .'" '. $maxlength . $size . drupal_attributes($element['#attributes']) .' />';
  return theme('form_element', $element, $output);
}

function iwebkit_textarea($element) {
  $class = array('form-textarea');

  // Add teaser behavior (must come before resizable)
  if (!empty($element['#teaser'])) {
    drupal_add_js('misc/teaser.js');
    // Note: arrays are merged in drupal_get_js().
    drupal_add_js(array('teaserCheckbox' => array($element['#id'] => $element['#teaser_checkbox'])), 'setting');
    drupal_add_js(array('teaser' => array($element['#id'] => $element['#teaser'])), 'setting');
    $class[] = 'teaser';
  }

  // Add resizable behavior
  if ($element['#resizable'] !== FALSE) {
    drupal_add_js('misc/textarea.js');
    $class[] = 'resizable';
  }

  _form_set_class($element, $class);
  return theme('form_element', $element, '<li class="textbox"><textarea cols="'. $element['#cols'] .'" rows="'. $element['#rows'] .'" name="'. $element['#name'] .'" id="'. $element['#id'] .'" '. drupal_attributes($element['#attributes']) .'>'. check_plain($element['#value']) .'</textarea></li>');
}

function iwebkit_button($element) {
  // Make sure not to overwrite classes.
  if (isset($element['#attributes']['class'])) {
    $element['#attributes']['class'] = 'form-'. $element['#button_type'] .' '. $element['#attributes']['class'];
  }
  else {
    $element['#attributes']['class'] = 'form-'. $element['#button_type'];
  }

  return '<ul class="pageitem"><li class="form menu"><input type="submit" '. (empty($element['#name']) ? '' : 'name="'. $element['#name'] .'" ') .'id="'. $element['#id'] .'" value="'. check_plain($element['#value']) .'" '. drupal_attributes($element['#attributes']) ." /></li></ul>\n";
}


function iwebkit_select($element) {
  $select = '';
  $size = $element['#size'] ? ' size="'. $element['#size'] .'"' : '';
  _form_set_class($element, array('form-select'));
  $multiple = $element['#multiple'];
  return theme('form_element', $element, '<ul class="pageitem"><li class="form"><select name="'. $element['#name'] .''. ($multiple ? '[]' : '') .'"'. ($multiple ? ' multiple="multiple" ' : '') . drupal_attributes($element['#attributes']) .' id="'. $element['#id'] .'" '. $size .'>'. form_select_options($element) .'</select><span class="arrow"></span></li></ul>');
}


function iwebkit_radio($element) {
	  _form_set_class($element, array('form-radio'));
	  $output = '<ul class="pageitem"><li class="form"><span class="choice"><span class="name">'.$element['#title'].'</span><input type="radio" ';
	  $output .= 'id="'. $element['#id'] .'" ';
	  $output .= 'name="'. $element['#name'] .'" ';
	  $output .= 'value="'. $element['#return_value'] .'" ';
	  $output .= (check_plain($element['#value']) == $element['#return_value']) ? ' checked="checked" ' : ' ';
	  $output .= drupal_attributes($element['#attributes']) .' /></span></li></ul>';
	  if (!is_null($element['#title'])) {
	    $output = '<label class="option" for="'. $element['#id'] .'">'. $output .' '. $element['#title'] .'</label>';
	  }

	  unset($element['#title']);
	  return theme('form_element', $element, $output);
}

function iwebkit_checkbox($element) {
  _form_set_class($element, array('form-checkbox'));
  $checkbox = '<ul class="pageitem"><li class="form"><span class="check"><span class="name">'.$element['#title'].'</span><input ';
  $checkbox .= 'type="checkbox" ';
  $checkbox .= 'name="'. $element['#name'] .'" ';
  $checkbox .= 'id="'. $element['#id'] .'" ' ;
  $checkbox .= 'value="'. $element['#return_value'] .'" ';
  $checkbox .= $element['#value'] ? ' checked="checked" ' : ' ';
  $checkbox .= drupal_attributes($element['#attributes']) .' /></span></li></ul>';

  if (!is_null($element['#title'])) {
    $checkbox = '<label class="option" for="'. $element['#id'] .'">'. $checkbox .' '. $element['#title'] .'</label>';
  }

  unset($element['#title']);
  return theme('form_element', $element, $checkbox);
}

function iwebkit_item_list($items = array(), $title = NULL, $type = 'ul', $attributes = NULL) {
  $output = '<div class="item-list">';
  if (isset($title)) {
    $output .= '<span class="greytitle">'. $title .'</span>';
  }

  if (!empty($items)) {
    $output .= "<$type". drupal_attributes($attributes) .'>';
    $num_items = count($items);
    foreach ($items as $i => $item) {
      $attributes = array();
      $children = array();
      if (is_array($item)) {
        foreach ($item as $key => $value) {
          if ($key == 'data') {
            $data = $value;
          }
          elseif ($key == 'children') {
            $children = $value;
          }
          else {
            $attributes[$key] = $value;
          }
        }
      }
      else {
        $data = $item;
      }
      if (count($children) > 0) {
        $data .= theme_item_list($children, NULL, $type, $attributes); // Render nested list
      }
      if ($i == 0) {
        $attributes['class'] = empty($attributes['class']) ? 'first' : ($attributes['class'] .' first');
      }
      if ($i == $num_items - 1) {
        $attributes['class'] = empty($attributes['class']) ? 'last' : ($attributes['class'] .' last');
      }
      $output .= '<li'. drupal_attributes($attributes) .'>'. $data ."</li>\n";
    }
    $output .= "</$type>";
  }
  $output .= '</div>';
  return $output;
}


