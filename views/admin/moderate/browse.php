<?php head(array('title'=>__('Browse Image Annotations'),'content_class' => 'horizontal-nav', 'bodyclass'=>'items primary browse-items')); ?>
<h1><?php echo __('Browse Image Annotations'); ?> (<?php echo count($imageannotationannotations);?> <?php echo __('annotations total'); ?>)</h1>
<div id="primary">
	<?php echo flash(); ?>
	
	<div id="browse-meta">
		<div id="simple-search-form">
			<?php echo simple_search(__("Search"), array('id'=>'simple-search'), uri('image-annotation/moderate/browse')); ?>
		</div>

		<div class="pagination"><?php echo pagination_links(); ?></div>
	</div>
<?php
    if (count($imageannotationannotations) > 0 ): ?>
    <table>
    <tr>
        <th><a href="<?php echo html_escape(image_annotation_sort_uri('id'));?>">Id</a></th>
        <th><a href="<?php echo html_escape(image_annotation_sort_uri('recent'));?>"><?php echo __('Modified Date'); ?></a></th>
        <th><a href="<?php echo html_escape(image_annotation_sort_uri('username'));?>"><?php echo __('Author'); ?></a></th>
        <th><a href="<?php echo html_escape(image_annotation_sort_uri('itemid'));?>"><?php echo __('Item Id'); ?></a></th>
        <th><a href="<?php echo html_escape(image_annotation_sort_uri('text'));?>"><?php echo __('Text'); ?></a></th>
        <th><?php __('Action'); ?></th>
    </tr>
    <?php foreach($imageannotationannotations as $annotation):        
        $itemForAnnotation = $annotation->getItem();
    ?>
        <tr>
            <td><?php echo html_escape($annotation->id); ?></td>
            <td><?php echo html_escape($annotation->modified); ?></td>
            <td><?php echo html_escape($annotation->getUser()->username); ?></td>
            <td><?php echo link_to_item($itemForAnnotation->id, array(), 'show', $itemForAnnotation); ?></td>
            <td><?php echo html_escape($annotation->text); ?></td>
            <td><a href="<?php echo html_escape(ADMIN_BASE_URL .  '/image-annotation/moderate/delete/' . $annotation->id); ?>" class="delete"><?php __('Delete'); ?></a></td>
        </tr>
    <?php endforeach; ?>
    </table>    
    <?php else: ?>
        <div id="image-annotate-no-annotations">
            <p><?php echo __('There are no image annotations.'); ?></p>
        </div>
    <?php endif; ?>
</div>
<?php foot(); ?>
