<?php

defined('C5_EXECUTE') or die('Access denied');

?>

<p>
    <?php echo t("To prevent analytics and marketing scripts from running before user consent, add <strong>type=\"text/plain\"</strong> along with the <strong>data-category</strong> attribute. This setup ensures that the scripts are only activated after the user gives consent."); ?>
</p>

<p>
    <?php echo t("Here's the implementation:"); ?>
</p>

<h3>
    <?php echo t("Analytics Code Example"); ?>
</h3>

<pre><code>&lt;script type="text/plain" data-category="analytics"&gt;
    // Your Analytics Code here
&lt;/script&gt;</code></pre>

<h3>
    <?php echo t("Marketing Code Example"); ?>
</h3>

<pre><code>&lt;script type="text/plain" data-category="marketing"&gt;
    // Your Marketing Code here
&lt;/script&gt;</code></pre>

<h3>
    <?php echo t("Necessary Code Example"); ?>
</h3>

<p>
    <?php echo t("No additional attributes are needed for necessary cookies:"); ?>
</p>

<pre><code>&lt;script&gt
    // Necessary Code here
&lt;/script&gt;</code></pre>

<p>
    <?php echo t("With <strong>type=\"text/plain\"</strong>, these scripts will not execute until consent is given. The Simple Cookie Banner will then switch them to the appropriate type once the user accepts."); ?>
</p>