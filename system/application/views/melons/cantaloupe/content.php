<?$this->template->add_css(path_from_file(__FILE__).'css/reset.css')?>
<?$this->template->add_css(path_from_file(__FILE__).'css/bootstrap.min.css')?>
<?$this->template->add_css(path_from_file(__FILE__).'css/bootstrap-accessibility.css')?>
<?$this->template->add_css(path_from_file(__FILE__).'css/common.css')?>
<?$this->template->add_css(path_from_file(__FILE__).'css/scalarvis.css')?>
<?$this->template->add_css(path_from_file(__FILE__).'css/header.css');?>
<?$this->template->add_css(path_from_file(__FILE__).'css/widgets.css');?>
<?$this->template->add_css(path_from_file(__FILE__).'css/responsive.css')?>
<?$this->template->add_css(path_from_file(__FILE__).'css/timeline.css')?>
<?$this->template->add_css(path_from_file(__FILE__).'css/timeline.theme.scalar.css')?>
<?$this->template->add_css(path_from_file(__FILE__).'css/screen_print.css', 'link', 'screen,print')?>
<?$this->template->add_css(path_from_file(__FILE__).'css/iopn.css')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/bootstrap.min.js');?>
<?$this->template->add_js(path_from_file(__FILE__).'js/jquery.bootstrap-modal.js');?>
<?$this->template->add_js(path_from_file(__FILE__).'js/jquery.bootstrap-accessibility.js');?>
<?$this->template->add_js(path_from_file(__FILE__).'js/main.js')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/jquery.dotdotdot.js');?>
<?$this->template->add_js(path_from_file(__FILE__).'js/jquery.scrollTo.min.js');?>
<?$this->template->add_js(path_from_file(__FILE__).'js/scalarheader.jquery.js');?>
<?$this->template->add_js(path_from_file(__FILE__).'js/scalarpage.jquery.js')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/scalarmedia.jquery.js')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/scalarmediadetails.jquery.js')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/scalarindex.jquery.js')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/scalarhelp.jquery.js')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/scalarcomments.jquery.js')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/scalarsearch.jquery.js')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/scalarvisualizations.jquery.js')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/scalarstructuredgallery.jquery.js')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/scalarwidgets.jquery.js')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/scalarlenses.jquery.js')?>
<?$this->template->add_js(path_from_file(__FILE__).'js/jquery.tabbing.js')?>
<?
if (!empty($tklabels)):
	unset($tklabels['versions']);
	$this->template->add_js('var tklabels='.json_encode($tklabels),'embed');
endif;

if (isset($plugins['thoughtmesh'])) {
	$plugins['thoughtmesh']->get();
}

if (file_exists(confirm_slash(APPPATH).'views/melons/cantaloupe/'.$view.'.php')) {
	$this->template->add_html($this->load->view('melons/cantaloupe/'.$view, null, true), $view.'-page');
}
?>
