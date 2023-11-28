<?php

/**
 * @file
 * Provides an additional config form for theme settings.
 */

use Drupal\Core\Extension\Extension;
use Drupal\Core\Extension\ExtensionDiscovery;
use Drupal\system\Controller\ThemeController;
use Drupal\Core\Theme\ThemeManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Form\FormStateInterface;
use Drupal\color\ColorSystemBrandingBlockAlter;
use \Drupal\paragraphs\Entity\Paragraph;
use Drupal\file\Entity\File;


/**
 * Implements hook_form_system_theme_settings_alter() for settings form.
 * 
 */
function consultancy_plus_form_system_theme_settings_alter(array &$form, FormStateInterface $form_state) {

  // include 'color/pannel_color_fields.inc';

  /* Core theme  settings */
  $form['logo']['#group'] = 'visibility';
  $form['logo']['#title'] = t('Logo Image');
  $form['logo']['#weight'] = -995;
  $form['favicon']['#group'] = 'visibility';
  $form['favicon']['#weight'] = -994;

  $form['logo']['#open'] = TRUE;
  $form['favicon']['#open'] = TRUE;
  unset($form['theme_settings']); 
  unset($form['bootstrap_barrio_source']); 

  $form['visibility'] = [
    '#type' => 'vertical_tabs',
    '#title' => t('Healthcare Plus Settings'),
    '#weight' => -999,
  ];
  // General Settings 
  $form['general'] = [
    '#type' => 'details',
    '#title' => t('General Options'),
    '#weight' => -999,
    '#group' => 'visibility',
    '#open' => FALSE,
  ];
  // Loader
  $form['general']['loader-sticky'] = array(
    '#type' => 'fieldset',
    '#title' => t('Page Pre-Loader'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['general']['loader-sticky']['loader'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Pre-Loader'),
    '#default_value' => theme_get_setting('loader'),
  );
  $form['general']['loader-sticky']['back-to-top'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Back To Top'),
    '#default_value' => theme_get_setting('back-to-top'),
  );
  // Blog Page
  $form['general']['blog'] = array(
    '#type' => 'details',
    '#title' => t('Blog Page Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['general']['blog']['pager'] = array(
    '#type' => 'details',
    '#title' => t('Pager'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['general']['blog']['pager']['pager_prev_text'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Previous page link text'),
    '#default_value' => theme_get_setting('pager_prev_text'),
  );
  $form['general']['blog']['pager']['pager_next_text'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Next page link text'),
    '#default_value' => theme_get_setting('pager_next_text'),
  );
  // Cases Page
  $form['general']['case'] = array(
    '#type' => 'details',
    '#title' => t('Case Page Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['general']['case']['pager'] = array(
    '#type' => 'details',
    '#title' => t('Pager'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['general']['case']['pager']['pager_prev_text_2'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Previous page link text'),
    '#default_value' => theme_get_setting('pager_prev_text_2'),
  );
  $form['general']['case']['pager']['pager_next_text_2'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Next page link text'),
    '#default_value' => theme_get_setting('pager_next_text_2'),
  );
  // Portfolio Page
  $form['general']['portfolio'] = array(
    '#type' => 'details',
    '#title' => t('Portfolio Page Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['general']['portfolio']['pager'] = array(
    '#type' => 'details',
    '#title' => t('Pager'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['general']['portfolio']['pager']['pager_prev_text_3'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Previous page link text'),
    '#default_value' => theme_get_setting('pager_prev_text_3'),
  );
  $form['general']['portfolio']['pager']['pager_next_text_3'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Next page link text'),
    '#default_value' => theme_get_setting('pager_next_text_3'),
  );
  // Login page 
  $form['general']['login'] = array(
    '#type' => 'details',
    '#title' => t('Login Page Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['general']['login']['login_banner_title'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Banner Title'),
    '#default_value' => theme_get_setting('login_banner_title'),
  );
  $form['general']['login']['login_banner_image'] = array(
    '#type' => 'managed_file',
    '#title'    => t('Banner Image'),
    '#default_value' => theme_get_setting('login_banner_image'),
    '#upload_location' => 'public://',
  );
  $form['general']['login']['login_title'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Title'),
    '#default_value' => theme_get_setting('login_title'),
  );
  $form['general']['login']['login_name_text'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Name input help text'),
    '#default_value' => theme_get_setting('login_name_text'),
    '#description'   => t("Please enter the help text to show under the user name input."),
  );
  $form['general']['login']['login_pass_text'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Password input help text'),
    '#default_value' => theme_get_setting('login_pass_text'),
    '#description'   => t("Please enter the help text to show under the password input."),
  );
  $form['general']['login']['login_content'] = array(
    '#type'          => 'text_format',
    '#title'         => t('Additonal Content'),
    '#default_value' => theme_get_setting('login_content')['value'],
  );
  $form['general']['login']['login_content_1'] = array(
    '#type'          => 'text_format',
    '#title'         => t('Additonal Content 2'),
    '#default_value' => theme_get_setting('login_content_1')['value'],
  );
  $form['general']['login']['login_bottom_content'] = array(
    '#type'          => 'text_format',
    '#title'         => t('Page Bottom Content'),
    '#default_value' => theme_get_setting('login_bottom_content')['value'],
  );
  $form['general']['login']['login_button_url'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Button Link Url'),
    '#default_value' => theme_get_setting('login_button_url'),
  );
  $form['general']['login']['login_button_title'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Button Link Title'),
    '#default_value' => theme_get_setting('login_button_title'),
  );
  // Register page 
  $form['general']['register'] = array(
    '#type' => 'details',
    '#title' => t('Register Page Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['general']['register']['register_banner_title'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Banner Title'),
    '#default_value' => theme_get_setting('register_banner_title'),
  );
  $form['general']['register']['register_banner_image'] = array(
    '#type' => 'managed_file',
    '#title'    => t('Banner Image'),
    '#default_value' => theme_get_setting('register_banner_image'),
    '#upload_location' => 'public://',
  );
  $form['general']['register']['register_title'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Title'),
    '#default_value' => theme_get_setting('register_title'),
  );
  $form['general']['register']['register_email_text'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Email input help text'),
    '#default_value' => theme_get_setting('register_email_text'),
    '#description'   => t("Please enter the help text to show under the user email input."),
  );
  $form['general']['register']['register_name_text'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Name input help text'),
    '#default_value' => theme_get_setting('register_name_text'),
    '#description'   => t("Please enter the help text to show under the name input."),
  );
  $form['general']['register']['register_content'] = array(
    '#type'          => 'text_format',
    '#title'         => t('Additonal Content'),
    '#default_value' => theme_get_setting('register_content')['value'],
    '#description'   => t("Please enter the content to show under the form."),
  );
  $form['general']['register']['register_bottom_content'] = array(
    '#type'          => 'text_format',
    '#title'         => t('Page Bottom Content'),
    '#default_value' => theme_get_setting('register_bottom_content')['value'],
  );
  $form['general']['register']['register_button_url'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Button Link Url'),
    '#default_value' => theme_get_setting('register_button_url'),
  );
  $form['general']['register']['register_button_title'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Button Link Title'),
    '#default_value' => theme_get_setting('register_button_title'),
  );
  // Reset password page 
  $form['general']['r_pass'] = array(
    '#type' => 'details',
    '#title' => t('Reset Password Page Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['general']['r_pass']['r_pass_banner_title'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Banner Title'),
    '#default_value' => theme_get_setting('r_pass_banner_title'),
  );
  $form['general']['r_pass']['r_pass_banner_image'] = array(
    '#type' => 'managed_file',
    '#title'    => t('Banner Image'),
    '#default_value' => theme_get_setting('r_pass_banner_image'),
    '#upload_location' => 'public://',
  );
  $form['general']['r_pass']['r_pass_title'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Title'),
    '#default_value' => theme_get_setting('r_pass_title'),
  );
  $form['general']['r_pass']['r_pass_email_text'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Email input help text'),
    '#default_value' => theme_get_setting('r_pass_email_text'),
    '#description'   => t("Please enter the help text to show under the user email input."),
  );
  $form['general']['r_pass']['r_pass_bottom_content'] = array(
    '#type'          => 'text_format',
    '#title'         => t('Page Bottom Content'),
    '#default_value' => theme_get_setting('r_pass_bottom_content')['value'],
  );
  $form['general']['r_pass']['re_password_button_url'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Button Link Url'),
    '#default_value' => theme_get_setting('re_password_button_url'),
  );
  $form['general']['r_pass']['re_password_button_title'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Button Link Title'),
    '#default_value' => theme_get_setting('re_password_button_title'),
  );
  // Maintanence and Coming Soon 
  $form['general']['maintenance_mode'] = array(
    '#type' => 'details',
    '#title' => t('Maintenance Mode and Coming Soon Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['general']['maintenance_mode']['mode_type'] = array(
    '#type'        => 'select',
    '#title'       => t('Mode Type'),
    '#options'     => ['1' => t('Maintenance Mode'),'2' => t('Coming Soon')],
    '#default_value' => theme_get_setting('mode_type'),
    '#description'   => t("Please select any one mode to change the content of Maintanence page. If Coming soon mode selected, while site under Maintanence, Coming Soon page content will be displayed"),
  );
  $form['general']['maintenance_mode']['maintenance_mode_tagline'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Maintenance Mode Tagline'),
    '#default_value' => theme_get_setting('maintenance_mode_tagline'),
  );
  $form['general']['maintenance_mode']['maintenance_mode_title'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Maintenance Mode Title'),
    '#default_value' => theme_get_setting('maintenance_mode_title'),
  );
  $form['general']['maintenance_mode']['bg_image_m'] = [
    '#type' => 'managed_file',
    '#title'    => t('Background Image'),
    '#default_value' => theme_get_setting('bg_image_m'),
    '#upload_location' => 'public://',
  ];
  /* Coming Soon */
  $form['general']['maintenance_mode']['comingsoon_tagline'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Comingsoon Mode Tagline'),
    '#default_value' => theme_get_setting('comingsoon_tagline'),
  );
  $form['general']['maintenance_mode']['comingsoon_title'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Comingsoon Mode Title'),
    '#default_value' => theme_get_setting('comingsoon_title'),
  );
  $form['general']['maintenance_mode']['bg_image_c'] = [
    '#type' => 'managed_file',
    '#title'    => t('Background Image'),
    '#default_value' => theme_get_setting('bg_image_c'),
    '#upload_location' => 'public://',
  ];
  $form['general']['maintenance_mode']['date'] = [
    '#type' => 'date',
    '#title' => t('Launch Date'),
    '#default_value' => theme_get_setting('date'),
  ];
  $form['general']['maintenance_mode']['custom_message'] = [
    '#type' => 'textfield',
    '#title' => t('Date expired custom message'),
    '#default_value' => theme_get_setting('custom_message'),
  ];
  // Search Page
  $form['general']['search'] = array(
    '#type' => 'details',
    '#title' => t('Search Page'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['general']['search']['search_banner_title'] = [
    '#type'          => 'textfield',
    '#title'         => t('Search Banner Title'),
    '#default_value' => theme_get_setting('search_banner_title'),
  ];
  $form['general']['search']['search_banner_image'] = [
    '#type' => 'managed_file',
    '#title'    => t('Banner Image'),
    '#default_value' => theme_get_setting('search_banner_image'),
    '#upload_location' => 'public://',
  ];
  // Header Style
  $form['header'] = [
    '#type' => 'details',
    '#title' => t('Header Options'),
    '#weight' => -998,
    '#group' => 'visibility',
    '#open' => FALSE,
  ];
  $form['header']['header_variation'] = [
    '#title' => 'Header', 
    '#type' => 'select',
    '#options' => array(
      'header-1' => 'Header Style 1',
      'header-2' => 'Header Style 2',
      'header-3' => 'Header Style 3',
      'header-4' => 'Header Style 4',
      'header-5' => 'Header Style 5',
    ),
    '#default_value' => theme_get_setting('header_variation'),
    '#description' => t('Please choose your prefered header style'),
  ];
  $form['header']['sticky'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Sticky menu'),
    '#default_value' => theme_get_setting('sticky'),
  );
  $form['header']['Contact Information'] = array(
    '#type' => 'details',
    '#title' => t('Contact Information'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['header']['Contact Information']['email'] = array(
    '#type' => 'details',
    '#title' => t('Email'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['header']['Contact Information']['email']['email_address'] = [
    '#type'          => 'textfield',
    '#title'         => t('E-Mail Address'),
    '#default_value' => theme_get_setting('email_address'),
  ];  
  $form['header']['Contact Information']['contact_num'] = array(
    '#type' => 'details',
    '#title' => t('Contact Number'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['header']['Contact Information']['contact_num']['contact_text'] = [
    '#type'          => 'textfield',
    '#title'         => t('Text'),
    '#default_value' => theme_get_setting('contact_text'),
    '#description'   => t("Please enter the text to show with E-mail address."),
  ];
  $form['header']['Contact Information']['contact_num']['contact_number'] = [
    '#type'          => 'textfield',
    '#title'         => t('Contact Number'),
    '#default_value' => theme_get_setting('contact_number'),
  ];  
  $form['header']['Contact Information']['button'] = array(
    '#type' => 'details',
    '#title' => t('Button'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['header']['Contact Information']['button']['button_text'] = [
    '#type'          => 'textfield',
    '#title'         => t('Text'),
    '#default_value' => theme_get_setting('button_text'),
    '#description'   => t("Please enter the button text."),
  ];
  $form['header']['Contact Information']['button']['button_link'] = [
    '#type'          => 'textfield',
    '#title'         => t('Link'),
    '#default_value' => theme_get_setting('button_link'),
    '#description'   => t("Please enter the button link."),
  ];  
  
  // Footer Section 
  $form['footer'] = array(
    '#type' => 'details',
    '#title' => t('Footer Options'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#group' => 'visibility',
    '#weight' => -997,
  );
  $form['footer']['footer_bg_image'] = [
    '#type' => 'managed_file',
    '#title'    => t('Background Image'),
    '#default_value' => theme_get_setting('footer_bg_image'),
    '#upload_location' => 'public://',
  ];
  $form ['footer']['copyrights'] = array(
  '#type'          => 'text_format',
  '#title'         => t('Copyrights'),
  '#default_value' => theme_get_setting('copyrights')['value'],
  '#description'   => t("Please enter your coptrights content here."),
  );
  // Custom CSS
  $form['custom_css'] = array(
    '#type' => 'details',
    '#title' => t('Custom CSS'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#group' => 'visibility',
    '#open' => FALSE,
    '#weight' => -993,
  );
  $form['custom_css']['styles'] = array(
    '#type'          => 'textarea',
    '#title'         => t('Custom Style'),
    '#default_value' => theme_get_setting('styles'),
    '#description'   => t("Place your custom style for your site."),
  );
  // Color Pannel
  $form['color_options'] = array(
    '#type' => 'details',
    '#title' => t('Color Options'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#group' => 'visibility',
    '#weight' => -992,
  );
  $form['color_options']['default_color'] = [
    '#type' => 'checkbox',
    '#title' => t('Use the Default Color'),
    '#default_value' => theme_get_setting('default_color'),
    '#tree' => FALSE,
  ];
  $form['color_options']['color_settings'] = [
    '#type' => 'container',
    '#states' => [
      // Hide the color settings when using the default color.
      'invisible' => [
        'input[name="default_color"]' => ['checked' => TRUE],
      ],
    ],
  ];
  $form['color_options']['color_settings']['primary_color'] = [
    '#type' => 'color',
    '#title' => t('Select Primary Color'),
    '#default_value' => theme_get_setting('primary_color'),
  ];
  $form['color_options']['color_settings']['secondary_color'] = [
    '#type' => 'color',
    '#title' => t('Select Secondary Color'),
    '#default_value' => theme_get_setting('secondary_color'),
  ];
  $form['#submit'][] = 'consultancy_plus_form_submit';
}
/**
 * Implements hook_form_submit().
 */
function consultancy_plus_form_submit(&$form, $form_state) {
  
  // Footer - Background Image
  if ($file_id = $form_state->getValue(['footer_bg_image', '0'])) {
    $file = \Drupal::entityTypeManager()->getStorage('file')->load($file_id);
    $file->setPermanent();
    $file->save();
  }

  // Login - Banner Image
  if ($file_id = $form_state->getValue(['login_banner_image', '0'])) {
    $file = \Drupal::entityTypeManager()->getStorage('file')->load($file_id);
    $file->setPermanent();
    $file->save();
  }
  // Register - Banner Image
  if ($file_id = $form_state->getValue(['register_banner_image', '0'])) {
    $file = \Drupal::entityTypeManager()->getStorage('file')->load($file_id);
    $file->setPermanent();
    $file->save();
  }
  // Reset Password Banner Image
  if ($file_id = $form_state->getValue(['r_pass_banner_image', '0'])) {
    $file = \Drupal::entityTypeManager()->getStorage('file')->load($file_id);
    $file->setPermanent();
    $file->save();
  }
  // Maintenance - BG Image
  if ($file_id = $form_state->getValue(['bg_image_m', '0'])) {
    $file = \Drupal::entityTypeManager()->getStorage('file')->load($file_id);
    $file->setPermanent();
    $file->save();
  }
  // Coming Soon - BG Image
  if ($file_id = $form_state->getValue(['bg_image_c', '0'])) {
    $file = \Drupal::entityTypeManager()->getStorage('file')->load($file_id);
    $file->setPermanent();
    $file->save();
  }
  // Search - Banner Image
  if ($file_id = $form_state->getValue(['search_banner_image', '0'])) {
    $file = \Drupal::entityTypeManager()->getStorage('file')->load($file_id);
    $file->setPermanent();
    $file->save();
  }
}