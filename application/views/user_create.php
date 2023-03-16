<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Codeigniter MongoDB Create Read Update Delete Example</title>
</head>

<body>
    <div id="container">
        <h1>Codeigniter MongoDB Create Read Update Delete Example</h1>

        <div>
            <?php echo anchor('/usercontroller', 'Back to Users'); ?>
        </div>

        <div id="body">
            <?php
            if (isset($error)) {
                echo '<p style="color:red;">' . $error . '</p>';
            } else {
                echo validation_errors();
            }
            ?>

            <?php
            $attributes = array('name' => 'form', 'id' => 'form');
            echo form_open($this->uri->uri_string(), $attributes);
            ?>

            <h5>Nama</h5>
            <input type="text" name="name" value="<?php echo set_value('name'); ?>" size="50" />

            <h5>Alamat</h5>
            <input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

            <p><input type="submit" name="submit" value="Submit" /></p>

            <?php echo form_close(); ?>
        </div>
    </div>
</body>

</html>