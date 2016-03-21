<?php
/**
 * List with comment footer Html
 * @var $id                 answer'.$ia[1].'comment
 * @var $hint_comment
 * @var $kpclass
 * @var $name                   $ia[1].'comment
 * @var $tarows                 floor($tarows)
 * @var $has_comment_saved      isset($_SESSION['survey_'.Yii::app()->getConfig('surveyID')][$fname2]) && $_SESSION['survey_'.Yii::app()->getConfig('surveyID')][$fname2]
 * @var $comment_saved          htmlspecialchars($_SESSION['survey_'.Yii::app()->getConfig('surveyID')][$fname2])
 * @var $java_name              java'.$ia[1].'
 * @var $java_id                java'.$ia[1].'
 * @var $java_value             $_SESSION['survey_'.Yii::app()->getConfig('surveyID')][$ia[1]].'"
 */
?>
    </div>
</div>

<p class="comment answer-item text-item">
    <label for="<?php echo $id; ?>">
        <?php echo $hint_comment;?>:
    </label>

<textarea
        class="textarea form-control <?php echo $kpclass; ?>"
        name="<?php echo $name; ?>"
        id="<?php echo $id; ?>"
        rows="<?php echo $tarows;?>"
        cols="30"
>
<?php if($has_comment_saved):?>
    <?php echo $comment_saved;?>
<?php endif;?>
</textarea>
</p>

<input
        class="radio"
        type="hidden"
        name="<?php echo $java_name;?>"
        id="<?php echo $java_id;?>"
        value="<?php echo $java_value;?>"
/>
