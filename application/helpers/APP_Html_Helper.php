<?php

function style($path)
{
    $link = strpos($path, "://") > 0 ? $path : base_url($path);
    return "<link href='{$link}?v=".__app_version."' rel='stylesheet' type='text/css' />";
}

function script($path)
{
    $link = strpos($path, "://") > 0 ? $path : base_url($path);
    return "<script src='{$link}?v=".__app_version."'></script>";
}

function social_meta($social_meta = array())
{
    return "
    <meta property='og:title' content='{$social_meta['title']}' />
    <meta property='og:url' content='{$social_meta['url']}' />
    <meta property='og:image' content='{$social_meta['image']}' />
    <meta property='og:description' content='{$social_meta['description']}' />
  ";
}

function detect_flash_data_classname($controller)
{
    if ($controller->session->flashdata("success")) {
        return "success";
    } elseif ($controller->session->flashdata("info")) {
        return "info";
    } elseif ($controller->session->flashdata("warning")) {
        return "warning";
    } elseif ($controller->session->flashdata("danger")) {
        return "danger";
    } else {
        return "success";
    }
}


function build_main_menu($items = array(), $counter = 0, $hasDropdown = false)
{
    $html = "";
    foreach ($items as $item) {
        $dropdown = !empty($item['items']);
        $html .= "<li " . ($dropdown ? "class='dropdown'" : "") . ">";
        $html .= anchor((!$dropdown ? $item['slug'] : "#"), ($dropdown ? $item['title'] . " <b class='caret'></b>" : $item['title']));
        $html .=!empty($item['items']) ? buildMainMenu($item['items'], $counter + 1, true) : "";
        $html .= "</li>";
    }

    return "<ul " . ($counter === 0 ? "class='nav nav nav-justified menu'" : ($hasDropdown ? "class='dropdown-menu'" : "")) . ">{$html}</ul>";
}

function debug($value)
{
    if (is_array($value)) {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    } else {
        echo $value;
    }

    die();
}

function lookup_breadcrumbs($path, $id)
{
    $pos = strpos($path, $id);
    return substr($path, 0, $pos+strlen($id));
}

function get_pagination_config($size = 'no')
{
    $config['full_tag_open'] = "<ul class='pagination pagination-{$size}'>";
    $config['full_tag_close'] ="</ul>";
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['reuse_query_string'] = true;
    $config['prev_link'] = '&larr;';
    $config['next_link'] = '&rarr;';

    $config['first_link'] = false;
    $config['last_link'] = false;
    return $config;
}


function display_price($ci, $price)
{
    $currency = $ci->config->item('currency');
    return '<span class="app-price"><sup>'.$currency['symbol'].'</sup> '.number_format(($price/100), 2).'</span>';
}


function bootstrap_icon($name, $w = 32, $h = 32, $fill = 'currentColor')
{
    return "<svg class='bi' width='{$w}' height='{$h}' fill='{$fill}'><use xlink:href='bootstrap-icons.svg#{$name}'/></svg>";
}
