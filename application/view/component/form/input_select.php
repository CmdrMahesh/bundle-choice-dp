<?php

/**
*	template to show select as input method.
*/

if(!empty($id) /*and !empty($label)*/){
	?>	
	<div class="<?php echo !empty($size_class)?$size_class:''; ?> field">
		<?php 
		if( !empty($label) )
		{
			wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label)); 
		}
		?></td>
		<div class="ui selection dropdown <?php echo !empty($class)?$class:''; ?>">
		  	<input type="hidden" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="<?php echo $value; ?>">
		  	<i class="dropdown icon"></i>		
		  	<div class="default text"></div>		  	
		  	<div class="menu">
		  		<?php if(!empty($options) and is_array($options)): ?>
		  			<?php foreach($options as $key=>$item): ?>
			    		<div class="item" data-value="<?php echo $key; ?>"><?php echo $item; ?></div>
			    	<?php endforeach; ?>	
		    	<?php endif; ?>
		  	</div>		
		</div>
		<?php
		if (isset($visible_info))
		{
			wbc()->load->template('component/form/input_visible_info',$visible_info); 
		}
		?>
	</div>
	<?php
}


