<?php
/*
Plugin Name: Quick Chat Button
Description: Hiển thị nút chat nhanh với Messenger và Zalo trên website.
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit; // Ngăn truy cập trực tiếp
}

// Đăng ký shortcode
add_shortcode('quick_chat', 'qcb_display_chat_button');

// Hàm hiển thị nút chat nhanh
function qcb_display_chat_button($atts) {
    $atts = shortcode_atts([
        'messenger' => get_option('qcb_messenger', ''),
        'zalo' => get_option('qcb_zalo', ''),
        'label' => get_option('qcb_label', 'Chat ngay'),
        'messenger_color' => get_option('qcb_messenger_color', '#007bff'),
        'zalo_color' => get_option('qcb_zalo_color', '#00a884'),
        'text_color' => get_option('qcb_text_color', '#ffffff'),
    ], $atts);

    $html = '<div class="quick-chat-button" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">';

    if (!empty($atts['messenger'])) {
        $html .= '<a href="' . esc_url($atts['messenger']) . '" target="_blank" class="quick-chat-link" style="background-color: ' . esc_attr($atts['messenger_color']) . '; color: ' . esc_attr($atts['text_color']) . '; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: block; margin-bottom: 5px;">';
        $html .= '<i class="fab fa-facebook-messenger"></i> ' . esc_html($atts['label']);
        $html .= '</a>';
    }

    if (!empty($atts['zalo'])) {
        $html .= '<a href="https://zalo.me/' . esc_attr($atts['zalo']) . '" target="_blank" class="quick-chat-link" style="background-color: ' . esc_attr($atts['zalo_color']) . '; color: ' . esc_attr($atts['text_color']) . '; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: block;">';
        $html .= '<i class="fas fa-comments"></i> ' . esc_html($atts['label']);
        $html .= '</a>';
    }

    $html .= '</div>';

    return $html;
}

// Tự động hiển thị nút chat trên website
add_action('wp_footer', function() {
    echo do_shortcode('[quick_chat]');
});

// Đăng ký Font Awesome
function qcb_enqueue_styles() {
    wp_enqueue_style('qcb-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'qcb_enqueue_styles');

// Thêm menu cài đặt vào WordPress Admin
add_action('admin_menu', function() {
    add_menu_page('Quick Chat Settings', 'Quick Chat', 'manage_options', 'quick-chat-settings', 'qcb_settings_page', 'dashicons-format-chat', 100);
});

// Hiển thị trang cài đặt
function qcb_settings_page() {
    ?>
    <div class="wrap">
        <h1>Cài đặt Nút Chat Nhanh</h1>
        <form method="post" action="options.php">
            <?php settings_fields('qcb_settings_group'); do_settings_sections('quick-chat-settings'); submit_button(); ?>
        </form>
    </div>
    <?php
}

// Đăng ký cài đặt
add_action('admin_init', function() {
    register_setting('qcb_settings_group', 'qcb_messenger');
    register_setting('qcb_settings_group', 'qcb_zalo');
    register_setting('qcb_settings_group', 'qcb_label');
    register_setting('qcb_settings_group', 'qcb_messenger_color');
    register_setting('qcb_settings_group', 'qcb_zalo_color');
    register_setting('qcb_settings_group', 'qcb_text_color');

    add_settings_section('qcb_settings_section', 'Cấu hình Nút Chat', function() { echo '<p>Cấu hình các tùy chọn cho nút chat nhanh.</p>'; }, 'quick-chat-settings');

    add_settings_field('qcb_messenger', 'Link Messenger', function() {
        echo '<input type="text" name="qcb_messenger" value="' . esc_attr(get_option('qcb_messenger', '')) . '" class="regular-text">';
    }, 'quick-chat-settings', 'qcb_settings_section');

    add_settings_field('qcb_zalo', 'Số Zalo', function() {
        echo '<input type="text" name="qcb_zalo" value="' . esc_attr(get_option('qcb_zalo', '')) . '" class="regular-text">';
    }, 'quick-chat-settings', 'qcb_settings_section');

    add_settings_field('qcb_label', 'Nội dung nút', function() {
        echo '<input type="text" name="qcb_label" value="' . esc_attr(get_option('qcb_label', 'Chat ngay')) . '" class="regular-text">';
    }, 'quick-chat-settings', 'qcb_settings_section');

    add_settings_field('qcb_messenger_color', 'Màu nền Messenger', function() {
        echo '<input type="color" name="qcb_messenger_color" value="' . esc_attr(get_option('qcb_messenger_color', '#007bff')) . '">';
    }, 'quick-chat-settings', 'qcb_settings_section');

    add_settings_field('qcb_zalo_color', 'Màu nền Zalo', function() {
        echo '<input type="color" name="qcb_zalo_color" value="' . esc_attr(get_option('qcb_zalo_color', '#00a884')) . '">';
    }, 'quick-chat-settings', 'qcb_settings_section');

    add_settings_field('qcb_text_color', 'Màu chữ', function() {
        echo '<input type="color" name="qcb_text_color" value="' . esc_attr(get_option('qcb_text_color', '#ffffff')) . '">';
    }, 'quick-chat-settings', 'qcb_settings_section');
});
