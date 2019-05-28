<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php
$categories = get_categories('taxonomy=product_book_category');
?>
<!----panel--->
    	<p class="pg-title">စာအုပ္အမ်ဳိးအစားမ်ားျဖင့္ စာအုပ္စုစည္းမွု</p>
    	<div class="col-md-12 col-xs-12">
    		<?php
    		foreach ($categories as $key => $categorie) {
    		?>
            
            	<?php
            	if($categorie->parent == 0) {
            		$subcategories = get_terms(
				        array(
				            'taxonomy'   => 'product_book_category',
				            'parent'     => $categorie->term_id,
				            'orderby'    => 'term_id',
				            'hide_empty' => true
				        )
				    );
            	?>
            	<div class="panel book-category">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h5><?php echo $categorie->name; ?></h5>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                </div>
                <?php
                print_r($subcategories);
                foreach ($subcategories as $key => $subcategorie) {
                ?>
                <?php echo "ddd ".$subcategorie->id ; ?>
                <a href="<?php echo $subcategorie->name; ?>"><div class="panel-body panel-default">
                    <?php echo $subcategorie->name; ?>
                </div></a>
                <?php
                	}
                ?>
                </div>
                <?php
            	}
            	?>
            
            <?php
	            }
			?>
        </div>
    
</div>
    