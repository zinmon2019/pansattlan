<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php
 $get_parent_cats = array(
            'parent' => '0', //get top level categories only
            'taxonomy'   => 'product_book_category'
        ); 
//$categories = get_categories('taxonomy=product_book_category');
$categories = get_categories($get_parent_cats);
// foreach ($categories as $key => $categorie) {
// 	if($categorie->parent == 0) {
// 		echo $categorie->name.'<br>';

// 		$subcategories = get_terms(
//         array(
//             'taxonomy'   => 'product_book_category',
//             'parent'     => $categorie->term_id,
//             'orderby'    => 'term_id',
//             'hide_empty' => true
//         )
//     );
// 	// print_r($subcategories);
// 		foreach ($subcategories as $key => $subcategorie) {
// 			echo '>> '.$subcategorie->name.'<br>';
// 		}
// 	}
	
// }
?>
<!----panel--->
    	<p class="pg-title">စာအုပ္အမ်ဳိးအစားမ်ားျဖင့္ စာအုပ္စုစည္းမွု</p>
    	<div class="col-md-12 col-xs-12 book-div">
    		<?php
    		foreach ($categories as $key => $categorie) {
                $catID = $categorie->cat_ID;
                $get_children_cats = array(
                    'parent'     => $catID,
                    'taxonomy'   => 'product_book_category',
                );

                $subcategories = get_categories( $get_children_cats );//get children of parent category
    		?>
            	<div class="panel book-category">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h5><?php echo $categorie->name; ?></h5>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                </div>
                <?php
                foreach ($subcategories as $key => $subcategorie) {
                    //for each child category, get the ID
                    $childID = $subcategorie->cat_ID;
                ?>
                <a href="<?php echo get_category_link( $childID ); ?>"><div class="panel-body panel-default">
                    <?php echo $subcategorie->name; ?>
                </div></a>
                <?php
                	}
                ?>
                </div>
            
            <?php
	            }
			?>
        </div>
    
</div>
    