<?php
//  A filter to add a sub menu to pages
    function my_the_content_filter($content) {

        if (is_page() and $GLOBALS['post']->post_name != 'home') {
            $children = wp_list_pages('title_li=&child_of='.$GLOBALS['post']->ID.'&echo=0&depth=1');
            if ($children) {
                $content = sprintf('
                    <div id="contentSidebar" class="sidebars">
                            <div class="t"><div></div></div>
                            <div class="i"><div class="i2"><div class="c">

                                    <div class="sidebarBox"><h4><span>Links</span></h4>
                            <ul>
                            %s
                            </ul>
                            </div>
                                            </div>
                                            <div class="sidebarLeft">
                                                                                                    </div>
                                            <div class="sidebarRight">
                                                                                                    </div>
                                            <div class="clear">
                                                                                            </div>
                                    </div></div>
                                    <div class="b"><div></div></div>
                            </div>
                   %s',
                   $children, $content
               );
            }
        }

        return $content;
    }

    add_filter('the_content', 'my_the_content_filter');

?>
