<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

preg_match('#\((.*?)\)#',$name, $match);
$code = substr($match[1],1);
$msg = strtolower(trim(strstr($name,'(',true)));

$this->title = $name;
?>
<div class="site-error">

    <h3 class="alert alert-danger"><?= nl2br(Html::encode($message)) ?></h3>
    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="<?php echo $code ?>"><?php echo $code ?></div>
        <p class="lead text-gray-800 mb-5"><?php echo $msg ?></p>
        <a class="btn btn-success" href="index">&larr; Back to Dashboard</a>
    </div>
<!--    <p>-->
<!--        Please contact us if you think this is a server error. Thank you.-->
<!--    </p>-->

</div>
