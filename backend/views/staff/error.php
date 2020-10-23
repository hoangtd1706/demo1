<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

?>
<div class="site-error">

    <!-- 404 Error Text -->
    <div class="text-center">
        <!--<p class="lead text-gray-800 mb-5"><?php /*echo $msg */?></p>-->
        <p class="lead text-gray-800 mb-5"><?= nl2br(Html::encode($message)) ?></p>
        <a class="btn btn-success" href="index">Ok</a>
    </div>
<!--    <p>-->
<!--        Please contact us if you think this is a server error. Thank you.-->
<!--    </p>-->

</div>
