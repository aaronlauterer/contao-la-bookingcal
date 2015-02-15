<div class="block bookingcal_year">
<h2><?php echo $this->year; ?></h2>
<ol class="months">
    <?php foreach($this->months as $monthkey => $month): ?>
    <li><span><?php echo $GLOBALS['TL_LANG']['MONTHS'][$monthkey-1];?></span>
        <ol class="days">
        <?php foreach($month as $daykey => $day): ?>
            <li class="<?php echo $day['style'];?>" title="<?php echo $GLOBALS['TL_LANG']['MSC']['bookingcal_'.$day['style']]; ?>"><?php echo $daykey; ?></li>
        <?php endforeach; ?>
        </ol>
    </li>
    <?php endforeach; ?>
</ol>
</div>