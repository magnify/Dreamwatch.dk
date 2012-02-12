<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/05/12 18:41:54 johnalbin Exp $

/**
 * @file node.tpl.php
 *
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $picture: The authors picture of the node output from
 *   theme_user_picture().
 * - $date: Formatted creation date (use $created to reformat with
 *   format_date()).
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $name: Themed username of node author output from theme_user().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $submitted: themed submission information output from
 *   theme_node_submitted().
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $teaser: Flag for the teaser state.
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"><div class="node-inner">

  <?php print $picture; ?>

  <?php if (!$page): ?>
    <h2 class="title">
      <a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>

  <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
  <?php endif; ?>

  <?php if ($submitted || $terms): ?>
    <div class="meta">
      <?php if ($submitted): ?>
        <div class="submitted">
          <?php print $submitted; ?>
        </div>
      <?php endif; ?>

    </div>
  <?php endif; ?>

  <div class="content">
    <?php print $content; ?>
    
    <?php if ( $node->nid == '832' ): ?>
    <div style="display: none;">
        <div id="soegning_thumbnail"><div data-if="Vars.thumbnail" class="gs-image-box gs-web-image-box"><a class="gs-image" data-attr="{href:url, target:target}"><img class="gs-image" data-attr="{src:thumbnail.src}"/></a></div></div>
        <div id="soegning_webResult">
            <div class="gs-webResult gs-result" data-vars="{longUrl:function() { var i = unescapedUrl.indexOf(visibleUrl); return i < 1 ? visibleUrl : unescapedUrl.substring(i);}}">
                <table>
                    <tr>
                        <td valign="top">
                            <div data-if="Vars.richSnippet" data-attr="0" data-body="render('thumbnail',richSnippet,{url:unescapedUrl,target:target})"></div>
                        </td><td valign="top">
                            <div class="gs-title"><a class="gs-title" data-attr="{href:unescapedUrl,target:target}" data-body="html(title)"></a></div>
                            <div class="gs-snippet" data-body="html(content)"></div>
                            <div class="gs-visibleUrl gs-visibleUrl-long" data-body="longUrl()"></div>
                            <div data-if="Vars.richSnippet && Vars.richSnippet.action" class="gs-actions" data-body="render('action',richSnippet,{url:unescapedUrl,target:target})"></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div id="cse" style="width: 100%;">Loading</div>
    <script src="http://www.google.dk/jsapi" type="text/javascript"></script>
    <script type="text/javascript">
    google.load('search', '1');
    google.setOnLoadCallback(function() {
        var customSearchOptions = {
        };  var customSearchControl = new google.search.CustomSearchControl(
          '006854676468351416017:4st217kyzew', customSearchOptions);
        customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
        customSearchControl.draw('cse');
        google.search.Csedr.addOverride("soegning_");
    }, true);
    </script>
    <?php endif; ?>
    
  </div>

  <?php print $links; ?>

</div></div> <!-- /node-inner, /node -->
