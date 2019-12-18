<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
  <div id="global-header">
    <section id="banner">
        <!--start search-->
        <section class="headerSearchContainer" id="searchBar">
            <div class="grid-container">
                <div class="grid-x grid-margin-x grid-padding-x align-middle">
                    <div class="cell">
                        <form role="search" method="get" class="search-form" action="http://www.utsa.edu/search/searchresults.html">
							<input name="cx" type="hidden" value="000238266656426684962:mzli4pte7ko"/>
<input name="cof" type="hidden" value="FORID:11"/>
                            <input type="search" class="search-field" id="q" name="q" placeholder="<?php echo esc_attr_x( 'Search...', 'jointswp' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'jointswp' ) ?>" />
                            <!--<input type="submit" class="search-submit button" value="<?php echo esc_attr_x( 'Search', 'jointswp' ) ?>" />-->
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--end search-->
        <!--top navigation icons-->
        <div class="grid-container restricted-width">
        <div class="grid-x grid-margin-x grid-padding-x align-middle">
            <!--hidden-md-down-->
            <div class="cell small-3 hide-for-large">
              <a class="navbar-brand" ga-event-action="/wp-content/themes/UTSA-Math/assets/images/global-header-logo-mobile.png" ga-event-category="globalHeaderClick" ga-event-label="global-header" ga-on="click" href="//www.utsa.edu">
                  <img alt="UTSA" class="logo" src="/wp-content/themes/UTSA-COPP/assets/images/global-header-logo-mobile.png" style="padding-bottom: 5px;"/>
              </a>
            </div>

            <nav class="cell small-3 navbar navbar-dark">

                        <div class="small-4 cell mobile-hide">
                            <a class="navbar-brand show-for-medium" ga-event-action="logo4" ga-event-category="globalHeaderClick" ga-event-label="global-header-navbar" ga-on="click" href="//www.utsa.edu">
                                <!--width="320" -->
                                <img alt="UTSA" class="logoFull show-for-large" src="/wp-content/themes/UTSA-COPP/assets/images/global-header-logo.png" width="320"/>
                                <!--<img alt="UTSA" class="logo hide-for-large hidden-md-down" src="/wp-content/themes/UTSA-Math/assets/images/global-header-logo-mobile.png" width="100"/>-->
                            </a>
                        </div>

            </nav>
            <nav class="auto cell nav nav-inline text-right">
                <a class="nav-link top-link" ga-event-action="//my.utsa.edu" ga-event-category="globalHeaderClick" ga-event-label="global-header" ga-on="click" href="//my.utsa.edu">
                    <i aria-hidden="true" class="fa fa-globe orangetext">&#160;</i>
                    <span class="linkmobile show-for-large"> myUTSA </span>
                </a>
                <a class="nav-link top-link" ga-event-action="//www.utsa.edu/today" ga-event-category="globalHeaderClick" ga-event-label="global-header" ga-on="click" href="//www.utsa.edu/today">
                    <i aria-hidden="true" class="fa fa-newspaper-o orangetext">&#160;</i>
                    <span class="linkmobile show-for-large"> UTSA Today </span>
                </a>
                <a class="nav-link top-link" ga-event-action="//www.utsa.edu/visit" ga-event-category="globalHeaderClick" ga-event-label="global-header" ga-on="click" href="//www.utsa.edu/visit">
                    <i aria-hidden="true" class="fa fa-map-o orangetext">&#160;</i>
                    <span class="linkmobile show-for-large">Visit </span>
                </a>
                <a class="nav-link top-link" ga-event-action="//www.utsa.edu/directory" ga-event-category="globalHeaderClick" ga-event-label="global-header" ga-on="click" href="//www.utsa.edu/directory">
                    <i aria-hidden="true" class="fa fa-users orangetext">&#160;</i>
                    <span class="linkmobile show-for-large"> Directory </span>
                </a>
                <a data-target="#searchBar" class="nav-link top-link" ga-event-action="#search" ga-event-category="globalHeaderClick" ga-event-label="global-header" ga-on="click" href="#" id="headerSearchCTA">
                    <i aria-hidden="true" class="fa fa-search orangetext">&#160;</i>
                    <span class="linkmobile show-for-large"> Search </span>
                </a>

                <button class="navbar-toggler hide-for-large float-xs-right" data-target="#startupNavbar" data-toggle="collapse" ga-event-action="burger-toggle" ga-event-category="globalHeaderClick" ga-event-label="global-header-navbar" ga-on="click" style="margin-top: -4px !important;" type="button">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </nav>
        </div>
        </div>
            <!--top level navigation-->



    </section>
</div>
