<?php

namespace Views;

class View {

	public function render($tpl, $pageData) {
		include $tpl;
		exit();
	}

	public function getRender($tpl, $pageData = array()) {
		ob_start();
		include $tpl;
		return ob_get_clean();
	}

}