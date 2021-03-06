<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php 
foreach ($fields as $id => $field) {
  if ( $id == 'field_soldout_value' ) {
    if ( $field->content == 'Udsolgt' ) {
        $fields['field_price_value']->content = t('Sold');
    }
  }
}
?>

<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>
  
  <?php $page_map = ($field->class == 'field-image-fid-3' ? true : false); ?>
  <?php $no_price = ($id == 'field_soldout_value' && $field->content == 'Udsolgt' ? true : false); ?>
  <<?php print $field->inline_html;?> class="views-field-<?php print $field->class; ?>">
    <?php if ($field->label): ?>
      <label class="views-label-<?php print $field->class; ?>">
        <?php print $field->label; ?>:
      </label>
    <?php endif; ?>
      <?php
      // $field->element_type is either SPAN or DIV depending upon whether or not
      // the field is a 'block' element type or 'inline' element type.
      ?>

      <?php if ($page_map): ?>
      <!--
        <![CDATA[
        <PageMap>
        <DataObject type="thumbnail">
        <Attribute name="src" value="<?php print $field->content; ?>" />
        </DataObject>
        </PageMap>
        ]]>
      -->
      <?php elseif( $id == 'field_soldout_value' ): ?>
      
      <span id="show-triggers" class="<?php print ( $no_price == false ? 'yes' : 'no' ); ?>"></span>
      
      <?php else: ?>

      <<?php print $field->element_type; ?> class="field-content"><?php print $field->content; ?></<?php print $field->element_type; ?>>

      <?php endif; ?>


  </<?php print $field->inline_html;?>>
<?php endforeach; ?>
