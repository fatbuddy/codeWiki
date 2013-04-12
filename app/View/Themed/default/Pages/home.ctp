<?php
/**
 * @var $this View
 */
?>
<?php echo $this->Html->image('bg_top.png',array('class'=>'float_left'));?>
<?php echo $this->Html->image('bg_mid_0.png',array('class'=>'float_left'));?>
<div class="wrapper">
<div class="mainmenu">
<?php 
for($j=0;$j<5;$j++){
	
	echo '<a href="#" class="category"><div class="menu">';
	
	echo $this->Html->image('bg_orange.png',array('class'=>'float_left'));

	for($i=0;$i<5;$i++){
		echo $this->Html->image('bg_white.png',array('class'=>'float_left'));
	}
}?>
</div></a>
</div>
</div>
<?php
for($i=0;$i<31;$i++){
		echo $this->Html->image('bg_white.png',array('class'=>'float_left'));
	}
	?>
<?php echo $this->Html->image('bg_mid_end.png',array('width'=>49,'class'=>'float_left'));?>
<?php echo $this->Html->image('bg_bottom.png',array('class'=>'float_left'));?>