<?php
/**
 * Multiple short texts question, item input text Html
 * @var $tip
 * @var $alert
 * @var $maxlength
 * @var $tiwidth
 * @var $extraclass
 * @var $sDisplayStyle
 * @var $prefix
 * @var $myfname
 * @var $labelText                  $ansrow['question']
 * @var $prefix
 * @var $kpclass
 * @var $rows                       $drows.' '.$maxlength
 * @var $checkconditionFunction     $checkconditionFunction.'(this.value, this.name, this.type)'
 * @var $dispVal
 * @var $suffix
 */
?>
<!-- question attribute "display_rows" is set -> we need a textarea to be able to show several rows -->
<div  id='javatbd<?php echo $myfname; ?>' class="question-item answer-item numeric-item  text-item <?php echo $extraclass;?>" <?php echo $sDisplayStyle;?>>
    <?php if($alert):?>
        <div class="alert alert-danger errormandatory"  role="alert">
            <?php echo $labelText;?>
        </div> <!-- alert -->
    <?php endif;?>
    <div class="form-group row">
        <label class='control-label col-xs-12 numeric-label' for="answer<?php echo $myfname; ?>">
            <?php echo $labelText;?>
        </label>
        <div class="col-xs-12 input">
            <?php echo $prefix;?>
            <?php echo $sliderleft;?>
            <?php if(!$sliders): ?>
                <input
                    class="text form-control numeric <?php echo $kpclass;?>"
                    type="text"
                    size="<?php echo $tiwidth;?>"
                    name="<?php echo $myfname;?>"
                    id="answer<?php echo $myfname; ?>"
                    value="<?php echo $dispVal;?>"
                    onkeyup="<?php echo $checkconditionFunction; ?>"
                    title="<?php eT('Only numbers may be entered in this field.'); ?>";
                    <?php echo $maxlength; ?>
                />
            <?php else:?>
                <input
                    class="text form-control <?php echo $kpclass;?>"
                    type="text"
                    size="<?php echo $tiwidth;?>"
                    name="<?php echo $myfname;?>"
                    id="answer<?php echo $myfname; ?>"
                    value="<?php echo $dispVal;?>"
                    onkeyup="<?php echo $checkconditionFunction; ?>"
                    <?php echo $maxlength; ?>
                    data-slider-min='<?php echo $slider_min;?>'
                    data-slider-max='<?php echo $slider_max;?>'
                    data-slider-step='<?php echo $slider_step;?>'
                    data-slider-value='<?php echo $slider_default;?>'
                    data-slider-orientation='<?php echo $slider_orientation;?>'
                    data-slider-handle='<?php echo $slider_handle;?>'
                    data-slider-tooltip='always'
                    data-slider-reset='<?php echo $slider_reset; ?>'
                    data-slider-prefix='<?php echo $prefix; ?>'
                    data-slider-suffix='<?php echo $suffix; ?>'
                />
                <?php if ($slider_reset): ?>
                    <span data-toggle='tooltip' data-title='<?php eT("Reset slider"); ?>' class='btn btn-default fa fa-times slider-reset'>&nbsp;<?php eT("Reset"); ?></span>
                <?php endif; ?>
            <?php endif;?>
            <?php echo $sliderright;?>
            <?php echo $suffix;?>
        </div>  <!-- xs-12 -->
    </div> <!-- form group -->
</div>

<?php if($sliders): ?>
    <div>
    <style scoped>
    /**
    * Slider custom handle
    */
    .slider-handle.custom {
    background: transparent none;
    /* You can customize the handle and set a background image */
    }
    .slider-handle.custom::before
    {
        line-height: 20px;
        font-size: 20px;
        font-family: FontAwesome;
        content: '\<?php echo $slider_custom_handle;?>';  /*unicode character ;*/
    }
    </style>
    </div>
    <script type='text/javascript'>
        <!--
            $(document).ready(function(){
                var myfname = '<?php echo $myfname; ?>';
                var id = '#answer' + myfname;
                var mySlider_<?php echo $myfname; ?> = $(id).bootstrapSlider({
                    formatter: function (value) {
                        var slider_prefix = $(id).attr('data-slider-prefix')
                        var slider_suffix = $(id).attr('data-slider-suffix')
                        var displayValue = '' + value;
                        var displayValue = displayValue.replace(/\./,LSvar.sLEMradix);
                        $(id).triggerHandler("keyup");
                        return slider_prefix + displayValue + slider_suffix;
                    }
                });
                mySlider_<?php echo $myfname; ?>.on('slideStop', function(event) {
                    var displayValue = '' + event.value;
                    var displayValue = displayValue.replace(/\./,LSvar.sLEMradix);

                    // fixnum_checkconditions can't handle dot if it expects comma, and
                    // Bootstrap won't save comma in value. So we need another attribute.
                    $(id).attr('stringvalue', displayValue);

                    LEMrel<?php echo $qid; ?>();

                    // EM needs this
                    $(id).triggerHandler("keyup");
                });
                $("#vmsg_<?php echo $qid;?>_default").text('<?php eT('Please click and drag the slider handles to enter your answer.');?>');
            });
        -->
    </script>
<?php endif; ?>
