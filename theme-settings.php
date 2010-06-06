<?php
// $Id$

/**
* Implementation of THEMEHOOK_settings() function.
*
* @param $saved_settings
*   array An array of saved settings for this theme.
* @return
*   array A form array.
*/
function iwebkit_settings($saved_settings) {
  // Set the default values for the theme variables
  $defaults = array(
    'iwebkit_theme' => 'default',
    'iwebkit_menu_type' => 'popup',
  );
  
  // Merge the variables and their default values
  $settings = array_merge($defaults, $saved_settings);
  
  // Layout Type
  $form['iwebkit_theme'] = array(
    '#type' => 'select',
    '#title' => t('Theme Type'),
    '#default_value' => $settings['iwebkit_theme'],
    '#options' => array(
	    'default' => t('Default'),
      'black' => t('Black'),
      'blue' => t('Blue'),
      'brown' => t('Brown'),
      'cyan' => t('Cyan'),
      'gray' => t('Gray'),
      'green' => t('Green'),
      'olive' => t('Olive'),
      'orange' => t('Orange'),
      'pink' => t('Pink'),
      'purple' => t('Purple'),
      'red' => t('Red'),
      'yellow' => t('Yellow'),
    ),
    '#description' => t('This will determine the colour and appearance of your iPhone theme.'),
  );
  
  $form['iwebkit_menu_type'] = array(
    '#type'          => 'select',
    '#title'         => t('Primary Menu Layout'),
    '#default_value' => $settings['iwebkit_menu_type'],
    '#description'   => t('Choose type of primary menu iwebkit theme should show.'),
    '#options'       => array(
                          'popup' => t('Popup menu - a button on top-bar right'),
                          'normal-every' => t('Normal list of menu appearing in page region - On every page'),
                          'normal-front' => t('Normal list of menu appearing in page region - On front page'),
                        ),
  );

  return $form;
}
