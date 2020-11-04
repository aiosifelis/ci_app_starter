<!doctype html>
<html lang="en">

<head>
    <title>
        <?=isset($this->data['page_title']) ? $this->data['page_title'] : __app_name; ?>
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
      if (isset($this->data['social_meta'])) {
          echo social_meta($this->data['social_meta']);
      }
    ?>

    <?php $this->load->view('components/styles'); ?>

</head>

<body>

    <input type='hidden' name='ui_client_date_format'
        value='<?=$this->config->item('ui_client_date_format'); ?>' />
    <input type='hidden' name='ui_date_format'
        value='<?=$this->config->item('ui_date_format'); ?>' />
    <input type='hidden' name='ui_datetime_format'
        value='<?=$this->config->item('ui_datetime_format'); ?>' />
    <input type='hidden' name='request_id'
        value='<?=$this->request_id; ?>' />
    <input type='hidden' name='root-url'
        value='<?=$this->config->item('base_url'); ?>' />
    <input type='hidden' name='global-mask-text'
        value='<?=$this->lang->trans('global_mask_default_text'); ?>' />
    <div id='app'>
        <?php
            $this->load->view($this->data['view']);
        ?>
    </div>
    <div class='app-global-mask'>
        <h1 class='text-center text-300'></h1>
    </div>
    <?php $this->load->view('components/scripts'); ?>
</body>

</html>