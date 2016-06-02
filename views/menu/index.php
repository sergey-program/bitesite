<?php

use yii\jui\JuiAsset;

/**
 * @var \yii\web\View $this
 */

JuiAsset::register($this);

?>

<div class="row">
    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Автокомплит</h3>
            </div>

            <form class="form">
                <div class="panel-body">
                    <div class="form-group">
                        <input id="dropdown" class="form-control">
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
//        function log(message) {
//            $("<div>").text(message).prependTo("#log");
//            $("#log").scrollTop(0);
//        }

        $("#dropdown").autocomplete({
            source: '/menu/get-dropdown',
            minLength: 2
//            select: function (event, ui) {
//                log(ui.item ? "Selected: " + ui.item.value + " aka " + ui.item.id : "Nothing selected, input was " + this.value);
//                $('#dropdown').val(ui.item.value);
//            }
        });
    });
</script>
